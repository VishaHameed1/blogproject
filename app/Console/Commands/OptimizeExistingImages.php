<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeExistingImages extends Command
{
    protected $signature = 'images:optimize-existing';
    protected $description = 'Optimize all existing images in storage';

    public function handle()
    {
        $this->info('Optimizing existing images...');

        $folders = ['posts', 'categories', 'avatars'];
        $optimized = 0;

        foreach ($folders as $folder) {
            $files = Storage::disk('public')->files($folder);

            foreach ($files as $file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                    $this->line("Optimizing: $file");

                    try {
                        $imagePath = storage_path('app/public/' . $file);
                        $img = Image::make($imagePath);
                        $img->resize(800, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                        $img->save($imagePath, 80);
                        $optimized++;
                    } catch (\Exception $e) {
                        $this->error("Failed: $file - " . $e->getMessage());
                    }
                }
            }
        }

        $this->info("✅ Optimized $optimized images!");
    }
}
