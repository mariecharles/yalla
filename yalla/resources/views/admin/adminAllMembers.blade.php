@include('admin.head')

<body id="admin-articles">

@include('admin.headeraside')

<main>
    <section id="admin-volunteers">
        <div class="head-all-articles">
            <div class="filters">
                <a class="active">Tous les bénévoles <span>({{$count}})</span></a>
                <a href="">Administrateurs <span>({{$admin}})</span></a>
                <a href="">Bénévoles <span>({{$benevole}})</span></a>
            </div>
        </div>
        <div class="all-volunteers">

            @foreach ($members as $member)

                <div class="volunteer">
                    <a href="{{url('admin/modifier-un-membre/'. $member->id)}}">
                        <div class="profile-pic">
                            <span></span>
                        </div>
                        <div class="infos">
                            <h3>{{$member->firstname. ' ' .$member->lastname}}</h3>
                            <p>Basé(e) à {{$member->city}}</p>
                        </div>

                        <div class="volunteer-status">
                            <span>{{$member->status}}</span>
                        </div>
                        <div class="function-status">
                            <span>{{$member->activity}}</span>
                        </div>
                        <div class="date">
                            <p>Membre depuis <b class="return">{{$member->created_at}}</b></p>
                        </div>
                    </a>
                </div>

            @endforeach

            @include('pagination', ['paginator' => $members])

        </div>
    </section>

</main>