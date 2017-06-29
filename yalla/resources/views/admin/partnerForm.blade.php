@include('admin.head')

<body id="admin-new-partner">

@include('admin.headeraside')

<main>
    <div class="head">
        <span class="go-back">
          <a href="{{url('admin/partenaires')}}"><i>i</i> Retour à la liste des partenaires</a>
        </span>
    </div>
    <div class="new-partner">
        {!! Form::open(['url' => route('partner.add'), 'files' => true]) !!}
            <div class="partner-img">
                <figure><img src="{{ asset('/img-content/placeholder.png') }}" alt="Image par défaut"></figure>
                {!! Form::file('logo') !!}
            </div>
            <div class="container">
                <div class="partner-name">
                    {!! Form::label('name', 'Nom du partenaire') !!}
                    {!! Form::text('name', '') !!}
                </div>
                <input type="submit" value="Ajouter ce partenaire" class="submit">
            </div>
        {!! Form::close() !!}
    </div>
</main>
</body>
</html>
