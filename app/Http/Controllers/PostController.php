<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('index')->with(['posts' => $post->getPaginate()]);
    }
    public function show(Post $post)
    {
        return view('show')->with(['posts' => $post]);
    }
    public function create()
    {
        return view('create');
    }
    public function store(Post $post , PostRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
