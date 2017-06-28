<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/stylesheets/screen.css') }}">
    <title>Yalla! Pour les Enfants - Défendons les droits humains</title>

    <meta property="og:site_name" content="Amnesty France">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site" content="@amnestyfrance">
    <meta name="description" content="Suivez toute l'actualité et les derniers sujets sur les droits humains sur Amnesty International">

    <!-- balises facebook -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="Amnesty International France - Défendons les droits humains">
    <meta property="og:description" content="Suivez toute l'actualité et les derniers sujets sur les droits humains sur Amnesty International">
    <meta property="og:image" content="">

    <!-- balises twitter -->
    <meta name="twitter:title" content="Amnesty International France - Défendons les droits humains">
    <meta name="twitter:description" content="Suivez toute l'actualité et les derniers sujets sur les droits humains sur Amnesty International">
    <meta name="twitter:image" content="">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- tinyMCE links -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea[name=content]' });</script>
</head>

<body id="admin-articles">

<header>
    <div class="inner">
        <div id="admin-actions">
            <div class="ctas">
                <span class="cta new-volunteer"><a href="{{url('admin/ajouter-un-membre')}}">+ Ajouter un membre</a></span>
                <span class="cta new-article"><a href="{{url('admin/ajouter-un-article')}}">+ Nouvel article</a></span>
            </div>
            <div class="icon-action">
                <div class="messages">
                    <span class="nb-message">OO<span class="push"></span></span>
                    <div class="my-messages">
                        <h3>Mes messages reçus</h3>
                    </div>
                </div>
                <div class="notifications">
                    <span class="nb-notifs">UU <span class="push"></span></span>
                    <div class="my-notifs">
                        <h3>Mes notifications reçues</h3>
                    </div>
                </div>
                <div class="my-space"><span>MM</span></div>
            </div>
        </div>
    </div>
</header>
<nav id="admin-aside">
    <ul>
        <li class="active"><a href="{{url('admin')}}">Tableau de bord</a></li>
        <li><a href="{{url('admin/articles')}}">Articles</a></li>
        <li><a href="{{url('admin/membres')}}">Membres</a></li>
    </ul>
</nav>
<body>
<main>
    <section id="admin-add-article">
        <h2>{{isset($post->slug)?'Modifier l\'article':'Ecrire un nouvel article'}}</h2>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(isset($post->slug)?['url' => route('post.update', $post->id), 'method' => 'put', 'files' => true]:['url' => route('post.add'), 'files' => true]) !!}

        {{ csrf_field() }}

            <div class="wrapper">
                <div class="main-content">

                    {!! Form::text('title', isset($post->slug)?$post->title:'', array('placeholder'=>'Entrez un titre'))!!}

                    {!! Form::text('slug', isset($post->slug)?$post->slug:'', array('placeholder'=>'Entrez un nom pour l\'URL')) !!}

                    {!! Form::file('img') !!}

                    @if (isset($post->slug))
                        <img src="{{ asset('/img-content/' . $post->img) }}" alt="Image de l'article">
                    @endif

                    {!! Form::label('content', 'Contenu') !!}
                    {!! Form::textarea('content', isset($post->slug)?$post->content:'') !!}

                </div>
                <!-- end of main-content -->
                <div class="aside-content">
                    <h3>Options de publication</h3>
                    <div class="status">
                        <span>Statut</span>
                        {!! Form::select('visible', array('1' => 'En ligne', '2' => 'Hors ligne'), isset($post->slug)?$post->visible:'' ) !!}
                    </div>
                    <div class="visibility">
                        <span>Catégories</span>
                        {!! Form::select('category_id', App\Category::pluck('name','id'), isset($post->slug)?$post->category->name:'') !!}
                    </div>
                    <div class="visibility">
                        <span>Langue</span>
                        {!! Form::select('lang', array('fr' => 'français', 'en' => 'anglais', 'ar' => 'arabe'), isset($post->slug)?$post->visible:'' ) !!}
                    </div>
                    <div class="desc">
                        <span>Méta description</span>
                        {!! Form::textarea('resume', isset($post->slug)?$post->resume:'') !!}
                    </div>
                    <div class="add-tags">
                        <span>Tags associés</span>
                        <input type="text" name="tags" placeholder="Commencez à taper...">
                        {!! Form::hidden('tags', isset($post->slug)?$post->tag()->fisrt()->name:'', array('class' => 'tag-hidden')) !!}
                        <div class="all-tags">
                        </div>
                    </div>
                    <button type="submit">{{isset($post->slug)?'Modifier':'Publier'}}</button>
                    <!-- <button class="set-draft">Enregistrer comme brouillon</button> -->
                </div>
                <!-- end of aside content -->
            </div>
        {!! Form::close() !!}

    </section>
</main>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/scripts.js') }}"></script>
</body>
</html>