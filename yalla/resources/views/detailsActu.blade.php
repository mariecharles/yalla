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
    <p><?=$post->category->name?></p>
    <p><?=$post->title?></p>
    <p><?=$post->created_at?></p>
    <p><?=$post->content?></p>

    <?php foreach ($post->tag as $el):?>

        <p><?=$el->name?></p>

    <?php endforeach;?>
</body>
</html>