<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            'posts' => $this->getPosts(),
            'categories' => Category::all()
        ]);
    }
    public function show(Post $post){
        return view('post', [
            'post' => $post
        ]);
    }

    public function getPosts(){
		return Post::latest()->filter()->get();
	}

}
