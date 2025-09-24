<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OgunBook - Lisez, Créez, Partagez</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/faviconOB.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <nav class="navbar">
            <!-- Logo -->
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('image/OG1.png') }}" alt="OgunBook">
                </a>
            </div>

            <!-- Liens desktop -->
            <div class="nav-links">
                <a href="{{ url('/') }}">Accueil</a>
                <a href="#">Catégories</a>
                <a href="#">Nouveautés</a>
                <a href="#">Populaires</a>
            </div>



            <!-- Boutons desktop -->
            <div class="nav-buttons">
                <a role="button" class="btn-outline" href="{{ route('accueilcreator') }}">Publier</a>
                <a role="button" class="btn-primary" href="{{ route('login') }}">Se connecter</a>
            </div>

            <!-- Menu mobile -->
            <div class="menu-button" onclick="showSidebar()">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

    <!-- Sidebar mobile -->
    <div class="sidebar" id="mobileSidebar">
        <div class="closebar" onclick="hideSidebar()">
            <i class="fas fa-times"></i>
        </div>
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('image/OG1.png') }}" alt="OgunBook"></a>
        </div>
        <div class="linkMobile">
            <a href="{{ url('/') }}">Accueil</a>
            <a href="#">Catégories</a>
            <a href="#">Nouveautés</a>
            <a href="#">Populaires</a>
        </div>
        

        
        <div class="button">
            <a role="button" class="btn-outline" href="{{ route('accueilcreator') }}">Publier</a>
            <a role="button" class="btn-primary" href="{{ route('login') }}">Se connecter</a>
        </div>
    </div>

    <!-- MAIN -->
    <main class="landing">

        <!-- Section 1 : Hero -->
        <section class="section1">
            <div class="cta-text">
                <h1 class="text1">Consommez & Créez</h1>
                <p class="textspan">
                    Plongez dans des univers captivants ou partagez vos propres histoires avec une communauté passionnée.
                </p>
                <a href="#explore" class="btn-primary btn-lg">Explorer les œuvres</a>
            </div>
            <div class="cta-img">
                <img src="{{ asset('image/cta1.svg') }}" alt="Lecture et création" class="hero-img">
            </div>
        </section>

        <!-- Section 2 : Dernières sorties -->
        <section class="section2">
            <h2 class="text2">Nos dernières sorties</h2>
            <div class="bd-grid">
                @if(isset($ogunbooks) && $ogunbooks->count() > 0)
                    @foreach($ogunbooks as $book)
                        <a href="{{ route('user.livre.show', ['id' => $book->id_ogoun]) }}" class="book-card">
                            <img src="{{ asset('storage/' . $book->image_book) }}" alt="{{ $book->nom_book }}">
                            <h6>{{ Str::limit($book->nom_book, 30) }}</h6>
                        </a>
                    @endforeach
                @else
                    <p class="no-books">Aucune œuvre disponible pour le moment.</p>
                @endif
            </div>
        </section>

        <!-- Section 3 : Actions -->
        <section class="section3">
            <h2 class="text2">Que faire sur OgunBook ?</h2>
            <div class="action-cards">
                <div class="card">
                    <img src="{{ asset('image/accessaccount.svg') }}" alt="Créer un compte" class="icon">
                    <h4>Créer un compte</h4>
                    <p>Accédez à toute notre bibliothèque et suivez vos auteurs préférés.</p>
                    <a href="{{ route('registeruser') }}" class="btn-outline">S’inscrire</a>
                </div>
                <div class="card">
                    <img src="{{ asset('image/readingbook.svg') }}" alt="Lire" class="icon">
                    <h4>Lisez sans fin</h4>
                    <p>Découvrez des milliers d’œuvres dans toutes les catégories.</p>
                    <a href="#" class="btn-outline">Explorer</a>
                </div>
                <div class="card">
                    <img src="{{ asset('image/learnsketch.svg') }}" alt="Créer" class="icon">
                    <h4>Devenez créateur</h4>
                    <p>Publiez vos histoires et touchez une vraie communauté.</p>
                    <a href="{{ route('accueilcreator') }}" class="btn-primary">Commencer</a>
                </div>
            </div>
        </section>

        <!-- Section 4 : Catégories -->
        <section class="section4">
            <h2 class="text2">Nos catégories populaires</h2>
            <div class="cat-grid">
                @php
                    $categories = ['Aventure', 'Fantastique', 'Histoire', 'Horreur', 'Humour', 'Policier/Thriller', 'Romance', 'Science-fiction', 'Super-héros', 'Western', 'Autres'];
                @endphp
                @foreach($categories as $cat)
                    <a href="#" class="cat-tag">{{ $cat }}</a>
                @endforeach
            </div>
        </section>

        <!-- Section 5 : Créateur & Studio -->
        <section class="section5">
            <div class="creator-banner">
                <div class="creator-content">
                    <h3>Vous avez une histoire à raconter ?</h3>
                    <p>Rejoignez des milliers de créateurs et faites vivre vos idées.</p>
                    <a href="{{ route('accueilcreator') }}" class="btn-primary">Devenir créateur</a>
                </div>
                <div class="creator-img">
                    <img src="{{ asset('image/tablettedraw.png') }}" alt="Créer avec OgunBook">
                </div>
            </div>
            <div class="studio-card">
                <img src="{{ asset('image/Ogun Studio.png') }}" alt="Ogun Studio">
                <a href="#" class="btn-outline">Bientôt disponible</a>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="{{ asset('image/OG2.png') }}" alt="OgunBook">
            </div>
            <div class="footer-links">
                <h4>Liens utiles</h4>
                <a href="{{ url('/') }}">Accueil</a>
                <a href="#">Catégories</a>
                <a href="#">Nouveautés</a>
                <a href="#">Populaires</a>
            </div>
            <div class="footer-links">
                <h4>OgunBook</h4>
                <a href="{{ route('a-propos') }}">À propos</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ asset('TermsofUse.html') }}">Conditions d’utilisation</a>
                <a href="{{ asset('PrivacyPolicy.html') }}">Confidentialité</a>
            </div>
            <div class="footer-links">
                <h4>Créateurs</h4>
                <a href="{{ route('accueilcreator') }}">Devenir créateur</a>
                <a href="#">Les créateurs</a>
            </div>
        </div>
        <div class="separator"></div>
        <div class="social">
            <p>Suivez-nous</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-x-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-discord"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
            </div>
            <p class="copyright">© 2025 OgunBook. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- JS -->
    <script>
        function showSidebar() {
            document.getElementById('mobileSidebar').classList.add('active');
        }
        function hideSidebar() {
            document.getElementById('mobileSidebar').classList.remove('active');
        }
        

    </script>
    <script src="{{ asset('script/accueil.js') }}"></script>
</body>
</html>