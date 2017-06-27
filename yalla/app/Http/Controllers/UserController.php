<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Message;


class UserController extends Controller
{
    public function index()
    {

        $posts = Post::with('category','tag')
            ->where('active', 1)->get();

        $view = view('user.index', compact('posts'));

        return $view;

    }

    public function pageActu()
    {

        $posts = Post::with('category','tag')
            ->where('active', 1)->get();

        $categories = Category::all();

        $view = view('user.pageActu', compact('posts','categories'));


        return $view;

    }

    public function actuDetails($slug)
    {

        $post = Post::with('category','tag')
                ->where('slug', $slug)->get();

        $post = $post->first();

        $view = view('user.detailsActu', compact('post'));

        return $view;

    }

    public function messageAddAction(Request $request)
    {

        $requete = $request->all();

        $ValidationRules = [

            'name' => 'required|string',
            'mail' => 'required|email',
        ];

        $validationMessages = [

            'name.required' => 'Vous devez renseigner un code postal',
            'mail.required' => 'vous devez renseigner un numéro de téléphone'

        ];

        $this->validate($request, $ValidationRules, $validationMessages);

        Message::create($requete);

        return 'Votre message a été envoyé avec succès !';

    }


}
