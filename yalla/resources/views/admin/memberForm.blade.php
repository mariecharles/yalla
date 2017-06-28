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
<h1><?= isset($member->lastname)?'Modifier les coordonnées du membre':'Ajouter un membre'; ?></h1>

{!! Form::open(isset($member->lastname)?['url' => route('member.update', $member->id), 'method' => 'put']:['url' => route('member.add')]) !!}

{{ csrf_field() }}

{!! Form::label('lastname', 'Nom') !!}
{!! Form::text('lastname', isset($member->lastname)?$member->lastname:'') !!}

{!! Form::label('firstname', 'Prénom') !!}
{!! Form::text('firstname', isset($member->lastname)?$member->firstname:'') !!}

{!! Form::file('img') !!}

@if (isset($member->lastname))
    <img src="{{ asset('/img-content/' . $member->img) }}" alt="Image">
@endif

{!! Form::label('mail', 'Adresse e-mail') !!}
{!! Form::text('mail', isset($member->lastname)?$member->mail:'') !!}

{!! Form::label('activity', 'Activité') !!}
{!! Form::text('activity', isset($member->lastname)?$member->activity:'') !!}

{!! Form::label('phone', 'Téléphone') !!}
{!! Form::text('phone', isset($member->lastname)?$member->phone:'') !!}

{!! Form::label('address', 'Adresse') !!}
{!! Form::text('address', isset($member->lastname)?$member->address:'') !!}

{!! Form::label('postal_code', 'Code postal') !!}
{!! Form::text('postal_code', isset($member->lastname)?$member->postal_code:'' ) !!}

{!! Form::label('city', 'Ville') !!}
{!! Form::text('city', isset($member->lastname)?$member->city:'') !!}

{!! Form::label('country', 'Pays') !!}
{!! Form::text('country', isset($member->lastname)?$member->country:'') !!}

{!! Form::label('status', 'Statut') !!}
{!! Form::text('status', isset($member->lastname)?$member->status:'') !!}

<button type="submit"><?= isset($member->lastname)?'Modifier':'Ajouter'?></button>


{!! Form::close() !!}
</body>
</html>