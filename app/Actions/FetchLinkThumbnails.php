<?php

namespace App\Actions;

use App\Models\Link;
use Embed\Embed;
use Flowframe\Previewify\Previewify;
use Throwable;

class FetchLinkThumbnails
{
    public function __invoke(): void
    {
        foreach (Link::query()->with(['media'])->get() as $link) {
            try {
                if ($link->media->count()) {
                    continue;
                }

                $embed = new Embed();
                $thumbnail = $embed->get($link->url)->image;

                cache()->put($link->getThumbnailUrlCacheKey(), $thumbnail);
                echo "Caching thumbnail for link {$link->getKey()} - {$thumbnail}. \n";
            } catch (Throwable $exception) {
                // 👹
            }
        }
    }
}
