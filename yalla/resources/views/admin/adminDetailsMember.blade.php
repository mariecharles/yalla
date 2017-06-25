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
<p><?=$member->lastname?></p>
<p><?=$member->firstname?></p>
<p><?=$member->date_birth?></p>
<p><?=$member->address?></p>
<p><?=$member->postal_code?></p>
<p><?=$member->city?></p>
<p><?=$member->country?></p>
<p><?=$member->phone?></p>
<p><?=$member->activity?></p>
<p><?=$member->amount_given?></p>
<p>Membre depuis le <?=$member->created_at?></p>
</body>
</html>