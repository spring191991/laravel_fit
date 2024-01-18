<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('admin.article.part.all-tags', function($view) {
            $view->with(['items' => Tag::alltags()]);
        });

        View::composer('admin.service.part.categories', function($view) {
            static $items = null;
            if (is_null($items)) {
                $items = Category::all();
            }
            $view->with(['items' => $items]);
        });

        View::composer('layouts.part.categories', function($view) {
            static $items = null;
            if (is_null($items)) {
                $items = Category::all();
            }
            $view->with(['items' => $items]);
        });

        View::composer('layouts.part.popular-tags', function($view) {
            $view->with(['items' => Tag::popular()]);
        });

        View::composer('layouts.part.all-tags', function($view) {
            $view->with(['items' => Tag::alltags()]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
