<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use App\Member;

class PageController extends Controller
{

    public function postAddAction()
    {
        $view = view('admin.postForm', compact('tags'));

        return $view;
    }

    public function postEditAction($id)
    {
        $post = Post::with('category','tag')
            ->where('id', $id)->get();

        $post = $post->first();

        $view = view('admin.postForm', compact('post'));

        return $view;
    }

    public function memberAddAction()
    {
        $view = view('admin.memberForm');

        return $view;
    }

    public function categoryAddAction()
    {
        $view = view('admin.categoryForm');

        return $view;
    }

    public function memberEditAction($id)
    {
        $member = Member::where('id', $id)->get();

        $member = $member->first();

        $view = view('admin.memberForm', compact('member'));

        return $view;
    }

    public function contactAction()
    {
        $view = view('user.contact');

        return $view;
    }

    public function partnerAddAction()
    {
        $view = view('admin.partnerForm');

        return $view;
    }


}
