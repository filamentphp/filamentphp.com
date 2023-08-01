<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Contracts\Starrable;
use App\Models\Plugin;
use Illuminate\Console\Command;

class AddStars extends Command
{
    protected $signature = 'add-stars {starrable} {number}';

    protected $description = 'Adds stars to a starrable model';

    public function handle(): int
    {
        /** @var ?Starrable $starrable */
        $starrable = Plugin::find($this->argument('starrable')) ?? Article::find($this->argument('starrable'));

        if (! $starrable) {
            $this->error('Starrable model not found');

            return Command::FAILURE;
        }

        $starrable->stars()->createMany(
            array_fill(0, $this->argument('number'), [
                'ip' => 0,
            ])
        );

        $starrable->cacheStarsCount();

        return Command::SUCCESS;
    }
}
