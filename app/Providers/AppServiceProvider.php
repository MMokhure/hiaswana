<?php

namespace App\Providers;

use App\Models\Slide;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $helpers = base_path('app/helpers.php');
        if (file_exists($helpers)) {
            require_once $helpers;
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share slideshow data with the hero and about layout partials
        View::composer(['layouts.hero', 'layouts.about'], function ($view) {
            try {
                if (! Schema::hasTable('slides')) {
                    $view->with(['heroSlides' => collect(), 'aboutSlides' => collect()]);
                    return;
                }
            } catch (QueryException $e) {
                $view->with(['heroSlides' => collect(), 'aboutSlides' => collect()]);
                return;
            }

            $view->with([
                'heroSlides'  => Slide::active()->where('location', 'hero')->orderBy('sort_order')->get(),
                'aboutSlides' => Slide::active()->where('location', 'about')->orderBy('sort_order')->get(),
            ]);
        });
    }
}
