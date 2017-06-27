<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

{!! Form::open(['url' => route('category.add')]) !!}

{{ csrf_field() }}

{!! Form::label('name', 'Nom de la catégorie') !!}
{!! Form::text('name','') !!}

{!! Form::label('slug', 'Nom dans l\'URL') !!}
{!! Form::text('slug','') !!}

<button type="submit">Ajouter</button>

{!! Form::close() !!}

</body>
</html>