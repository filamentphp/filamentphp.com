<?php

namespace App\Console\Commands;

use App\Actions\FetchLinkThumbnails;
use App\Actions\FetchPluginDataFromGitHub;
use App\Actions\FetchPluginDataFromPackagist;
use App\Actions\FetchPluginDataFromUnlock;
use App\Actions\FetchPluginThumbnails;
use Illuminate\Console\Command;

class FetchRemoteData extends Command
{
    protected $signature = 'fetch-remote-data';

    protected $description = 'Fetch optional data from APIs';

    public function handle(
        FetchLinkThumbnails $fetchLinkThumbnails,
        FetchPluginDataFromGitHub $fetchPluginDataFromGitHub,
        FetchPluginDataFromUnlock $fetchPluginDataFromUnlock,
        FetchPluginThumbnails $fetchPluginThumbnails,
    ): int
    {
        $fetchLinkThumbnails();
        $fetchPluginDataFromGitHub();
        $fetchPluginDataFromUnlock();
        $fetchPluginThumbnails();

        return 0;
    }
}
