<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{
    Setting,
    RelatedNewsSite,
};

class CheckSettingProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       $setting = Setting::firstOrCreate([], [
                'site_name'  => 'News App',
                'email'      => 'News@gmail.com',
                'favicon'    => 'favicon.ico',
                'logo'       => 'logo.png',
                'facebook'   => 'https://facebook.com/example',
                'twitter'    => 'https://twitter.com/example',
                'instagram'  => 'https://instagram.com/example',
                'youtube'    => 'https://youtube.com/example',
                'phone'      => '+1234567890',
                'country'    => 'Egypt',
                'city'       => 'Cairo',
                'street'     => '123 Main St',
       ]);

       //share related sites
        $relatedSites = RelatedNewsSite::select('name','url')->get();

       view()->share([
           'setting' => $setting,
           'relatedSites' => $relatedSites
       ]);
    }
}
