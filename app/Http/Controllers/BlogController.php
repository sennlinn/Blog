<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getIndex(){
        $posts =Post::paginate(4);
        return view('blog.index')->withPosts($posts);
    }
    public function getSingle($slug)
    {
        //fetch from the DB based on slug
        $post = Post::where('slug', '=', $slug)->first();
//return the view and past in the post object
        return view('blog.single')->withPost($post);
    }
}
