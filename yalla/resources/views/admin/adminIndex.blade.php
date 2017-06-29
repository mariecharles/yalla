@include('admin.head')

<body id="admin-home">

@include('admin.headeraside')

<main>
    <div class="inner">
        <section class="all-articles">
            <div class="head-all-articles">
                <div class="filters">
                    <a class="active">Tous les articles <span>({{ $count }})</span></a>
                    <span class="post-online">Articles en ligne ({{ $online }})</span>
                    <span class="post-offline">Articles hors ligne ({{ $offline }})</span>
                </div>
                <div class="vue">
                    <span class="active">o</span>
                    <span>o</span>
                </div>
            </div>
            <div class="content">
                @foreach ($posts as $post)
                    <article>
                        <a href="{{url('admin/modifier-un-article/'. $post->id)}}" class="container">
                            <div class="infos">
                                <h3>{{ $post->title }}</h3>
                                <span class="author">Ecrit par <b>{{ $post->written_by }}</b></span>
                                <div class="author">Langue: <b>{{ $post->lang }}</b></div>
                            </div>
                            <div class="post-status online">
                                <span class="round"></span>
                                {{ Form::open(['route' => ['post.publish', $post->id], 'method' => 'put']) }}
                                    <button type="submit" class="status">Article en ligne</button>
                                {{ Form::close() }}
                            </div>
                            <div class="date-published">
                                <p>Publié le <b class="return">{{ $post->created_at->format('d F Y') }}</b></p>
                            </div>
                            <div class="category">
                                <span class="cat">{{ $post->category->name }}</span>
                            </div>
                        </a>
                        <div class="actions">
                            <div class="more">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="menu-actions">
                                <ul>
                                    {{ Form::open(['route' => ['post.save', $post->id], 'method' => 'delete']) }}
                                         <li><a href=""><button type="submit">Archiver</button></a></li>
                                    {{ Form::close() }}
                                    {{ Form::open(['route' => ['post.delete', $post->id], 'method' => 'delete']) }}
                                         <li><a href=""><button type="submit" class="delete-btn">Supprimer</button></a></li>
                                    {{ Form::close() }}
                                </ul>
                            </div>
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
                            <h3>Nouveaux membres</h3>
                            <span class="last-date">Depuis le 01/06/17</span>
                        </div>

                        <span class="nb">{{ $memberCount }}</span>
                    </a>
                </div>
                <div class="dons">
                    <a href="">
                        <div class="head">
                            <h3>Nombre de vues</h3>
                            <span class="last-date">Depuis le 01/06/17</span>
                        </div>

                        <span class="nb">{{ $views }}</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
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


    var more_actions = document.querySelectorAll('#admin-home .all-articles .more');
    var menu_actions = document.querySelectorAll('#admin-home .all-articles .menu-actions');



    for (let i = 0; i < more_actions.length; i++) {
        more_actions[i].addEventListener('click', function() {
            menu_actions[i].classList.toggle('on');
        });
    }


</script>
</html>