<?php

namespace App\Actions;

use App\Models\Plugin;
use Illuminate\Support\Facades\Http;
use Throwable;

class FetchPluginDataFromUnlock
{
    public function __invoke(): void
    {
        /**
         * Please do not judge this code. There's no error handling, retries,
         * knowledge of rate limiting, or anything else. It's a non-critical
         * service to fetch optional data for website content. If something
         * bad happens, it *doesn't really matter*. This code gets run
         * every five minutes, and we randomise the order of the query
         * results to ensure that all records get a fair chance at
         * getting successfully updated.
         *
         * That being said, if you're looking for something to do, you
         * can clean this all up and handle the errors properly. But
         * it really isn't vital to this app servicing its users :)
         */

        $unlock = Http::withToken(config('services.unlock.token'));

        try {
            $advertismentChannels = $unlock
                ->get('https://api.unlock.sh/v1/affiliate-beta')
                ->json()
                ['data'];

            collect($advertismentChannels)
                ->filter(fn (array $advertismentChannel): bool => $advertismentChannel['name'] === 'Filament Marketplace')
                ->each(function (array $advertismentChannel) use ($unlock): void {
                    $advertisedProducts = collect($advertismentChannel['products'] ?? [])->keyBy('id');

                    Plugin::query()
                        ->inRandomOrder()
                        ->where('is_paid', true)
                        ->whereNotNull('unlock_id')
                        ->get()
                        ->each(function (Plugin $plugin) use ($advertisedProducts): void {
                            if (blank($plugin->unlock_id)) {
                                return;
                            }

                            if (! $advertisedProducts->has($plugin->unlock_id)) {
                                cache()->forget($plugin->getCheckoutUrlCacheKey());

                                return;
                            }

                            $checkoutUrl = $advertisedProducts->get($plugin->unlock_id)['checkout_url'];

                            if (blank($checkoutUrl)) {
                                return;
                            }

                            cache()->put($plugin->getCheckoutUrlCacheKey(), $checkoutUrl);

                            echo "Caching checkout URL for plugin {$plugin->getKey()} - {$checkoutUrl}. \n";
                        });
                });
        } catch (Throwable $exception) {
            echo "Failed to fetch any data from Unlock. \n";

            // 👹
        }
    }
}
