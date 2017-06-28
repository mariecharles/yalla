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
    <script>tinymce.init({ selector:'textarea.article-content' });</script>
</head>

<body id="admin-new-partner">

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
        <li><a href="{{url('admin/partenaires')}}">Partenaires</a></li>
        <li><a href="{{url('admin/membres')}}">Membres</a></li>
    </ul>
</nav>
<main>
    <div class="head">
        <span class="go-back">
          <a href="{{url('admin/partenaires')}}"><i>i</i> Retour à la liste des partenaires</a>
        </span>
    </div>
    <div class="new-partner">
        {!! Form::open(['url' => route('partner.add')]) !!}
            <div class="partner-img">
                <figure><img src="{{ asset('/img-content/placeholder.png') }}" alt="Image par défaut"></figure>
                {!! Form::file('logo') !!}
            </div>
            <div class="container">
                <div class="partner-name">
                    {!! Form::label('name', 'Nom du partenaire') !!}
                    {!! Form::text('name', '') !!}
                </div>
                <input type="submit" value="Ajouter ce partenaire" class="submit">
            </div>
        {!! Form::close() !!}
    </div>
</main>
</body>
</html>
