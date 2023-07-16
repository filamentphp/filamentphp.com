<?php

namespace App\Console\Commands;

use App\Actions\FetchLinkThumbnails;
use App\Actions\FetchPluginDataFromGitHub;
use App\Actions\FetchPluginDataFromPackagist;
use App\Actions\FetchPluginDataFromAnystack;
use App\Actions\FetchPluginThumbnails;
use Illuminate\Console\Command;

class FetchRemoteData extends Command
{
    protected $signature = 'fetch-remote-data';

    protected $description = 'Fetch optional data from APIs';

    public function handle(
        FetchPluginDataFromAnystack $fetchPluginDataFromAnystack,
    ): int
    {
        $fetchPluginDataFromAnystack();

        return 0;
    }
}
