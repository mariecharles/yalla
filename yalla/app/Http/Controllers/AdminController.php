<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;
use App\Post;
use App\Category;
use App\Archive;
use App\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;



class AdminController extends Controller
{
    
    public function Index()
    {
        $posts = Post::with('category','tag')->get();;

        $count = Post::get()->count();

        $memberCount = Member::where('created_at', '<=', date('2017-june-1').' 00:00:00')->get()->count();

        $online = Post::where('active', 1)->get()->count();
        $offline = Post::where('active', 0)->get()->count();


        $view = view('admin.adminIndex', compact('posts', 'count', 'online','offline', 'memberCount'));

        return $view;

    }

    public function upload($file)
    {

        $destinationPath = 'img-content';

        $extension = $file->getClientOriginalExtension();

        $fileName = rand(11111,99999).'.'.$extension;

        $file->move($destinationPath, $fileName); // uploading file to given path

        return $fileName;
    }


    public function categoryAddAction(Request $request)
    {
        $requete = $request->all();

        Category::create($requete);

        return redirect()->action('AdminController@index');

    }

    public function ActuAction()
    {
        $posts = Post::with('category','tag')->paginate(1);

        $count = Post::get()->count();

        $online = Post::where('active', 1)->get()->count();
        $offline = Post::where('active', 0)->get()->count();

        $view = view('admin.adminActualites', compact('posts', 'count', 'online','offline'));

        return $view;

    }


    //DETAILS POST

    public function actuDetails($slug)
    {

        $post = Post::with('category','tag')
            ->where('slug', $slug)->get();


        $post = $post->first();

        $view = view('admin.adminDetailsActu', compact('post'));

        return $view;

    }

    //SUPPRIMER UN POST

    public function postDeleteAction($id)
    {
       Post::where('id', $id)->delete();

        return redirect()->action('AdminController@index');
    }

    //AJOUTER UN POST

    public function postAddAction(Request $request)
    {

      $requete = $request->all();

       if($request->hasfile('img'))
        {
            $image = $this->upload($request->file('img'));

            $requete['img'] = $image;
        }

      $ValidationRules = [

        'title' => 'required|string|min:5',
        'slug' => 'required|string|min:5',
        'content' => 'required',
        'resume' => 'required',
      ];

      $validationMessages = [

        'title.required' => 'Vous devez renseigner un titre pour cet article',
        'slug.required' => 'Vous devez renseigner un nom pour l\'URL',
        'content.required' => 'Vous devez renseigner le contenu de l\'article',
        'resume.required' => 'Vous devez renseigner un résumé pour votre article: celui-ci sera nécessaire pour son référencement',
       ];


      $this->validate($request, $ValidationRules, $validationMessages);


      $post = Post::create($requete);
      $post->saveTags($request->get('tags'));

      return redirect()->action('AdminController@index');


    }

    //MODIFIER UN POST

    public function postUpdateAction($id, Request $request)
    {
        $requete = $request->all();

        if($request->hasfile('img'))
        {
            $image = $this->upload($request->file('img'));

            $requete['img'] = $image;
        }

        $post = Post::find($id);

        $ValidationRules = [

            'title' => 'required|string|min:5',
            'slug' => 'required|string|min:5',
            'content' => 'required',
            'resume' => 'required'
        ];

        $validationMessages = [

            'title.required' => 'Vous devez renseigner un titre pour cet article',
            'slug.required' => 'Vous devez renseigner un nom pour l\'URL',
            'content.required' => 'Vous devez renseigner le contenu de l\'article',
            'resume.required' => 'Vous devez renseigner un résumé pour votre article: celui-ci sera nécessaire pour son référencement',
        ];


        $this->validate($request, $ValidationRules, $validationMessages);

        $post->update($requete);

        $post->saveTags($request->get('tags'));

        return redirect()->action('PageController@postEditAction', $id);

    }

    //ARCHIVER UN POST

    public function postSaveAction($id)
    {
        $post = Post::where('id', $id)->get();

        $post = $post->first();

        $save = new Archive();

        $save->saved_id = $post->id;
        $save->slug = $post->slug;
        $save->title = $post->title;
        $save->content = $post->content;
        $save->img = $post->img;
        $save->active = $post->active;
        $save->lang = $post->lang;
        $save->resume = $post->resume;
        $save->created_at = $post->created_at;

        $save->save();

        $post->delete();


      return redirect()->action('AdminController@index');
    }

    //PUBLIER/DEPUBLIER UN POST

    public function postPublishAction($id)
    {

        $post = Post::find($id);

       if ($post->active == 1)
       {
           $post->active = 0;

       } else {

           $post->active = 1;
       }

        $post->update();

        return redirect()->action('AdminController@index');


    }


    //TOUS LES MEMBRE

    public function getMembers()
    {

        $count = Member::get()->count();

        $admin = Member::where('status', 'Administrateur')->get()->count();

        $benevole = Member::where('status', 'Bénévole')->get()->count();

        $members = Member::paginate(1);;
        $view = view('admin.adminAllMembers', compact('members', 'count', 'admin', 'benevole'));

        return $view;
    }

    //DETAILS MEMBRE

    public function memberDetails($id)
    {

        $member = Member::where('id', $id)->get();

        $member = $member->first();

        $view = view('admin.adminDetailsMember', compact('member'));

        return $view;

    }

    // SUPPRIMER UN MEMBRE

    public function memberDeleteAction($id)
    {
        Member::where('id', $id)->delete();

        return redirect()->action('AdminController@index');
    }

    //AJOUTER UN MEMBRE

    public function memberAddAction(Request $request)
    {

        $requete = $request->all();

        if($request->hasfile('img'))
        {
            $image = $this->upload($request->file('img'));

            $requete['img'] = $image;
        }

        /*$ValidationRules = [

            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'phone' => 'required'

        ];

        $validationMessages = [

            'lastname.required' => 'Vous devez renseigner un nom',
            'firstname.required' => 'Vous devez renseigner un prénom',
            'address.required' => 'Vous devez renseigner une adresse',
            'city.required' => 'Vous devez renseigner une ville',
            'postal_code.required' => 'Vous devez renseigner un code postal',
            'phone.required' => 'vous devez renseigner un numéro de téléphone'

        ];


        $this->validate($request, $ValidationRules, $validationMessages);*/

        Member::create($requete);

        return redirect()->action('AdminController@index');

    }

    //MODIFIER UN MEMBRE

    public function memberUpdateAction($id, Request $request)
    {
        $requete = $request->all();

        $member = Member::find($id);

        $member->update($requete);

        return redirect()->action('AdminController@index');

    }


    public function getArchives()
    {
        $archives = Archive::all();

        $view = view('admin.postsArchives', compact('archives'));


        return $view;

    }

    public function getMessages()
    {
        $messages = Message::all();

        $view = view('admin.messages', compact('messages'));


        return $view;

    }

    public function messageDetails($id)
    {
        $message = Message::where('id', $id)->get();

        $message = $message->first();

        $view = view('admin.messageDetails', compact('message'));

        return $view;
    }

    public function sendMessageAction(Request $request)
    {
        Mail::send('admin.messageDetails',  array(

            'message' => $request->get('message')

        ), function($message) {

                $message->to('marie-charles@sfr.fr');

        });
    }

    public function messageDeleteAction($id)
    {

        Message::where('id', $id)->delete();

        return redirect()->action('AdminController@getMessages');

    }


}
