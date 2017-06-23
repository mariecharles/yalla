<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    //AJOUTER UN POST

    public function postAddAction()
    {
        $view = view('addPost');

        return $view;
    }
}
