<?php
namespace App\Services;
use Intervention\Image\ImageManager;

class ImageService
{
    protected $manager;

    public function __construct()
    {
        // správne: len string 'gd'
        $this->manager = new ImageManager('gd');
    }

    public function storeOptimized($file, $folder = 'uploads')
    {
        $image = $this->manager->make($file);

        // zmenšíme max šírku/výšku, zachováme pomer
        $image->resize(2000, 2000, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize(); // zabráni zväčšeniu malých obrázkov
        });

        $path = $folder . '/' . uniqid() . '.' . $file->getClientOriginalExtension();
        $image->save(storage_path('app/public/' . $path), 80); // 80% kvalita

        return $path;
    }
}

