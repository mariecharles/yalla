<header>
    <div class="inner">
        <div id="admin-actions">
            <div class="ctas">
                <span class="cta new-volunteer"><a href="{{url('admin/ajouter-un-membre')}}">+ Ajouter un membre</a></span>
                <span class="cta new-article"><a href="{{url('admin/ajouter-un-article')}}">+ Nouvel article</a></span>
            </div>
            <div class="icon-action">
                <div class="notifications">
                    <span class="nb-notifs">UU <span class="push"></span></span>
                    <div class="my-notifs">
                        <h3>Mes notifications reçues</h3>
                    </div>
                </div>
                <div class="my-space"><span>MM</span></div>
            </div>
        </div>
    </div>
</header>

<nav id="admin-aside">
    <ul>
        <li class="active"><a href="{{url('admin')}}">Tableau de bord</a></li>
        <li><a href="{{url('admin/articles')}}">Articles</a></li>
        <li><a href="{{url('admin/archives')}}">Archives</a></li>
        <li><a href="{{url('admin/partenaires')}}">Partenaires</a></li>
        <li><a href="{{url('admin/membres')}}">Membres</a></li>
    </ul>
</nav>