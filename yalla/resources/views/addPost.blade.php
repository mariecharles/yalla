<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <title>Document</title>
</head>
<body>
<h1>Ajouter un article</h1>
{!! Form::open(['method' => 'put']) !!}

    {!! Form::label('title', 'Titre de l\'article') !!}
    {!! Form::text('title', '') !!}
    {!! Form::label('img', 'Image') !!}
    {!! Form::file('img') !!}
    {!! Form::label('content', 'Contenu') !!}
    {!! Form::textarea('title', 'Ici votre texte...') !!}

{!! Form::close() !!}
</body>
</html>