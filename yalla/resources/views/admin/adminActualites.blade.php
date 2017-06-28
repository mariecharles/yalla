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
        <li><a href="{{url('admin/partenaires')}}">Partenaires</a></li>
        <li><a href="{{url('admin/membres')}}">Membres</a></li>
    </ul>
</nav>
<main>
    <section id="admin-all-articles">

        <div class="head-all-articles">
            <div class="filters">
                <a class="active">Tous les articles <span>({{ $count }})</span></a>
                <span class="post-online">Articles en ligne ({{ $online }})</span>
                <span class="post-offline">Articles hors ligne ({{ $offline }})</span>
            </div>
        </div>

        <div class="order-by">
            <label for="">Trier par : </label>
            <select name="" id="">
                <option value="">Date de création</option>
                <option value="">Auteur</option>
            </select>
        </div>

        <div class="head">
            <!-- <h2><span>-</span> Tous les articles</h2> -->
            <div class="actions">
                <div class="selected">
                    <input type="checkbox">
                    <label for="">Tous les articles</label>
                </div>
                <div class="uncheck">
                    <span>Décocher toutes les cases</span>
                </div>
                <div class="action-status">
                    <label for="">Mettre :</label>
                    <select name="" id="">
                        <option value="">En ligne</option>
                        <option value="">Hors ligne</option>
                    </select>
                </div>
                <div class="delete">
                    <span><i>pp</i> Supprimer</span>
                </div>
            </div>
            <!-- end of actions -->
        </div>
        <!-- end of head -->

        <div id="admin-view-articles">
            @foreach ($posts as $post)
                <article>
                    <div class="checkbox">
                        <input type="checkbox">
                    </div>
                    <a href="{{url('admin/modifier-un-article/'. $post->id)}}" class="container">
                        <div class="infos">
                            <h3>{{$post->title}}</h3>
                            <span class="author">Ecrit par <b>{{ $post->written_by }}</b></span>
                        </div>
                        <div class="post-status online">
                            <span class="round"></span>
                            <span class="status">
                                {{ Form::open(['route' => ['post.publish', $post->id], 'method' => 'put']) }}
                                    <button type="submit" class="status">Article en ligne</button>
                                {{ Form::close() }}
                            </span>
                        </div>
                        <div class="date-published">
                            <p>Publié le <b class="return">{{$post->created_at->format('d F Y')}}</b></p>
                        </div>
                        <div class="category">
                            <span class="cat">{{$post->category->name}}</span>
                        </div>
                    </a>

                    <div class="actions">
                        <span>v</span>
                        <span>m</span>
                        <span>d</span>
                    </div>
                </article>
            @endforeach

                <p>{{$posts->links()}}</p>

        </div>
        <!-- end of admin view articles -->

        </div>
    </section>

</main>

</body>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/scripts.js') }}"></script>
<script>

    var postStatus = document.querySelectorAll('.filters span');


    for ( var i = 0 ; i < postStatus.length ; i++ ) {

        postStatus[i].addEventListener('click', function (event) {

            if (this.className == 'post-online')  {

                axios.get('api/posts?active=1').then(function(data) {

                    console.log(data);

                });

            } else if (this.className == 'post-offline') {

                axios.get('api/posts?active=0').then(function(data) {

                    console.log(data);
                });

            }
        });
    }
</script>

</html>
