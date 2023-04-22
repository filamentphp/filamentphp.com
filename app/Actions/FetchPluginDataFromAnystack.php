<?php

namespace App\Actions;

use App\Models\Plugin;
use Illuminate\Support\Facades\Http;
use Throwable;

class FetchPluginDataFromAnystack
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
        $anystack = Http::withToken(config('services.anystack.token'));

        try {
            $advertismentChannels = $anystack
                ->get('https://api.anystack.sh/v1/affiliate-beta')
                ->json('data');

            $advertisementChannel = collect($advertismentChannels)->keyBy('id')['da7855a9-36a1-44a4-87b9-8e5852ae08d2'] ?? null;

            if (! $advertisementChannel) {
                return;
            }

            $advertisedProducts = collect($advertisementChannel['products'] ?? [])->keyBy('id');

            Plugin::query()
                ->inRandomOrder()
                ->where('is_paid', true)
                ->whereNotNull('anystack_id')
                ->get()
                ->each(function (Plugin $plugin) use ($advertisedProducts): void {
                    if (blank($plugin->anystack_id)) {
                        return;
                    }

                    if (! $advertisedProducts->has($plugin->anystack_id)) {
                        cache()->forget($plugin->getCheckoutUrlCacheKey());
                        cache()->forget($plugin->getPriceCacheKey());

                        return;
                    }

                    $advertisedProducts = $advertisedProducts->get($plugin->anystack_id);

                    $checkoutUrl = $advertisedProducts['checkout_url'];

                    if (blank($checkoutUrl)) {
                        return;
                    }

                    cache()->put($plugin->getCheckoutUrlCacheKey(), $checkoutUrl);

                    echo "Caching checkout URL for plugin {$plugin->getKey()} - {$checkoutUrl}. \n";

                    $prices = collect($advertisedProducts['prices'] ?? []);

                    $priceAmount = $prices->min('amount');
                    $priceCurrency = $prices->keyBy('amount')[$priceAmount]['currency'];

                    if (blank($priceAmount)) {
                        return;
                    }

                    if (blank($priceCurrency)) {
                        return;
                    }

                    $price = money($priceAmount, $priceCurrency);

                    cache()->put($plugin->getPriceCacheKey(), $price);

                    echo "Caching price for plugin {$plugin->getKey()} - {$price}. \n";
                });
        } catch (Throwable) {
            echo "Failed to fetch any data from Anystack. \n";

            // 👹
        }
    }
}
