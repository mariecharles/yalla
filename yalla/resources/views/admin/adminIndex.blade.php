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
</head>

<body id="admin-home">

<header class="opn">
    <div id="bm">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="inner">
        <div id="admin-actions">
            <div class="ctas">
                <span class="cta"><a href="<?=url('admin/ajouter-un-article')?>">+ Nouvel article</a></span>
                <span class="cta"><a href="<?=url('admin/ajouter-un-membre')?>">+ Ajouter un membre</a></span>
            </div>
            <div class="icon-action">
                <div class="message">OO<span class="push">2</span></div>
                <div class="notification">UU <span class="push">1</span></div>
                <span>MM</span>
            </div>
        </div>
    </div>
</header>

<nav id="admin-aside">
    <ul>
        <li class="active"><a href="">Tableau de bord</a></li>
        <li><a href="admin-articles.html">Articles</a></li>
        <li><a href="">Membres</a></li>
        <li><a href="">Bénévoles</a></li>
    </ul>
</nav>

<main>
    <div class="inner">
        <section class="all-articles">
            <div class="head">
                <h2 class="active">Tous les articles <span>({{ $count }})</span></h2>
                <span class="post-online">En ligne ({{ $online }})</span>
                <span class="post-offline">Hors ligne <span>({{ $offline }})</span>
            </div>
            <p class="content">
                @foreach ($posts as $post)
                    <article>
                        <a href="{{ url('admin/details/'. $post->slug) }}">
                            <h3>{{ $post->title }}</h3>
                            <div class="infos">
                                <span class="post-status">Billet publié le <span class="date">{{ $post->created_at }}</span></span>
                            </div>
                        </a>
                        <div class="actions">
                            {{ Form::open(['route' => ['post.publish', $post->id], 'method' => 'put']) }}
                                <button type="submit">Dépublier</button>
                            {{ Form::close() }}
                            <a href="{{ url('admin/modifier-un-article/'. $post->id)}}">Modifier un article</a>
                            <a href="{{ url('admin/save/'. $post->id) }}">Archiver</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
        <section class="stats">
            <div class="quick-stats">
                <div class="parrains">
                    <a href="">
                        <div class="head">
                            <h3>Nouveaux parrains</h3>
                            <span class="last-date">Depuis le 01/06/17</span>
                        </div>

                        <span class="nb">46 <sup>€</sup></span>
                    </a>
                </div>
                <div class="dons">
                    <a href="">
                        <div class="head">
                            <h3>Nombre de dons</h3>
                            <span class="last-date">Depuis le 01/06/17</span>
                        </div>

                        <span class="nb">5</span>
                    </a>
                </div>
                <div class="dons">
                    <a href="">
                        <div class="head">
                            <h3>Somme des dons</h3>
                            <span class="last-date">Depuis le 01/06/17</span>
                        </div>
                        <span class="nb">3</span>
                    </a>
                </div>
            </div>

            <div class="tab">
                <h2>Statistiques</h2>

                <select name="" id="">
                    <option value="">Cette semaine <i>o</i></option>
                    <option value="">Ce mois <i>o</i></option>
                </select>

                <div class="stats-frame">
                    <h3>à remplacer</h3>
                </div>
            </div>
        </section>
    </div>
</main>


</body>
<script src="js/app.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

    var postStatus = document.querySelectorAll('div.head span');


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
