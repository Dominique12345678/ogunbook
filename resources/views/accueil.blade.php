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

    <!-- GSAP CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>

<body>

    <header class="header">
        <nav class="navbar">
            <ul class="sidebar">
                <li class="closebar" onclick="hideSidebar()">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
                </li>
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('image/OG1.png') }}" alt=""></a> 
                </div>
                <div class="linkMobile">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Catégories</a></li>
                    <li><a href="#">Nouveautés</a></li>
                    <li><a href="#">Populaires</a></li>
                </div>
                <div class="button">
                    <a role="button" class="ha1" href="{{ route('accueilcreator') }}">Publier</a>
                    <a role="button" class="ha2" href="{{route ('loginuser') }}">Se connecter</a>
                </div>
            </ul>

            <ul class="longbar">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('image/OG1.png') }}" alt=""></a>
                </div>
                <div class="link">
                    <li class="hideOnMobile"><a href="#">Accueil</a></li>
                    <li class="hideOnMobile"><a href="#">Catégories</a></li>
                    <li class="hideOnMobile"><a href="#">Nouveautés</a></li>
                    <li class="hideOnMobile"><a href="#">Populaires</a></li>
                </div>
                <div class="button" id="hideOnMobile">
                   <a role="button" class="ha1" href="{{ route('accueilcreator') }}">Publier</a>
                    <a role="button" class="ha2" href="{{route ('loginuser') }}">Se connecter</a>
                </div>
                <li class="menu-button" onclick="showSidebar()">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a>
                </li>
            </ul>
        </nav>
    </header>

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

    <footer class="footer">
        <section class="lien">
            <div class="logo">
                <img src="{{ asset('image/OG2.png') }}" alt="Logo OgunBook">
            </div>

            <div class="footer-links">
                <p>Liens utiles</p>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Catégories</a></li>
                    <li><a href="#">Nouveautés</a></li>
                    <li><a href="#">Populaires</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <p>OgunBook</p>
                <ul>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Aide</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Conditions d'utilisation</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <p>OgunBook Créateur</p>
                <ul>
                    <li><a href="#">Devenir un créateur</a></li>
                    <li><a href="#">Les créateurs</a></li>
                </ul>
            </div>
        </section>

        <div class="separateur"></div>

        <section class="social">
            <p>Suivez-nous</p>
            <div class="social-link">
                <a href="#"><img src="{{ asset('image/facebook.svg') }}" alt="Facebook"></a>
                <a href="#"><img src="{{ asset('image/x-twitter.svg') }}" alt="Twitter/X"></a>
                <a href="#"><img src="{{ asset('image/instagram.svg') }}" alt="Instagram"></a>
                <a href="#"><img src="{{ asset('image/discord.svg') }}" alt="Discord"></a>
                <a href="#"><img src="{{ asset('image/tiktok.svg') }}" alt="TikTok"></a>
            </div>
            <p class="bas">© 2024 OgunBook</p>
        </section>
    </footer>

    <script src="{{ asset('script/accueil.js') }}"></script>
</body>
</html>
