@include('admin.head')

<body id="admin-articles">

@include('admin.headeraside')

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

                        @else
                        <img src="{{ asset('/img-content/placeholder.png') }}" alt="Image par défaut">
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
                        <span>Meta description</span>
                        {!! Form::textarea('resume', isset($post->slug)?$post->resume:'') !!}
                    </div>
                    <div class="add-tags">
                        <span>Tags associés</span>
                        <input type="text" name="tags" placeholder="Commencez à taper...">
                        {!! Form::hidden('tags', '', array('class' => 'tag-hidden')) !!}
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