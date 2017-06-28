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

<body id="admin-new-volunteer">

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
    <section class="new-volunteer">
        <h2>{{isset($member->lastname)?'Modifier le membre':'Ajouter un membre'}}</h2>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(isset($member->lastname)?['url' => route('member.update', $member->id), 'method' => 'put']:['url' => route('member.add')]) !!}

            {{ csrf_field() }}
            <div class="new-img">
                <h3>Image du profil</h3>
                <div class="content">
                    <figure>
                        <span>img</span>
                    </figure>
                    {!! Form::file('img', '') !!}
                </div>
            </div>
            <div class="infos">
                <h3>Information du profil</h3>
                <div class="content">
                    <div class="field">
                        {!! Form::label('lastname', 'Nom') !!}
                        {!! Form::text('lastname', isset($member->lastname)?$member->lastname:'') !!}
                    </div>
                    <div class="field">
                        {!! Form::label('firstname', 'Prénom') !!}
                        {!! Form::text('firstname', isset($member->lastname)?$member->firstname:'') !!}
                    </div>
                    <div class="field">
                        {!! Form::label('birth_date', 'Date de naissance') !!}
                        {!! Form::date('birth_date', isset($member->lastname)?$member->birth_date:'' ) !!}
                    </div>
                </div>
            </div>
            <div class="status">
                <h3>Statut et fonction</h3>
                <div class="content">
                    <div class="field">
                        <label for="">Statut *</label>
                        {!! Form::select('status', array('Bénévole' => 'Bénévole', 'Administrateur' => 'Administrateur'), isset($member->lastname)?$member->status:'' ) !!}
                    </div>
                    <div class="field">
                        <label for="">Fonction *</label>
                        {!! Form::text('activity', isset($member->lastname)?$member->activity:'') !!}
                    </div>
                </div>
            </div>
            <div class="place">
                <h3>Lieu de vie</h3>
                <div class="content">
                    <div class="field">
                        <label for="">Ville *</label>
                        {!! Form::text('city', isset($member->lastname)?$member->city:'') !!}
                    </div>
                    <div class="field">
                        <label for="">Pays *</label>
                        {!! Form::text('country', isset($member->lastname)?$member->country:'') !!}
                    </div>
                </div>
            </div>
            <button type="submit"><?= isset($member->lastname)?'Modifier le membre':'Ajouter le membre'?></button>

        {!! Form::close() !!}

        <span>* Information obligatoire</span>

    </section>
</main>
</body>
</html>