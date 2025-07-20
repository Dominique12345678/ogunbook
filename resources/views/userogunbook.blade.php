<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OB - Nouveautés</title>

        <link rel="stylesheet" href="{{ asset('css/userogunbook.css') }}">

        <!-- lien favicon -->
        <link rel="shortcut icon" href="../../image/faviconOB.png" type="image/x-icon">

        <!-- lien fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    
        <!-- lien cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    
        <!-- Autre lien -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>


</head>

<body>

    <header class="header">

        <nav class="navbar">

                <ul class="sidebar">

                    <li class="closebar" onclick=hideSidebar() ><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>

                    <div class="logo">
                        <a href="../../ogunbook.html"><img src="../../image/OG1.png" alt=""></a> 
                    </div>

                    <div class="linkMobile">
                        <li><a href="../../ogunbook.html">Accueil</a> </li>
                        <li><a href="../../ogunUser/catégorie/oguncatégorie.html">Catégories</a> </li>
                        <li><a href="../../ogunUser/nouveauté/ogunnew.html">Nouveautés</a> </li>
                        <li><a href="../../ogunUser/populaires/ogunpopulaire.html">Populaires</a> </li>
                    </div>

                    

                </ul>

                <ul class="longbar" >

                    <div class="logo">
                        <a href="../../ogunbook.html"><img src="../../image/OG1.png" alt=""></a> 
                    </div>

                    <div class="link">
                        <li class="hideOnMobile" ><a href="../../ogunbook.html">Accueil</a> </li>
                        <li class="hideOnMobile" ><a href="../../ogunUser/catégorie/oguncatégorie.html">Catégories</a> </li>
                        <li class="hideOnMobile" ><a href="../../ogunUser/nouveauté/ogunnew.html">Nouveautés</a> </li>
                        <li class="hideOnMobile" ><a href="../../ogunUser/populaires/ogunpopulaire.html">Populaires</a> </li>
                    </div>

                    
                    <li class="menu-button" onclick=showSidebar() ><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>

                </ul>

        </nav>

    </header>
    <main class="landing">

        <h1 class="text1">Explorer nos<span class="textspan"> Nouveautés</span> </h1>

        <div class="comicWall">
   @forelse ($ogunbooks as $book)
   <a href="{{ route('user.livre.show', ['id' => $book->id_book]) }}">
        <div class="container">
            <img src="{{ asset('storage/' . $book->image_book) }}" alt="{{ $book->nom_book }}">
            <div class="intro">
                <h3 class="text3">{{ $book->nom_book }}</h3>
                <h4 class="text4">Auteur : {{ $book->createur->pseudo_createur ?? 'Inconnu' }}</h4>
                <p class="textp">Catégorie : {{ $book->categorie->nom_categorie ?? 'Non classé' }}</p>
            </div>
        </div>
    </a>
@empty
    <p>Aucun livre disponible pour le moment.</p>
@endforelse

</div>

    </main>

     <script src="{{ asset('script/userogunbook.js') }}"></script>
    
</body>

</html>