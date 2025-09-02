<?php

namespace App\Support;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Embed\Bridge\OscaroteroEmbedAdapter;
use League\CommonMark\Extension\Embed\EmbedExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\MarkdownConverter;
use Stringable;
use Torchlight\Commonmark\V2\TorchlightExtension;

class Markdown implements Htmlable, Stringable
{
    protected Environment $environment;

    public function __construct(protected string $content, bool $hasTableOfContents = true, protected bool $shouldSanitize = true)
    {
        $this->environment = new Environment([
            'allow_unsafe_links' => false,
            'embed' => [
                'adapter' => new OscaroteroEmbedAdapter,
                'allowed_domains' => ['youtube.com', 'youtube-nocookie.com'],
                'fallback' => 'link',
            ],
            'heading_permalink' => [
                'html_class' => 'heading-anchor',
                'id_prefix' => '',
                'fragment_prefix' => '',
                'symbol' => '#',
                'title' => 'Permalink',
            ],
            ...$hasTableOfContents ? ['table_of_contents' => [
                'html_class' => 'table-of-contents',
                'position' => 'top',
                'style' => 'bullet',
                'min_heading_level' => 2,
                'max_heading_level' => 6,
                'normalize' => 'relative',
                'placeholder' => null,
            ]] : [],
        ]);

        $this->environment->addExtension(new CommonMarkCoreExtension);
        $this->environment->addExtension(new EmbedExtension);
        $this->environment->addExtension(new TableExtension);
        $this->environment->addExtension(new HeadingPermalinkExtension);
        $this->environment->addExtension(new TorchlightExtension);

        if ($hasTableOfContents) {
            $this->environment->addExtension(new TableOfContentsExtension);
        }
    }

    public static function parse(string $text, bool $hasTableOfContents = true, bool $shouldSanitize = true): static
    {
        $static = app(static::class, ['content' => $text, 'hasTableOfContents' => $hasTableOfContents, 'shouldSanitize' => $shouldSanitize]);

        $static->convert();
        $static->removeH1Tags();
        $static->convertSpecialBlockquotes();

        return $static;
    }

    protected function convert(): static
    {
        $this->content = (new MarkdownConverter($this->environment))
            ->convert($this->content)
            ->getContent();

        return $this;
    }

    protected function removeH1Tags(): static
    {
        $this->content = preg_replace(
            pattern: '/\<h1(.*)\>(.*)\<\/h1\>/',
            replacement: '',
            subject: $this->content
        );

        return $this;
    }

    protected function convertSpecialBlockquotes(): static
    {
        $this->content = preg_replace(
            pattern: [
                '/> \[\!NOTE\]\s*\n> /',
                '/> \[\!TIP\]\s*\n> /',
                '/> \[\!IMPORTANT\]\s*\n> /',
                '/> \[\!WARNING\]\s*\n> /',
                '/> \[\!CAUTION\]\s*\n> /',
            ],
            replacement: [
                '> 📝 **Note:** ',
                '> 💡 **Tip:** ',
                '> ❗ **Important:** ',
                '> ⚠️ **Warning:** ',
                '> ⚠️ **Caution:** ',
            ],
            subject: $this->content
        );

        return $this;
    }

    public function absoluteImageUrls(string $baseUrl): static
    {
        $this->content = preg_replace(
            pattern: '/\b(src|srcset)\s*=\s*(["\'])(?!https?:\/\/|data:|\/\/)([^"\']+)\2/i',
            replacement: '$1=$2' . $baseUrl . '$3$2',
            subject: $this->content
        );

        return $this;
    }

    public function convertVideoToHtml(): static
    {
        $this->content = preg_replace_callback(
            pattern: '/(?<!src=["\'])https:\/\/github\.com\/user-attachments\/assets\/[a-f0-9\-]+/i',
            callback: function (array $matches): string {
                [$url] = $matches;

                /**
                 * If the asset is already present elsewhere, replace it with an empty string to avoid duplication.
                 * Some authors kept both the asset and the video tag in the markdown file ¯\_(ツ)_/¯.
                 */
                if (substr_count($this->content, $url) > 1) {
                    return '';
                }

                return <<<HTML
                    <video width="320" height="240" controls>
                        <source src="$url" type="video/mp4">
                    </video>
                HTML;
            },
            subject: $this->content
        );

        return $this;
    }

    public function __toString(): string
    {
        if (! $this->shouldSanitize) {
            return $this->content;
        }

        return str($this->content)->sanitizeHtml();
    }

    public function toHtml()
    {
        return new HtmlString($this->content);
    }
}
