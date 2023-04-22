<?php

namespace App\Comments;

use Illuminate\Support\Arr;
use League\CommonMark\ConverterInterface;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\MarkdownConverter;
use Spatie\Comments\CommentTransformers\CommentTransformer as Contract;
use Spatie\Comments\Models\Comment;

class CommentTransformer implements Contract
{
    public function handle(Comment $comment): void
    {
        config()->set('markdown', Arr::except(include config_path('markdown.php'), [
            'heading_permalink',
            'table_of_contents',
        ]));

        app()->singleton('markdown.environment', function (): Environment {
            $config = config()->get('markdown');

            $environment = new Environment(Arr::except($config, ['extensions', 'views']));

            collect($config['extensions'])
                ->reject(fn (string $extension): bool => in_array($extension, [
                    HeadingPermalinkExtension::class,
                    TableOfContentsExtension::class,
                ]))
                ->each(fn (string $extension) => $environment->addExtension(app($extension)));

            return $environment;
        });

        app()->singleton('markdown.converter', function (): MarkdownConverter {
            $environment = app('markdown.environment');

            return new MarkdownConverter($environment);
        });

        $comment->text = app(ConverterInterface::class)
            ->convert($comment->original_text)
            ->getContent();
    }
}
