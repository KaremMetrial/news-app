<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;

class CacheServiceProvider extends ServiceProvider
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
        if(!Cache::has('read_more_posts'))
        {
            $read_more_posts = Post::select('id', 'title')->latest()->limit(10)->get();

            $read_more_posts = Cache::remember('read_more_posts', now()->addMinutes(60), function () {
                return Post::select('id', 'title')->latest()->limit(10)->get();
            });

        }

        $read_more_posts = Cache::get('read_more_posts');

        view()->share([
            'read_more_posts' => $read_more_posts,
        ]);
    }
}
