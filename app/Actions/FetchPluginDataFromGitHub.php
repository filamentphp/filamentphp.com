<?php

namespace App\Actions;

use App\Models\Plugin;
use Embed\Embed;
use GrahamCampbell\GitHub\GitHubManager;
use Throwable;

class FetchPluginDataFromGitHub
{
    public function __construct(
        protected GitHubManager $github,
    )
    {
    }

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

        Plugin::query()
            ->inRandomOrder()
            ->where('is_paid', false)
            ->whereNotNull('github_repository')
            ->get()
            ->each(function (Plugin $plugin): void {
                $repositoryAuthor = str($plugin->github_repository)->before('/');

                if (blank($repositoryAuthor)) {
                    return;
                }

                $repositoryName = str($plugin->github_repository)->after('/');

                if (blank($repositoryName)) {
                    return;
                }

                try {
                    $repositoryData = $this->github
                        ->repo()
                        ->show($repositoryAuthor, $repositoryName);

                    $stars = $repositoryData['stargazers_count'] ?? null;

                    if (blank($stars)) {
                        return;
                    }

                    cache()->put($plugin->getGitHubStarsCacheKey(), $stars);

                    echo "Caching GitHub stars for plugin {$plugin->getKey()} - {$stars}. \n";
                } catch (Throwable $exception) {
                    echo "Failed to cache GitHub stars for plugin {$plugin->getKey()} - {$exception->getMessage()}. \n";

                    // 👹
                }
            });
    }
}
