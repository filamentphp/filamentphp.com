<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Throwable;

class OptimizeImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimize-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize content images';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach ([
            'authors/avatars',
        ] as $directory) {
            $files = array_diff(scandir(base_path("content/{$directory}")), ['.', '..', '.DS_Store']);

            foreach ($files as $file) {
                try {
                    $webpFileName = pathinfo($file, PATHINFO_FILENAME) . '.webp';

                    if (file_exists(public_path("images/content/{$directory}/{$webpFileName}"))) {
                        $this->warn("Skipped {$directory}/{$file}, already optimized.");

                        continue;
                    }

                    Image::load(base_path("content/{$directory}/{$file}"))
                        ->fit(Manipulations::FIT_CONTAIN, 500, 500)
                        ->format(Manipulations::FORMAT_WEBP)
                        ->optimize()
                        ->save(public_path("images/content/{$directory}/{$webpFileName}"));

                    $this->info("Optimized {$directory}/{$file}");
                } catch (Throwable $exception) {
                    $this->error("Unable to optimize {$directory}/{$file}");
                }
            }
        }

        foreach ([
            'plugins/images',
        ] as $directory) {
            $files = array_diff(scandir(base_path("content/{$directory}")), ['.', '..', '.DS_Store']);

            foreach ($files as $file) {
                try {
                    $webpFileName = pathinfo($file, PATHINFO_FILENAME) . '.webp';

                    if (file_exists(public_path("images/content/{$directory}/{$webpFileName}"))) {
                        $this->warn("Skipped {$directory}/{$file}, already optimized.");

                        continue;
                    }

                    Image::load(base_path("content/{$directory}/{$file}"))
                        ->fit(Manipulations::FIT_CONTAIN, 1920, 1080)
                        ->format(Manipulations::FORMAT_WEBP)
                        ->optimize()
                        ->save(public_path("images/content/{$directory}/{$webpFileName}"));

                    $this->info("Optimized {$directory}/{$file}");
                } catch (Throwable $exception) {
                    $this->error("Unable to optimize {$directory}/{$file}");
                }
            }
        }

        foreach ([
            'plugins/thumbnails',
        ] as $directory) {
            $files = array_diff(scandir(base_path("content/{$directory}")), ['.', '..', '.DS_Store']);

            foreach ($files as $file) {
                try {
                    $webpFileName = pathinfo($file, PATHINFO_FILENAME) . '.webp';

                    if (file_exists(public_path("images/content/{$directory}/{$webpFileName}"))) {
                        $this->warn("Skipped {$directory}/{$file}, already optimized.");

                        continue;
                    }

                    Image::load(base_path("content/{$directory}/{$file}"))
                        ->fit(Manipulations::FIT_CONTAIN, 1024, 576)
                        ->format(Manipulations::FORMAT_WEBP)
                        ->optimize()
                        ->save(public_path("images/content/{$directory}/{$webpFileName}"));

                    $this->info("Optimized {$directory}/{$file}");
                } catch (Throwable $exception) {
                    $this->error("Unable to optimize {$directory}/{$file}");
                }
            }
        }

        return Command::SUCCESS;
    }
}
