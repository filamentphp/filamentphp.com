<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Orbit\Actions\ClearCache;

class ClearOrbitCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear-orbit-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Orbit\'s cache without confirmation.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        app(ClearCache::class)();

        return Command::SUCCESS;
    }
}
