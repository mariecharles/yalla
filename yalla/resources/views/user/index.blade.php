<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/stylesheets/screen.css') }}">
    <title>Yalla! Pour les Enfants - Défendons les droits humains</title>

    <meta property="og:site_name" content="Amnesty France">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site" content="@amnestyfrance">
    <meta name="description" content="Suivez toute l'actualité et les derniers sujets sur les droits humains sur Amnesty International">

    <!-- balises facebook -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="Amnesty International France - Défendons les droits humains">
    <meta property="og:description" content="Suivez toute l'actualité et les derniers sujets sur les droits humains sur Amnesty International">
    <meta property="og:image" content="">

    <!-- balises twitter -->
    <meta name="twitter:title" content="Amnesty International France - Défendons les droits humains">
    <meta name="twitter:description" content="Suivez toute l'actualité et les derniers sujets sur les droits humains sur Amnesty International">
    <meta name="twitter:image" content="">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>

<body id="index" class="fr">

<header class="top">
    <div class="inner">
        <h1>
            <a href="">
                <img class="logo-desktop" src="{{ asset('/img-layout/logo-yalla.svg')}}" alt="logo Yalla!">
            </a>
        </h1>
        <a href="">
            <img class="logo-mobile" src="{{ asset('/img-layout/logo-footer.svg')}}" alt="logo Yalla!">
        </a>

        <div class="menu-burger">
            <!-- <div class="menu-sup"> </div> -->
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="share-header">
            <a href="">
                <img src="{{ asset('/img-layout/share-black.svg')}}" alt="partager">
            </a>
        </div>

        <div id="inner-header">
            <nav>
                <ul>
                    <!-- <li><img src="assets/img-layout/oval.svg" alt=""></li> -->
                    <li class="active"><a href="about-us.html">Notre association</a></li>
                    <!-- <li><img src="assets/img-layout/oval.svg" alt=""></li> -->
                    <li><a href="our-actions.html">Nos actions</a></li>
                    <!-- <li><img src="assets/img-layout/oval.svg" alt=""></li> -->
                    <li><a href="support-us.html">Nous soutenir</a></li>
                    <!-- <li><img src="assets/img-layout/oval.svg" alt=""></li> -->
                    <li><a href="our-news">Actualités</a></li>
                    <!-- <li><img src="assets/img-layout/oval.svg" alt=""></li> -->
                    <li class="contact-page">Contact</li>
                </ul>
            </nav>

            <div id="header-actions">
                <span class="cta cta-black"><a href="">Faire un don</a></span>
                <select name="" id="">
                    <option value="">FR <i>+</i></option>
                    <option value="">EN <i>+</i></option>
                </select>
            </div>
        </div>
</header>

<main>
    <section id="contact">
        <div class="container">
            <h3>Contact</h3>
            <img src="{{ asset('/img-layout/cross.svg')}}" class="cross">
            <div class="info-contact">
                <div class="adresse">
                    <p>Adresse postale</p>
                    <p>Yalla! Pour les Enfants</p>
                    <p>13, rue René Villerme</p>
                    <p>75011 PARIS</p>
                </div>
                <div>
                    <p>Téléphone : </p>
                    <a href="tel:+33617777122">+33 (0)6.17.77.71.22</a>
                </div>
                <div class="adresse-mail">
                    <p>Email : </p>
                    <a href="mailto:yalla.enfants@gmail.com">yalla.enfants@gmail.com</a>
                </div>
            </div>
            <div class="first-fields">
                <input type="text" id="nom" name="nom" placeholder="Nom" required>
                <input type="email" id="email" name="email" placeholder="Mail">
            </div>
            <div class="content-message">
                <textarea cols="55" rows="12" placeholder="Ecrivez votre message" id="message"></textarea>
            </div>
            <div class="button-message">
                <input type="submit" name="envoyer" id="envoyer" value="Envoyer">
            </div>
        </div>
    </section>
    <section id="intro">
        <img src="{{ asset('/img-content/header-index.png')}}" alt="">
        <h2><span class="bolder">Yalla! Pour les Enfants est une <span class="bolder">association créée</span> en France pour les enfants syriens <span class="bolder">au Liban.</span></h2>
        <div class="social-network">
            <ul>
                <li>
                    <a href="#"><img src="{{ asset('/img-layout/facebook.svg')}}" alt="Yalla! on Facebook"></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('/img-layout/twitter.svg')}}" alt="Yalla! on Twitter"></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('/img-layout/pinterest.svg')}}" alt="Yalla! on Pinterest"></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('/img-layout/linkedin.svg')}}" alt="Yalla! on LinkedIn"></a>
                </li>
            </ul>
        </div>
    </section>

    <section id="last-news">
        <div class="inner">
            <span class="bg-text">Actualités</span>
            <h2>Dernières actualités</h2>

            <div class="all-articles">

                @foreach ($posts as $post)
                    <article>
                        <a href="{{url(App::getLocale() . '/' . Lang::get('pagination.detailactu') . '/'. $post->slug)}}">
                        <span class="category">{{$post->category->name}}</span>

                        <figure>
                            <img src="{{ asset('/img-content/'. $post->img)}}" alt="{{$post->title}}">
                        </figure>
                        <div class="top-article">
                            <div class="inner">
                                <h3>{{$post->title}}</h3>
                                <span class="date">{{$post->created_at->format('d F Y')}}</span>
                            </div>
                        </div>
                        <div class="content">
                            <p>{{$post->resume . '...'}}</p>
                        </div>
                        <div class="read-more">
                            <span>Lire la suite</span>
                            <img src="{{ asset('/img-layout/arrow-right-read-more.svg')}}">
                        </div>
                        </a>
                    </article>
                @endforeach

                <span class="cta more">Voir toutes les actualités <i>i</i></span>
            </div>
        </div>
    </section>


    <section id="know-more">
        <div class="one-fact">
            <img src="{{ asset('/img-layout/icon-notre-asso.svg')}}" alt="">
            <h3>Notre association</h3>
            <p>Yalla! Pour les Enfants a été crée en juillet 2013 par des citoyens français connaisseurs de la Syrie et du Moyen- Orient, et soucieux du respect des droits l’Homme.</p>
            <p>Les bénévoles de Yalla ! à Paris et sur le terrain ont préalablement adopté les valeurs de l’association.</p>
            <a href="#" class="jt-cta"><b>Nous rejoindre</b></a>
        </div>
        <div class="one-fact">
            <img src="{{ asset('/img-layout/icon-nos-actions.svg')}}" alt="">
            <h3>Nos actions</h3>
            <p>Création de centres d’éducation informelle de qualité à destination d’enfants syriens réfugiés</p>

            <p>Plaidoyer auprès des autorités libanaises locales et gouvernementales pour l’intégration des enfants syriens au sein du système scolaire libanais, après remise à niveau par Yalla !</p>
            <a href="#" class="jt-cta"><b>En savoir plus</b></a>
        </div>
        <div class="one-fact">
            <img src="{{ asset('/img-layout/icon-nous-soutenir.svg')}}" alt="">
            <h3>Nous soutenir</h3>
            <p>Vous pouvez à tout moment faire un don par : chèque bancaire à l’ordre de « Yalla! Pour les Enfants », adressé à Yalla! 13, rue René Villermé 75011 Paris</p>
            <p>Virement bancaire sur le compte de notre association</p>
            <a href="#" class="jt-cta"><b>Faire un don</b></a>
        </div>
    </section>

    <section id="act">
        <ul>
            <li>
                <article>
                    <div class="content-act">
                        <img src="{{ asset('/img-layout/make-donation.svg')}}">
                        <h3>Faire un don</h3>
                        <p>Aidez-nous à financer l’éducation des jeunes réfugiés syriens. Merci !</p>
                        <div class="more-act">
                            <a href=""><span>></span></a>
                        </div>
                    </div>
                </article>
            </li>
            <li>
                <article>
                    <div class="content-act">
                        <img src="{{ asset('/img-layout/join-us.svg')}}">
                        <h3>Nous rejoindre</h3>
                        <p>Rejoint nous pour permettre à plus de jeunes réfugiés syriens de pouvoir s’instruire !</p>
                        <div class="more-act">
                            <a href=""><span>></span></a>
                        </div>
                    </div>
                </article>
            </li>
            <li>
                <article>
                    <div class="content-act">
                        <img src="{{ asset('/img-layout/share-white.svg')}}">
                        <h3>Partager</h3>
                        <p>Partage la cause avec tes amis pour financer l’école des jeunes syriens</p>
                        <div class="more-act">
                            <a href=""><span>></span></a>
                        </div>
                    </div>
                </article>
            </li>
        </ul>
    </section>

<!-- <section id="newsletter-home">
            <h3>Newsletter</h3>
            <p>Inscris toi pour rester connecté !</p>
            <form action="" post="">
                <div>
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input type="email" id="newsletter" name="newsletter" placeholder="exemple@gmail.com">
                    <input type="submit" name="validation" id="validation" value="S'inscrire">

                </div>
            </form>
        </section> -->
</main>
<footer id="footer">
    <div class="inner">
        <div class="logo-footer">
            <a href="">
                <img src="{{ asset('/img-layout/logo-footer.svg')}}" alt="#">
            </a>
        </div>

        <div class="content">
            <p>©Yalla association.Tout droit réservé. 13, Rue René Villerme - 75011 PARIS</p>
            <ul>
                <li><a href="">Politique de confidentialité</a></li>
                <li><a href="">Conditions d'utilisation</a></li>
                <li><a href="">Mentions légales</a></li>
            </ul>
        </div>
    </div>

</footer>

<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>