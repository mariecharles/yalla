<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="wslugth=device-wslugth, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <title>Document</title>
</head>
<body>
<h1><?= isset($post->slug)?'Modifier l\'article':'Ajouter un article'; ?></h1>

{!! Form::open(isset($post->slug)?['url' => route('post.update', $post->id), 'method' => 'put', 'files' => true]:['url' => route('post.add'), 'files' => true]) !!}

    {!! Form::label('title', 'Titre de l\'article') !!}
    {!! Form::text('title', isset($post->slug)?$post->title:'') !!}

    {!! Form::label('img', 'Image') !!}
    {!! Form::file('img', '') !!}

    {!! Form::label('content', 'Contenu') !!}
    {!! Form::textarea('content', isset($post->slug)?$post->content:'') !!}

    {!! Form::label('resume', 'Résumé') !!}
    {!! Form::textarea('resume', isset($post->slug)?$post->resume:'') !!}

    {!! Form::label('slug', 'Nom dans l\'URL') !!}
    {!! Form::text('slug', isset($post->slug)?$post->slug:'') !!}

    {!! Form::label('lang', 'Langue principale de l\'article') !!}
    {!! Form::select('lang', array('fr' => 'français', 'en' => 'anglais', 'ar' => 'arabe'), isset($post->slug)?$post->lang:'' ) !!}

    {!! Form::label('category_id', 'Catégorie') !!}
    {!! Form::select('category_id', App\Category::pluck('name','id'), isset($post->slug)?$post->category->name:'') !!}

    {!! Form::label('tags', 'Tags') !!}

    <ul>
        <?php foreach ($tags as $tag):?>

            <li><?=$tag->name?></li>

        <?php endforeach; ?>

    </ul>

    {!! Form::text('tags', isset($post->slug)?$tag->name:'') !!}

    {!! Form::label('meta_description', 'Description pour le référencement') !!}
    {!! Form::textarea('meta_description', isset($post->slug)?$post->meta_description:'') !!}

    <button type="submit"><?= isset($post->slug)?'Modifier':'Ajouter'?></button>

{!! Form::close() !!}
</body>
</html>