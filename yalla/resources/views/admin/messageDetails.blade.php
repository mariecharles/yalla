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
    De <p><?=$message->name?>,<?=$message->mail?></p>
    <p><?=$message->content?></p>

    {!! Form::open(['url' => route('send.message')]) !!}

    {!! Form::label('message', 'Répondre') !!}
    {!! Form::textarea('message','') !!}

    <button type="submit">Envoyer</button>

    {!! Form::close() !!}


</body>
</html>