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
<section>
    <?php foreach ($messages as $message):?>

    <p><?=$message->name?></p>
    <p><?=$message->mail?></p>

    <a href="<?=url('admin/messages/'. $message->id)?>">Voir</a>
    <a href="<?=url('admin/modifier-un-membre/'. $member->id)?>">Modifier un membre</a>

    {{ Form::open(['route' => ['message.delete', $->id], 'method' => 'delete']) }}
    <button type="submit">Supprimer</button>
    {{ Form::close() }}


    <?php endforeach; ?>
</section>
</body>
</html>