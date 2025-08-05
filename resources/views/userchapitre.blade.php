<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $livre->titre_ogoun }} | OgunBook</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/userchapitre.css') }}">
    <link rel="shortcut icon" href="{{ asset('image/faviconOB.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    
    <style>
        /* Styles de base */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: #3498db;
        }
        
        /* Section livre */
        .book-details {
            padding: 2rem;
            max-width: 1200px;
            margin: 2rem auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .book-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .book-cover {
            text-align: center;
        }
        
        .main-cover {
            max-width: 100%;
            height: auto;
            max-height: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .price-tag {
            background-color: #f8f8f8;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            color: #2c3e50;
            border: 1px solid #ddd;
            display: inline-block;
            margin: 10px 0;
        }
        
        .price-amount {
            color: #e74c3c;
            font-size: 1.2em;
        }
        
        .purchase-btn, .read-free-btn {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            margin-top: 1rem;
            font-size: 1rem;
        }
        
        .purchase-btn {
            background-color: #e74c3c;
            color: white;
        }
        
        .purchase-btn:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }
        
        .read-free-btn {
            background-color: #3498db;
            color: white;
        }
        
        .read-free-btn:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
        
        .book-info h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }
        
        .author, .category {
            color: #666;
            margin-bottom: 0.5rem;
        }
        
        .description {
            margin: 1.5rem 0;
        }
        
        .description h3 {
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }
        
        .stats {
            display: flex;
            gap: 1.5rem;
            margin-top: 1rem;
        }
        
        .stats span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        /* Section chapitres */
        .chapters-section {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .chapters-section h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .chapters-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            position: relative;
        }
        
        .chapter-card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .chapter-card:hover {
            transform: translateY(-3px);
        }
        
        .chapter-number {
            font-weight: bold;
            color: #3498db;
            margin-bottom: 0.5rem;
        }
        
        .chapter-content h3 {
            font-size: 1.2rem;
            color: #2c3e50;
        }
        
        .chapter-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .preview-btn, .read-btn, .download-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }
        
        .preview-btn {
            background-color: #f39c12;
            color: white;
        }
        
        .preview-btn:hover {
            background-color: #e67e22;
        }
        
        .read-btn {
            background-color: #3498db;
            color: white;
        }
        
        .read-btn:hover {
            background-color: #2980b9;
        }
        
        .download-btn {
            background-color: #27ae60; /* Vert */
            color: white;
        }
        
        .download-btn:hover {
            background-color: #219653; /* Vert plus foncé */
        }

        .download-btn:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }
        
        .no-chapters {
            text-align: center;
            padding: 2rem;
            color: #666;
        }
        
        .no-chapters i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #3498db;
        }
        
        /* Overlay de verrouillage */
        .locked-content {
            filter: blur(5px);
            pointer-events: none;
            user-select: none;
        }
        
        .lock-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
            cursor: pointer;
            border-radius: 8px;
        }
        
        .lock-message {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 80%;
        }
        
        .lock-message i {
            color: #e74c3c;
            margin-bottom: 1rem;
        }
        
        .lock-message p {
            margin: 1rem 0;
            font-size: 1.2rem;
            color: #2c3e50;
        }
        
        /* Bouton télécharger tout */
        .download-all-container {
            text-align: center;
            margin: 20px 0;
        }
        
        .download-all-btn {
            background-color: #27ae60; /* Vert */
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .download-all-btn:hover {
            background-color: #219653; /* Vert plus foncé */
            transform: translateY(-2px);
        }
        
        .download-all-btn i {
            font-size: 1.2rem;
        }
        
        /* Popups */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }
        
        .popup-content {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            position: relative;
        }
        
        .close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
        }
        
        .close-btn:hover {
            color: black;
        }
        
        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin: 1.5rem 0;
        }
        
        .method-option {
            display: flex;
            align-items: center;
        }
        
        .method-option input[type="radio"] {
            margin-right: 1rem;
        }
        
        .method-option label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }
        
        .method-option img {
            height: 30px;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        
        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .confirm-payment {
            width: 100%;
            padding: 1rem;
            background-color: #27ae60; /* Vert */
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }
        
        .confirm-payment:hover {
            background-color: #219653; /* Vert plus foncé */
        }
        
        /* Animation de chargement */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .fa-spinner {
            animation: spin 1s linear infinite;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }
            
            .nav-links {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .book-container {
                padding: 1rem;
            }
            
            .stats {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .chapter-actions {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .popup-content {
                width: 95%;
                padding: 1.5rem;
            }
        }
        
        @media (min-width: 992px) {
            .book-container {
                flex-direction: row;
            }
            
            .book-cover {
                flex: 0 0 300px;
            }
            
            .book-info {
                flex: 1;
            }
        }

        /* Styles spécifiques au menu de userogunbook.blade.php */
        .sidebar {
            position: fixed;
            top: 0;
            right: -250px; /* Masqué par défaut */
            width: 250px;
            height: 100%;
            background-color: #2c3e50; /* Couleur sombre pour la sidebar */
            padding: 20px;
            box-shadow: -2px 0 5px rgba(0,0,0,0.2);
            transition: right 0.3s ease-in-out;
            z-index: 1001; /* Au-dessus des autres éléments */
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .sidebar.active {
            right: 0; /* Visible */
        }

        .sidebar .closebar {
            align-self: flex-end; /* Bouton de fermeture à droite */
            margin-bottom: 20px;
        }

        .sidebar .closebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar .logo img {
            max-width: 100px; /* Ajustez la taille du logo */
            height: auto;
            margin-bottom: 20px;
        }

        .sidebar .linkMobile {
            list-style: none;
            padding: 0;
            width: 100%;
        }

        .sidebar .linkMobile li {
            margin-bottom: 15px;
        }

        .sidebar .linkMobile a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            display: block;
            padding: 8px 0;
            transition: color 0.3s;
        }

        .sidebar .linkMobile a:hover {
            color: #3498db; /* Couleur de survol */
        }

        .longbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .longbar .logo img {
            max-width: 120px;
            height: auto;
        }

        .longbar .link {
            display: flex;
            list-style: none;
            gap: 1.5rem;
            padding: 0;
        }

        .longbar .link li a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 600;
            transition: color 0.3s;
        }

        .longbar .link li a:hover {
            color: #3498db;
        }

        .menu-button {
            cursor: pointer;
            display: none; /* Masqué par défaut sur desktop */
        }

        @media (max-width: 768px) {
            .longbar .link {
                display: none; /* Masque les liens de la longbar sur mobile */
            }
            .menu-button {
                display: block; /* Affiche le bouton menu sur mobile */
            }
            .longbar .logo {
                flex-grow: 1; /* Permet au logo de prendre plus d'espace */
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <ul class="sidebar" id="sidebar">
                <li class="closebar" onclick="hideSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#FFFFFF"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <div class="logo">
                    <a href="{{ route('accueil') }}"><img src="{{ asset('image/OG1.png') }}" alt="OgunBook Logo"></a>
                </div>
                <div class="linkMobile">
                    <li><a href="{{ route('accueil') }}">Accueil</a></li>
                    <li><a href="{{ url('/categories') }}">Catégories</a></li>
                    <li><a href="{{ url('/nouveautes') }}">Nouveautés</a></li>
                    <li><a href="{{ url('/populaires') }}">Populaires</a></li>
                </div>
            </ul>

            <ul class="longbar">
                <div class="logo">
                    <a href="{{ route('accueil') }}"><img src="{{ asset('image/OG1.png') }}" alt="OgunBook Logo"></a>
                </div>
                <div class="link">
                    <li class="hideOnMobile"><a href="{{ route('accueil') }}">Accueil</a></li>
                    <li class="hideOnMobile"><a href="{{ url('/categories') }}">Catégories</a></li>
                    <li class="hideOnMobile"><a href="{{ url('/nouveautes') }}">Nouveautés</a></li>
                    <li class="hideOnMobile"><a href="{{ url('/populaires') }}">Populaires</a></li>
                </div>
                <li class="menu-button" onclick="showSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
            </ul>
        </nav>
    </header>

    <section class="book-details">
        <div class="book-container">
            <div class="book-cover">
                <img src="{{ asset('storage/' . $livre->photo_couverture_ogoun) }}" alt="Couverture de {{ $livre->titre_ogoun }}" class="main-cover">
                
                <div class="price-tag">
                    Prix : <span class="price-amount">{{ number_format($livre->prix_ogoun, 0, ',', ' ') }} FCFA</span>
                </div>
                
                @if($livre->prix_ogoun > 0)
                    <button class="purchase-btn" onclick="showPaymentMethodPopup()">
                        <i class="fas fa-shopping-cart"></i> Acheter maintenant
                    </button>
                @else
                    <a href="{{ asset('storage/' . $livre->chapitres->first()->fichier_chapitre ?? '#') }}" class="read-free-btn" target="_blank">
                        <i class="fas fa-book-open"></i> Lire gratuitement
                    </a>
                @endif
            </div>
            
            <div class="book-info">
                <h1>{{ $livre->titre_ogoun }}</h1>
                <p class="author">Par {{ $livre->createur->pseudo_createur ?? 'Auteur inconnu' }}</p>
                <p class="category">Catégorie : {{ $livre->categorie->nom_categorie ?? 'Non classé' }}</p>
                
                <div class="description">
                    <h3>Description</h3>
                    <p>{{ $livre->description_ogoun ?? 'Pas de description disponible.' }}</p>
                </div>
                
                <div class="stats">
                    <span><i class="fas fa-book"></i> {{ $livre->nombre_de_chapitre }} chapitres</span>
                    <span><i class="fas fa-star"></i> Note : 4.5/5</span>
                </div>
            </div>
        </div>
    </section>

    <section class="chapters-section">
        <h2><i class="fas fa-list-ul"></i> Liste des Chapitres</h2>
        
        <!-- Bouton Télécharger tout (visible seulement après paiement) -->
        @if($livre->prix_ogoun > 0 && (session('paiement_effectue_' . $livre->id_ogoun) || auth()->user()?->hasPurchased($livre->id_ogoun)))
            <div class="download-all-container">
                <button onclick="downloadAllChapters()" class="download-all-btn">
                    <i class="fas fa-download"></i> Télécharger tous les chapitres
                </button>
            </div>
        @endif
        
        <div class="chapters-list @if($livre->prix_ogoun > 0 && !session('paiement_effectue_' . $livre->id_ogoun) && !auth()->user()?->hasPurchased($livre->id_ogoun)) locked-content @endif">
            @forelse ($livre->chapitres as $index => $chapitre)
            <div class="chapter-card">
                <div class="chapter-number">Chapitre {{ $index + 1 }}</div>
                <div class="chapter-content">
                    <h3>{{ $chapitre->nom_chapitre }}</h3>
                    <div class="chapter-actions">
                        @if($livre->prix_ogoun > 0 && !session('paiement_effectue_' . $livre->id_ogoun) && !auth()->user()?->hasPurchased($livre->id_ogoun))
                            <button class="preview-btn" onclick="showPaymentMethodPopup()">
                                <i class="fas fa-lock"></i> Acheter pour débloquer
                            </button>
                        @else
                            <a href="{{ asset('storage/' . $chapitre->fichier_chapitre) }}" class="read-btn" target="_blank">
                                <i class="fas fa-book-reader"></i> Lire
                            </a>
                            <a href="{{ asset('storage/' . $chapitre->fichier_chapitre) }}" download class="download-btn">
                                <i class="fas fa-download"></i> Télécharger
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="no-chapters">
                <i class="fas fa-book-open"></i>
                <p>Aucun chapitre disponible pour ce livre.</p>
            </div>
            @endforelse
        </div>
        
        <!-- Overlay de verrouillage avant paiement -->
        @if($livre->prix_ogoun > 0 && !session('paiement_effectue_' . $livre->id_ogoun) && !auth()->user()?->hasPurchased($livre->id_ogoun))
            <div class="lock-overlay" onclick="showPaymentMethodPopup()">
                <div class="lock-message">
                    <i class="fas fa-lock fa-3x"></i>
                    <p>Achetez ce livre pour débloquer tous les chapitres</p>
                    <button class="purchase-btn">
                        <i class="fas fa-shopping-cart"></i> Acheter maintenant
                    </button>
                </div>
            </div>
        @endif
    </section>

    <!-- Popup de Sélection de Méthode de Paiement -->
    <div id="paymentMethodPopup" class="popup-overlay">
        <div class="popup-content">
            <span class="close-btn" onclick="hidePaymentMethodPopup()">&times;</span>
            <h2><i class="fas fa-credit-card"></i> Choisir une méthode de paiement</h2>
            <p>Vous allez acheter "{{ $livre->titre_ogoun }}" pour {{ number_format($livre->prix_ogoun, 0, ',', ' ') }} FCFA</p>
            
            <form id="methodSelectionForm">
                @csrf
                <input type="hidden" name="book_id" value="{{ $livre->id_ogoun }}">
                
                <div class="payment-methods">
                    <div class="method-option">
                        <input type="radio" id="flooz_method" name="payment_method_select" value="flooz" checked>
                        <label for="flooz_method">
                            <img src="{{ asset('image/flooz.jpg') }}" alt="Flooz">
                            <span>Flooz</span>
                        </label>
                    </div>
                    
                    <div class="method-option">
                        <input type="radio" id="tmoney_method" name="payment_method_select" value="tmoney">
                        <label for="tmoney_method">
                            <img src="{{ asset('image/yas.jpg') }}" alt="T-Money">
                            <span>T-Money</span>
                        </label>
                    </div>
                    
                    <div class="method-option">
                        <input type="radio" id="visa_method" name="payment_method_select" value="visa">
                        <label for="visa_method">
                            <img src="{{ asset('image/visa.jpg') }}" alt="Visa">
                            <span>Carte Bancaire</span>
                        </label>
                    </div>
                </div>
                
                <button type="button" onclick="processPaymentMethodSelection()" class="confirm-payment">
                    <i class="fas fa-arrow-right"></i> Continuer
                </button>
            </form>
        </div>
    </div>

    <!-- Popup de Paiement par Téléphone (Flooz/T-Money) -->
    <div id="phonePaymentPopup" class="popup-overlay">
        <div class="popup-content">
            <span class="close-btn" onclick="hidePhonePaymentPopup()">&times;</span>
            <h2><i class="fas fa-mobile-alt"></i> Paiement par Téléphone</h2>
            <p>Veuillez entrer votre numéro de téléphone pour confirmer le paiement de "{{ $livre->titre_ogoun }}".</p>
            <form id="phonePaymentForm">
                @csrf
                <input type="hidden" name="book_id" value="{{ $livre->id_ogoun }}">
                <input type="hidden" name="payment_method" id="phone_payment_method_hidden">
                <div class="form-group">
                    <label for="phone_number">Numéro de téléphone</label>
                    <input type="tel" id="phone_number" name="phone" placeholder="Ex: 91234567" required>
                </div>
                <button type="button" onclick="confirmPhonePayment()" class="confirm-payment">
                    <i class="fas fa-check-circle"></i> Confirmer le paiement
                </button>
            </form>
        </div>
    </div>

    <!-- Popup de Paiement par Carte (Visa) -->
    <div id="cardPaymentPopup" class="popup-overlay">
        <div class="popup-content">
            <span class="close-btn" onclick="hideCardPaymentPopup()">&times;</span>
            <h2><i class="fas fa-credit-card"></i> Paiement par Carte</h2>
            <p>Veuillez entrer vos informations de carte pour acheter "{{ $livre->titre_ogoun }}".</p>
            <form id="cardPaymentForm">
                @csrf
                <input type="hidden" name="book_id" value="{{ $livre->id_ogoun }}">
                <input type="hidden" name="payment_method" value="visa">
                <div class="form-group">
                    <label for="card_number">Numéro de carte</label>
                    <input type="text" id="card_number" name="card_number" placeholder="XXXX XXXX XXXX XXXX" required>
                </div>
                <div class="form-group">
                    <label for="card_name">Nom sur la carte</label>
                    <input type="text" id="card_name" name="card_name" placeholder="Nom Prénom" required>
                </div>
                <div class="form-group" style="display: flex; gap: 1rem;">
                    <div style="flex: 1;">
                        <label for="expiry_date">Date d'expiration (MM/AA)</label>
                        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/AA" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="cvc">CVC</label>
                        <input type="text" id="cvc" name="cvc" placeholder="XXX" required>
                    </div>
                </div>
                <button type="button" onclick="confirmCardPayment()" class="confirm-payment">
                    <i class="fas fa-check-circle"></i> Confirmer le paiement
                </button>
            </form>
        </div>
    </div>

    <script>
        // Fonctions pour le menu latéral (sidebar)
        function showSidebar() {
            document.getElementById('sidebar').classList.add('active');
        }

        function hideSidebar() {
            document.getElementById('sidebar').classList.remove('active');
        }

        // Gestion des popups de paiement
        function showPaymentMethodPopup() {
            document.getElementById('paymentMethodPopup').style.display = 'flex';
        }
        
        function hidePaymentMethodPopup() {
            document.getElementById('paymentMethodPopup').style.display = 'none';
        }

        function showPhonePaymentPopup(method) {
            document.getElementById('phone_payment_method_hidden').value = method;
            document.getElementById('phonePaymentPopup').style.display = 'flex';
        }

        function hidePhonePaymentPopup() {
            document.getElementById('phonePaymentPopup').style.display = 'none';
        }

        function showCardPaymentPopup() {
            document.getElementById('cardPaymentPopup').style.display = 'flex';
        }

        function hideCardPaymentPopup() {
            document.getElementById('cardPaymentPopup').style.display = 'none';
        }
        
        // Fermer les popups si on clique en dehors
        window.onclick = function(event) {
            const methodPopup = document.getElementById('paymentMethodPopup');
            const phonePopup = document.getElementById('phonePaymentPopup');
            const cardPopup = document.getElementById('cardPaymentPopup');

            if (event.target === methodPopup) {
                hidePaymentMethodPopup();
            } else if (event.target === phonePopup) {
                hidePhonePaymentPopup();
            } else if (event.target === cardPopup) {
                hideCardPaymentPopup();
            }
        }
        
        // Fonction pour télécharger tous les chapitres
        function downloadAllChapters() {
            @foreach($livre->chapitres as $chapitre)
                window.open("{{ asset('storage/' . $chapitre->fichier_chapitre) }}", '_blank');
            @endforeach
        }
        
        // Logique de sélection de la méthode de paiement
        function processPaymentMethodSelection() {
            const selectedMethod = document.querySelector('input[name="payment_method_select"]:checked').value;
            hidePaymentMethodPopup(); // Cacher le popup de sélection

            if (selectedMethod === 'flooz' || selectedMethod === 'tmoney') {
                showPhonePaymentPopup(selectedMethod);
            } else if (selectedMethod === 'visa') {
                showCardPaymentPopup();
            }
        }

        // Fonction pour confirmer le paiement par téléphone (Flooz/T-Money)
        function confirmPhonePayment() {
            const form = document.getElementById('phonePaymentForm');
            const submitBtn = form.querySelector('.confirm-payment');
            const phoneNumber = document.getElementById('phone_number').value;
            const paymentMethod = document.getElementById('phone_payment_method_hidden').value;

            if (!phoneNumber) {
                alert('Veuillez entrer un numéro de téléphone.');
                return;
            }

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';
            submitBtn.disabled = true;

            const paymentData = {
                book_id: form.querySelector('input[name="book_id"]').value,
                payment_method: paymentMethod,
                phone: phoneNumber
            };

            // Envoyer la requête de simulation au serveur
            fetch("{{ route('paiement.simulate') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(paymentData)
            })
            .then(response => {
                if (!response.ok) throw new Error('Erreur réseau');
                return response.json();
            })
            .then(data => {
                hidePhonePaymentPopup();
                alert('Paiement simulé avec succès par ' + paymentMethod.toUpperCase() + ' ! Les chapitres sont maintenant disponibles.');
                window.location.reload();
            })
            .catch(error => {
                console.error('Erreur:', error);
                hidePhonePaymentPopup();
                alert('Paiement simulé avec succès ! (Mode développement)');
                window.location.reload();
            })
            .finally(() => {
                submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Confirmer le paiement';
                submitBtn.disabled = false;
            });
        }

        // Fonction pour confirmer le paiement par carte (Visa)
        function confirmCardPayment() {
            const form = document.getElementById('cardPaymentForm');
            const submitBtn = form.querySelector('.confirm-payment');
            const cardNumber = document.getElementById('card_number').value;
            const cardName = document.getElementById('card_name').value;
            const expiryDate = document.getElementById('expiry_date').value;
            const cvc = document.getElementById('cvc').value;

            if (!cardNumber || !cardName || !expiryDate || !cvc) {
                alert('Veuillez remplir toutes les informations de la carte.');
                return;
            }

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';
            submitBtn.disabled = true;

            const paymentData = {
                book_id: form.querySelector('input[name="book_id"]').value,
                payment_method: 'visa',
                card_number: cardNumber,
                card_name: cardName,
                expiry_date: expiryDate,
                cvc: cvc
            };

            // Envoyer la requête de simulation au serveur
            fetch("{{ route('paiement.simulate') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(paymentData)
            })
            .then(response => {
                if (!response.ok) throw new Error('Erreur réseau');
                return response.json();
            })
            .then(data => {
                hideCardPaymentPopup();
                alert('Paiement simulé avec succès par Carte Bancaire ! Les chapitres sont maintenant disponibles.');
                window.location.reload();
            })
            .catch(error => {
                console.error('Erreur:', error);
                hideCardPaymentPopup();
                alert('Paiement simulé avec succès ! (Mode développement)');
                window.location.reload();
            })
            .finally(() => {
                submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Confirmer le paiement';
                submitBtn.disabled = false;
            });
        }
    </script>
</body>
</html>
