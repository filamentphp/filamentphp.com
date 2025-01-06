<?php

namespace App\Support;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\MarkdownConverter;
use Stringable;
use Torchlight\Commonmark\V2\TorchlightExtension;

class Markdown implements Htmlable, Stringable
{
    protected Environment $environment;

    public function __construct(protected string $content)
    {
        $this->environment = new Environment([
            'allow_unsafe_links' => false,
            'heading_permalink' => [
                'html_class' => 'heading-anchor',
                'id_prefix' => '',
                'fragment_prefix' => '',
                'symbol' => '#',
                'title' => 'Permalink',
            ],
            'table_of_contents' => [
                'html_class' => 'table-of-contents',
                'position' => 'top',
                'style' => 'bullet',
                'min_heading_level' => 2,
                'max_heading_level' => 6,
                'normalize' => 'relative',
                'placeholder' => null,
            ],
        ]);

        $this->environment->addExtension(new CommonMarkCoreExtension);
        $this->environment->addExtension(new TableExtension);
        $this->environment->addExtension(new HeadingPermalinkExtension);
        $this->environment->addExtension(new TorchlightExtension);
        $this->environment->addExtension(new TableOfContentsExtension);
    }

    public static function parse(string $text): static
    {
        $static = app(static::class, ['content' => $text]);

        $static->convert();
        $static->removeH1Tags();
        $static->convertSpecialBlockQuotes();

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

    protected function convertSpecialBlockQuotes(): static
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
            pattern: '/src=["\'](?!https?:\/\/)([^"\']+)["\'][^>]/i',
            replacement: 'src="' . $baseUrl . '$1" ',
            subject: $this->content
        );

        return $this;
    }

    public function __toString(): string
    {
        return str($this->content)->sanitizeHtml();
    }

    public function toHtml()
    {
        return new HtmlString($this->content);
    }
}
