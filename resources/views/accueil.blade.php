<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OgunBook</title>

    <!-- Lien CSS -->
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/faviconOB.png') }}" type="image/x-icon">

    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
</head>

<body>

    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('image/OG1.png') }}" alt=""></a> 
            </div>
            <div class="nav-links">
                <a href="#">Accueil</a>
                <a href="#">Catégories</a>
                <a href="#">Nouveautés</a>
                <a href="#">Populaires</a>
            </div>
            <div class="nav-buttons">
                <a role="button" class="ha1" href="{{ route('accueilcreator') }}">Publier</a>
                <a role="button" class="ha2" href="{{route ('login') }}">Se connecter</a>
            </div>
            <div class="menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
            </div>
        </nav>
    </header>

    <div class="sidebar">
        <div class="closebar">
            <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
        </div>
        <div class="linkMobile">
            <a href="#">Accueil</a>
            <a href="#">Catégories</a>
            <a href="#">Nouveautés</a>
            <a href="#">Populaires</a>
        </div>
        <div class="button">
            <a role="button" class="ha1" href="{{ route('accueilcreator') }}">Publier</a>
            <a role="button" class="ha2" href="{{route ('login') }}">Se connecter</a>
        </div>
    </div>

    <main class="landing">
                <section class="section1">
            <div class="cta-text">
                <h1 class="text1">Consommer & Créer</h1>
                <p class="textspan">
                    Lisez vos fan fictions, vos comics et les livres de vos auteurs favoris.
                    Partagez-nous également vos idées ou vos créations à travers vos œuvres.
                </p>
                <a class="btn1" href="#">Explorer</a>
            </div>
            <div class="cta-img">
                <img src="{{ asset('image/cta1.svg') }}" alt="">
            </div>
        </section>

        <section class="section2">
            <div class="logoimg">
                <img src="{{ asset('image/OG1.png') }}" alt="">
            </div>
            <div class="lastbd">
                <h2 class="text2">Explorer nos dernières sorties</h2>
                <div class="bd">
          @foreach($ogunbooks as $book)
        <a class="bd-img" href="#">
            <img src="{{ asset('storage/' . $book->image_book) }}" alt="{{ $book->nom_book }}">
        </a>
           @endforeach
            </div>

        
        </section>

        <section class="section3">
            <h2 class="text2">Que faire avec OgunBook ?</h2>
            <div class="ogunfaq">
                <div class="faq1">
                    <img src="{{ asset('image/accessaccount.svg') }}" alt="">
                    <div class="faqbox">
                        <h5 class="text5">Créer un compte</h5>
                        <p class="textspan">
                            Créez votre compte personnel pour accéder à notre bibliothèque et profiter des dernières sorties.
                        </p>
                        <a href="#" class="btn2">Commencez</a>
                    </div>
                </div>

                <div class="faq2">
                    <img src="{{ asset('image/readingbook.svg') }}" alt="">
                    <div class="faqbox">
                        <h5 class="text5">Prenez plaisir à lire</h5>
                        <p class="textspan">
                            Parcourez une multitude d'œuvres de diverses catégories et choisissez celles qui vous émerveillent.
                        </p>
                        <a href="#" class="btn2">Commencez</a>
                    </div>
                </div>

                <div class="faq1">
                    <img src="{{ asset('image/learnsketch.svg') }}" alt="">
                    <div class="faqbox">
                        <h5 class="text5">Devenez auteur de vos œuvres</h5>
                        <p class="textspan">
                            Rejoignez les créateurs, partagez vos histoires et inspirez une communauté de lecteurs.
                        </p>
                        <a href="#" class="btn2">Créer</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section4">
            <h2 class="text2">Profitez d'une panoplie de nos catégories</h2>
            <div class="catcard">
                @php
                    $categories = ['Aventure', 'Fantastique', 'Histoire', 'Horreur', 'Humour', 'Policier/Thriller', 'Romance', 'Science-fiction', 'Super-héros', 'Western', 'Autres'];
                @endphp
                @foreach($categories as $cat)
                    <a class="categorie" href="#">{{ $cat }}</a>
                @endforeach
            </div>
        </section>

        <section class="section5">
            <div class="oguncreateur">
                <div class="creatorico">
                    <img src="{{ asset('image/tablettedraw.png') }}" alt="">
                </div>
                <div class="oguncreator1">
                    <p class="textspan">
                        Vous êtes passionné, vous avez une histoire à raconter, vous voulez partager vos idées ? Rejoignez la section créateur !
                    </p>
                    <a href="#">Aller voir ></a>
                </div>
            </div>

            <div class="ogunstudio">
                <img src="{{ asset('image/Ogun Studio.png') }}" alt="">
                <a href="#">À venir</a>
            </div>
        </section>

    
    </main>

    <script src="{{ asset('script/accueil.js') }}"></script>
</body>
</html>