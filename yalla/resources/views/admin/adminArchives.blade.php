@include('admin.head')

<body id="admin-articles">

@include('admin.headeraside')

<main>
    <section id="admin-all-articles">

        <div class="order-by">
            <label for="">Trier par : </label>
            <select name="" id="">
                <option value="">Date de création</option>
                <option value="">Auteur</option>
            </select>
        </div>

        <h2>Historique des articles</h2>

        <div id="admin-view-articles">

            @foreach ($archives as $archive)
                <article>
                    <a href="" class="container">
                        <div class="infos">
                            <h3>{{ $archive->title }}</h3>
                            <span class="author">Ecrit par <b>{{ $archive->written_by }}</b></span>
                            <div class="author">Langue: <b>{{ $archive->lang }}</b></div>
                        </div>
                        <div class="post-status online">
                            <span class="round"></span>
                            {{ Form::open(['route' => ['post.publish', $archive->id], 'method' => 'put']) }}
                            <button type="submit" class="status">Article en ligne</button>
                            {{ Form::close() }}
                        </div>
                        <div class="date-published">
                            <p>Publié le <b class="return">{{$archive->created_at->format('d F Y')}}</b></p>
                        </div>
                    </a>

                    <div class="actions">
                        <span>v</span>
                        <span>m</span>
                        <span>d</span>
                    </div>
                </article>
            @endforeach

            @include('pagination', ['paginator' => $archives])

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
