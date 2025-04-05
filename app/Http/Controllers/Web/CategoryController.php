<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($slug)
    {
        $category = Category::with('posts')->whereSlug($slug)->first();
        $posts = $category->posts()->paginate(9);

        return view('web.category-posts', compact('category', 'posts'));
    }
}
