<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
    <channel>
        <title>
            <![CDATA[ FilamentPHP Latest Plugins ]]>
        </title>
        <link>
        <![CDATA[ https://filamentphp.com/feeds/plugins ]]>
        </link>
        <description>
            <![CDATA[ Latest FilamentPHP plugins ]]>
        </description>
        <language>en</language>
        <pubDate>{{ now()->toRssString() }}</pubDate>


        @foreach ($plugins as $plugin)
            <item>
                <title>{{ $plugin['name'] }}</title>
                <link>https://filamentphp.com/plugins/{{ $plugin['slug'] }}</link>
                <description>
                    <![CDATA[{!! $plugin['description'] !!}]]>
                </description>
                <category>{{ $plugin['categories'][0] }}</category>
                <guid>https://filamentphp.com/plugins/{{ $plugin['slug'] }}</guid>
                <pubDate>{{ \Carbon\Carbon::parse($plugin['publish_date'])->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
