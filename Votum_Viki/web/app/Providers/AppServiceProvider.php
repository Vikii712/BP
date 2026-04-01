<?php

namespace App\Providers;

use App\Models\File;
use App\Observers\FileObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            File::observe(FileObserver::class);

        View::addNamespace('front', resource_path('views/front'));
        View::addNamespace('admin', resource_path('views/admin'));
        View::addNamespace('auth', resource_path('views/auth'));

        Blade::anonymousComponentPath(resource_path('views/Front/components'), 'front');
        Blade::anonymousComponentPath(resource_path('views/admin/components'), 'admin');
    }
}
