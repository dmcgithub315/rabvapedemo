<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    function latestPosts()
    {
        $posts = Post::query()->where('post_type', 'post')->where('post_status', 'publish')->get();
        return view('welcome', compact('posts'));
    }
}
