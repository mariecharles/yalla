<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;


class UserController extends Controller
{
    public function index()
    {

        $posts = Post::with('category','tag')
            ->where('active', 1)->get();

        $view = view('index', compact('posts'));

        return $view;

    }

    public function pageActu()
    {

        $posts = Post::with('category','tag')
            ->where('active', 1)->get();

        $categories = Category::all();

        $view = view('pageActu', compact('posts','categories'));


        return $view;

    }

    public function actuDetails($param)
    {

        $post = Post::with('category','tag')
                ->where('slug', $param)
                ->orWhere('id', $param)->get();


        $post = $post->first();

        $view = view('detailsActu', compact('post'));

        return $view;

    }


}
