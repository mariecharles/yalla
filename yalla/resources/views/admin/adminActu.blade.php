@include('admin.head')

<body id="admin-articles">

@include('admin.headeraside')

<main>
    <section id="admin-all-articles">
        <div class="head-all-articles">
            <div class="filters">
                <a class="active">Tous les articles <span>({{ $count }})</span></a>
                <a href="">Articles en ligne <span>({{ $online }})</span></a>
                <a href="">Articles hors ligne <span>(1{{ $offline }})</span></a>
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
                    <input type="checkbox" class="select-all">
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
                    <a href="" class="container">
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
                            <p>Publié le <b class="return">{{$post->created_at->format('d F Y')}}</b></p>
                        </div>
                    </a>

                    <div class="actions">
                        <span>v</span>
                        <span>m</span>
                        <span>d</span>
                    </div>
                </article>
            @endforeach

            @include('pagination', ['paginator' => $posts])

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
