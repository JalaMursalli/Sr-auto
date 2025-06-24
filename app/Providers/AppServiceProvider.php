<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Brend;
use App\Models\Logo;
use App\Models\Social;
use App\Models\Translation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewView;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer('frontend.*',function(ViewView $view){
            $settings = Translation::pluck('value_'.app()->getLocale(),'key')->toArray();
            $socials = Social::all();
            $banners = Banner::all();
            $logo = Logo::first();
            $brends = Brend::all();

            $view->with('socials',$socials);
            $view->with('banners',$banners);
            $view->with('logo',$logo);
            $view->with('settings',$settings);
            $view->with('brends',$brends);

        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
