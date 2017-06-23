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

<?php foreach ($posts as $post):?>

    <p><?=$post->title?></p>
    <p><?=$post->content?></p>
    <p><?=$post->category->name?></p>

    <?php foreach ($post->tag as $el):?>

        <p><?=$el->name?></p>

    <?php endforeach;?>

    <a href="<?=url('actualites/'. $post->slug)?>">Détails</a>

<?php endforeach;?>

</body>
</html>