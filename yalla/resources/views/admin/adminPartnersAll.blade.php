@include('admin.head')

<body id="admin-partners">

@include('admin.headeraside')

<main>
    <div class="all-partners">
        <div class="head">
            <h2>La liste de partenaires <span class="trait">-</span> <span class="nb">{{$count}} partenaires</span></h2>
            <a href="{{url('admin/ajouter-un-partenaire')}}" class="new-partner"><span>+</span> Ajouter un nouveau partenaire</a>
        </div>
        <div class="list-partners">

            @foreach ($partners as $partner)

                <div class="partner">
                    <figure><img src="{{ asset('/img-content/'.$partner->logo)}}" alt="logo"></figure>
                    <div class="caption">
                        <p>{{$partner->name}}</p>
                        {{ Form::open(['route' => ['partner.delete', $partner->id], 'method' => 'delete']) }}
                        <button type="submit" class="delete">del</button>
                        {{ Form::close() }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>