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

    {!! Form::open(['url' => route('message.add')]) !!}

         {{ csrf_field() }}

        {!! Form::label('name', 'Nom, Prénom') !!}
        {!! Form::text('name','') !!}

        {!! Form::label('mail', 'E-mail') !!}
        {!! Form::text('mail','') !!}

        {!! Form::label('content', 'Votre message') !!}
        {!! Form::text('content','') !!}

        <button type="submit">Envoyer</button>

    {!! Form::close() !!}

</body>
</html>