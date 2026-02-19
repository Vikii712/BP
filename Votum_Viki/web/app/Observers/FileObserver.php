<?php

namespace App\Observers;

use App\Models\File;
use App\Services\ImageService;

class FileObserver
{
    public function creating(File $file)
    {
        if (isset($file->image_file)) {
            $service = new ImageService();
            $file->url = $service->storeOptimized($file->image_file, 'uploads');
        }
    }
}
