<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Post $post)
    {
        return view('home')->with([
            'posts' => $post->latestFirst()->isLive()->get(),
        ]);
    }

    public function tagged(Tag $tag)
    {
        return view('posts.tag')->with([
            'posts' => $tag->posts()->latestFirst()->isLive()->get(),
            'tag' => $tag,
        ]);
    }
}
