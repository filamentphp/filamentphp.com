<?php

namespace App\Actions;

use App\Models\Plugin;
use Embed\Embed;
use Flowframe\Previewify\Previewify;
use Throwable;

class FetchPluginThumbnails
{
    public function __invoke(): void
    {
        foreach (Plugin::query()->with(['media'])->get() as $plugin) {
            if ($plugin->media->count()) {
                continue;
            }

            $url = $plugin->getUrl();

            if (blank($url)) {
                continue;
            }

            try {
                $embed = new Embed();
                $thumbnail = $embed->get($url)->image;

                cache()->put($plugin->getThumbnailUrlCacheKey(), $thumbnail);
                echo "Caching thumbnail for plugin {$plugin->getKey()} - {$thumbnail}. \n";
            } catch (Throwable $exception) {
                // 👹
            }
        }
    }
}
