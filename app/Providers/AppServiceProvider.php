<?php

namespace App\Providers;

use App\Category;
use App\Page;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('categories')  ) {
            view()->share('categories' , Category::where('parent_id' , null)->get());
        }

        if (Schema::hasTable('pages')  ) {
            view()->share('pages' , Page::get());
        }
    }
}
