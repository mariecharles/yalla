<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;
use App\Post;
use App\Category;

class AdminController extends Controller
{

    public function Index()
    {
        $posts = Post::with('category','tag')->get();

        $categories = Category::all();

        $members = Member::all();

        $view = view('adminIndex', compact('posts','categories','members'));


        return $view;

    }

    //DETAILS POST

    public function actuDetails($param)
    {

        $post = Post::with('category','tag')
            ->where('slug', $param)
            ->orWhere('id', $param)->get();


        $post = $post->first();

        $view = view('adminDetailsActu', compact('post'));

        return $view;

    }

    //SUPPRIMER UN POST

    public function postDeleteAction($id)
    {
       Post::where('id', $id)->delete();

        return redirect()->action(
        'AdminController@index');
    }




}
