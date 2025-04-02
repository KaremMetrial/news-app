<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('images')->latest()->paginate(9);

        $most_view = Post::orderBy('num_of_views', 'desc')->limit(3)->get();

        return view('web.index', compact('posts', 'most_view'));
    }
}
