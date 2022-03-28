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
        /**
         * Please do not judge this code. There's no error handling, retries,
         * knowledge of rate limiting, or anything else. It's a non-critical
         * service to fetch optional data for website content. If something
         * bad happens, it *doesn't really matter*. This code gets run
         * every 15 minutes, and we randomise the order of the query
         * results to ensure that all records get a fair chance at
         * getting successfully updated.
         *
         * That being said, if you're looking for something to do, you
         * can clean this all up and handle the errors properly. But
         * it really isn't vital to this app servicing its users :)
         */

        Link::query()
            ->inRandomOrder()
            ->with(['media'])
            ->get()
            ->each(function (Link $link): void {
                try {
                    if ($link->media->count()) {
                        return;
                    }

                    $embed = new Embed();
                    $thumbnailUrl = $embed->get($link->url)->image;

                    cache()->put($link->getThumbnailUrlCacheKey(), $thumbnailUrl);

                    echo "Caching thumbnail for link {$link->getKey()} - {$thumbnailUrl}. \n";
                } catch (Throwable $exception) {
                    echo "Failed to cache thumbnail URL for link {$link->getKey()} - {$exception->getMessage()}. \n";

                    // 👹
                }
            });
    }
}
