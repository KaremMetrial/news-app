<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\{
    Post,
    Category,
};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('images')->latest()->paginate(9);

        $most_view = Post::orderBy('num_of_views', 'desc')->limit(3)->get();

        $oldest_news = Post::oldest()->take(3)->get();

        $popular_posts = Post::withCount('comments')->orderBy('comments_count', 'desc')->take(3)->get();

        $categories = Category::all();
        $categories_with_posts = $categories->map(function($category) {
            $category->posts = $category->posts()->limit(4)->get();
            return $category;
        });

        return view('web.index', compact('posts', 'most_view', 'oldest_news', 'popular_posts', 'categories_with_posts'));
    }
}
