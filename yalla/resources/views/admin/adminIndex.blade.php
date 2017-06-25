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

<a href="<?=url('admin/ajouter-un-article')?>">Ajouter un article</a>

    <section>
        <a href="<?=url('admin/ajouter-une-catégorie')?>">Ajouter une catégorie</a>
        <?php foreach ($categories as $category):?>

            <button><?=$category->name?></button>

        <?php endforeach; ?>
    </section>
    <section>
        <?php foreach ($posts as $post):?>

            <p><?=$post->title?></p>
            <p><?=$post->content?></p>
            <p><?=$post->category->name?></p>

            <?php foreach ($post->tag as $el):?>

                <p><?=$el->name?></p>

            <?php endforeach;?>

            <a href="<?=url('admin/details/'. $post->slug)?>">Détails</a>
            <a href="<?=url('admin/modifier-un-article/'. $post->id)?>">Modifier un article</a>
            {{ Form::open(['route' => ['post.publish', $post->id], 'method' => 'put']) }}
            <button type="submit">Publié =)</button>
            {{ Form::close() }}
            <a href="<?=url('admin/save/'. $post->id)?>">Archiver</a>
            {{ Form::open(['route' => ['post.delete', $post->id], 'method' => 'delete']) }}
            <button type="submit">Supprimer</button>
            {{ Form::close() }}


        <?php endforeach; ?>
    </section>

<a href="<?=url('admin/ajouter-un-membre')?>">Ajouter un membre</a>

    <section>
        <?php foreach ($members as $member):?>

            <p><?=$member->lastname?></p>
            <p><?=$member->firstname?></p>
            <p><?=$member->date_birth?></p>
            <a href="<?=url('admin/adherants/'. $member->id)?>">Détails</a>
            <a href="<?=url('admin/modifier-un-membre/'. $member->id)?>">Modifier un membre</a>
            {{ Form::open(['route' => ['member.delete', $member->id], 'method' => 'delete']) }}
            <button type="submit">Supprimer</button>
            {{ Form::close() }}


        <?php endforeach; ?>
    </section>
</body>
</html>