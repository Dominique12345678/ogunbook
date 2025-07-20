<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>OgunBook | Inscription créateur</title>
    

        <!-- lien css -->
        <link rel="stylesheet" href="{{ asset('css/accueilcreator.css') }}">

        <!-- lien favicon -->
        <link rel="shortcut icon" href="../image/faviconOB.png" type="image/x-icon">

        <!-- lien fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <!-- lien cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

        <!-- Autre lien -->


</head>


<body>

    <header class="header">
        <div class="logo">
            <img src="../image/OG1.png" alt="">
        </div>
        <a role="button" class="ha1" href="{{ route('logincreator') }}">Se connecter</a>
    </header>

    <main class="mainlanding">
        
        <section class="section1">

            <div class="present1">
                <img src="../image/ogunGirl.png" alt="">
            </div>

            <div class="present2">
                <h1>DESSINEZ, ECRIVEZ, PARTAGEZ ET RETROUVEZ VOS LECTEURS</h1>
                <p>Donnez vie à vos planches et obtenez une forte audiance</p>
                <a href="{{ route('registercreator') }}">COMMENCEZ DÈS MAINTENANT</a>
            </div>

        </section>

        <section class="section2">
            <h1>POURQUOI OGUNBOOK ?</h1>
            <p>OgunBook est tout d’abord une plateforme qui met en avant des jeunes
                auteurs africains en leur permettant de valoriser leurs œuvres. Nous
                voulons promouvoir la culture et la richesse africaine à travers vos œuvres.
            </p>
        </section>

        <section class="section3">
            <div class="text-case">
                <p>Avec OgunBook, trouver une audience ne sera plus un problème. 
                   Notre plateforme est là pour vous accompagner et vous aider à
                   retrouver vos lecteurs.
                </p>
            </div>

            <div class="img-case">
                <img src="../image/imgDraw.png" alt="">
            </div>

        </section>

        <section class="section4">
            <div class="text-wrap">
                <h1>Votre œuvre deviendra célèbre et ça commence ici</h1>
                <p>Commencer votre histoire en quelques étapes </p>
            </div>

            <div class="logo-box">
                
                <div class="box1">

                    <div class="box">
                        <div class="circle">
                            <img src="../image/signUp.svg" alt="">
                        </div>
                        <h3>Se connecter ou s'inscrire</h3>
                        <p>Créer un compte OgunBook,
                           suivez la procédure d‘inscription
                           et allez à la page “Publier”.</p>
                    </div>
    
                    <div class="box">
                        <div class="circle">
                            <img src="../image/choose.svg" alt="">
                        </div>
                        <h3>Choisir un genre</h3>
                        <p>Sélectionnez le genre principal et le sous-genre de votre série.</p>
                    </div>
    
                    <div class="box">
                        <div class="circle">
                            <img src="../image/refont.svg" alt="">
                        </div>
                        <h3>Donner un titre à votre œuvre</h3>
                        <p>Choisissez un titre unique</p>
                    </div>
    
                </div>

                <div class="box2">

                    <div class="box">
                        <div class="circle">
                            <img src="../image/editphoto.svg" alt="">
                        </div>
                        <h3>Ajouter les thumbnails</h3>
                        <p>Uploader les vignettes au format prévu de votre série afin de mettre en valeur votre histoire.</p>
                    </div>
    
                    <div class="box">
                        <div class="circle">
                            <img src="../image/typwriter.svg" alt="">
                        </div>
                        <h3>Ajouter un résumé de votre œuvre</h3>
                        <p>Quel est votre univers? Vos personnages principaux? Donner nous un bref aperçu.</p>
                    </div>
    
                    <div class="box">
                        <div class="circle">
                            <img src="../image/teamcollab.svg" alt="">
                        </div>
                        <h3>Publier votre premier épisode</h3>
                        <p>Laissez le monde découvrir ce que vous avez créé !</p>
                    </div>

                </div>
                
                
            </div>

        </section>

        <section class="section5">

            <h1 class="text">Abonnez-vous pour bénéficier de notre accès à la rebrique auteur et partagez nous votre histoire.</h1>

            <div class="card-price">

                <h1>Abonnement à l’espace créateur</h1>
                <h3>2000 FCFA</h3>


                <div class="opt1">
                    <ul>
                        <li><p><i class="fa-solid fa-circle-check"></i> Espace créateur</p></li>
                        <li><p><i class="fa-solid fa-circle-check"></i> Membre à vie</p></li>
                        <li><p><i class="fa-solid fa-circle-check"></i> Publication illimitée</p></li>
                    </ul>    
                </div>
                
                <div class="opt2">
                    <h2>500 FCFA/mois</h2>
                    <p>Ce payement n’est pas inclus dans l’abonnement à l’espace créateur.
                        Le maintient du site est important pour vous permettre de poster sans encombre.
                    </p>  
                </div>


                <a class="button" href="">s'abonner</a>

                <p>Le paiement inclus tous les avantages mentionnés ci-dessus.</p>


            </div>

        </section>

    </main>

    <footer>

        <section class="lien">

            <div class="logo">
                <a href="" id="top"><img src="../image/OG2.png" alt=""></a>
            </div>

            <div class="link-1">
                <p>OgunBook</p>
                <ul>
                    <li><a href="#">A propos</a></li>
                    <li><a href="#">Aide</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Condition d'utilisation</a></li>
                    <li> <a href="#">Politique de confidentialité</a></li>
                </ul>
            </div>

            <div class="link-2">
                <p>OgunBook Créateur</p>
                <ul>
                    <li><a href="">Devenir un créateur</a></li>
                    <li><a href="">Les créateurs</a></li>
                </ul>
            </div>

        </section>

        <div class="separateur"></div>

        <section class="social">

            <p>Suivez-nous</p>

            <div class="social-link">
                <a href=""><img src="../image/facebook.svg" alt=""></a>
               <a href=""><img src="../image/x-twitter.svg" alt=""></a> 
               <a href=""><img src="../image/instagram.svg" alt=""></a> 
               <a href=""><img src="../image/discord.svg" alt=""></a> 
                <a href=""><img src="../image/tiktok.svg" alt=""></a>
            </div>

            <p class="bas">© 2024 OgunBook</p>

        </section>

    </footer>
    
</body>

</html>