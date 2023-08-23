<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\ImageManagerStatic as Image;
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
                    Image::make(base_path("content/{$directory}/{$file}"))
                        ->fit(500, 500)
                        ->save(public_path("images/content/{$directory}/{$file}"), quality: 50);

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
                    Image::make(base_path("content/{$directory}/{$file}"))
                        ->fit(1920, 1080)
                        ->save(public_path("images/content/{$directory}/{$file}"));

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
                    Image::make(base_path("content/{$directory}/{$file}"))
                        ->fit(1024, 576)
                        ->save(public_path("images/content/{$directory}/{$file}"), quality: 50);

                    $this->info("Optimized {$directory}/{$file}");
                } catch (Throwable $exception) {
                    $this->error("Unable to optimize {$directory}/{$file}");
                }
            }
        }

        return Command::SUCCESS;
    }
}
