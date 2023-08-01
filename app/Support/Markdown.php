<?php

namespace App\Support;

use Illuminate\Support\HtmlString;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\MarkdownConverter;
use Torchlight\Commonmark\V2\TorchlightExtension;

class Markdown
{
    public static function parse(string $text): HtmlString
    {
        $environment = new Environment([
            'allow_unsafe_links' => false,
            'heading_permalink' => [
                'html_class' => 'heading-anchor',
                'id_prefix' => '',
                'fragment_prefix' => '',
                'symbol' => '#',
                'title' => 'Permalink',
            ],
        ]);

        $environment->addExtension(new CommonMarkCoreExtension);
        $environment->addExtension(new TableExtension);
        $environment->addExtension(new HeadingPermalinkExtension);
        $environment->addExtension(new TorchlightExtension);

        $converter = new MarkdownConverter($environment);

        return new HtmlString($converter->convert($text)->getContent());
    }
}
