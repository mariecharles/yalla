<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="wlastnameth=device-wlastnameth, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <title>Document</title>
</head>
<body>
<h1>Ajouter un nouveau partenaire</h1>

{!! Form::open(['url' => route('partner.add')]) !!}

{{ csrf_field() }}

{!! Form::label('name', 'Nom') !!}
{!! Form::text('name', '') !!}

{!! Form::label('logo', 'Image') !!}
{!! Form::file('logo') !!}


<button type="submit">Ajouter</button>

{!! Form::close() !!}
</body>
</html>