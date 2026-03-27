<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Schema::hasTable('site_settings')) {
                $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
                $view->with('settings', $settings);
            } else {
                $view->with('settings', []);
            }
        });
    }
}
