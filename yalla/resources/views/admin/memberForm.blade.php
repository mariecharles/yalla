@include('admin.head')

<body id="admin-new-volunteer">

@include('admin.headeraside')

<main>
    <section class="new-volunteer">
        <h2>{{isset($member->lastname)?'Modifier le membre':'Ajouter un membre'}}</h2>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(isset($member->lastname)?['url' => route('member.update', $member->id), 'files' => true, 'method' => 'put']:['url' => route('member.add'), 'files' => true]) !!}

            {{ csrf_field() }}
            <div class="new-img">
                <h3>Image du profil</h3>
                <div class="content">
                    <figure>
                        <span>img</span>
                    </figure>
                    {!! Form::file('img') !!}
                </div>
            </div>
            <div class="infos">
                <h3>Information du profil</h3>
                <div class="content">
                    <div class="field">
                        {!! Form::label('lastname', 'Nom') !!}
                        {!! Form::text('lastname', isset($member->lastname)?$member->lastname:'') !!}
                    </div>
                    <div class="field">
                        {!! Form::label('firstname', 'Prénom') !!}
                        {!! Form::text('firstname', isset($member->lastname)?$member->firstname:'') !!}
                    </div>
                    <div class="field">
                        {!! Form::label('birth_date', 'Date de naissance') !!}
                        {!! Form::date('birth_date', isset($member->lastname)?$member->birth_date:'' ) !!}
                    </div>
                </div>
            </div>
            <div class="status">
                <h3>Statut et fonction</h3>
                <div class="content">
                    <div class="field">
                        <label for="">Statut *</label>
                        {!! Form::select('status', array('Bénévole' => 'Bénévole', 'Administrateur' => 'Administrateur'), isset($member->lastname)?$member->status:'' ) !!}
                    </div>
                    <div class="field">
                        <label for="">Fonction *</label>
                        {!! Form::text('activity', isset($member->lastname)?$member->activity:'') !!}
                    </div>
                </div>
            </div>
            <div class="place">
                <h3>Lieu de vie</h3>
                <div class="content">
                    <div class="field">
                        <label for="">Ville *</label>
                        {!! Form::text('city', isset($member->lastname)?$member->city:'') !!}
                    </div>
                    <div class="field">
                        <label for="">Pays *</label>
                        {!! Form::text('country', isset($member->lastname)?$member->country:'') !!}
                    </div>
                </div>
            </div>
            <button type="submit"><?= isset($member->lastname)?'Modifier le membre':'Ajouter le membre'?></button>

        {!! Form::close() !!}

        <span>* Information obligatoire</span>

    </section>
</main>
</body>
</html>