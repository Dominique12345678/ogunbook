<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $livre->nom_book }} | OgunBook</title>
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
            background-color: #27ae60;
            color: white;
        }
        
        .download-btn:hover {
            background-color: #219653;
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
            background-color: #27ae60;
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
            background-color: #219653;
            transform: translateY(-2px);
        }
        
        .download-all-btn i {
            font-size: 1.2rem;
        }
        
        /* Popup de paiement */
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
            background-color: #e74c3c;
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
            background-color: #c0392b;
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
    </style>
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <a href="{{ route('accueil') }}">
                    <img src="{{ asset('image/OG1.png') }}" alt="OgunBook Logo">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li><a href="{{ route('user.accueil') }}">Bibliothèque</a></li>
                <li><a href="{{ route('userogunbook') }}">Nouveautés</a></li>
            </ul>
        </nav>
    </header>

    <section class="book-details">
        <div class="book-container">
            <div class="book-cover">
                <img src="{{ asset('storage/' . $livre->image_book) }}" alt="Couverture de {{ $livre->nom_book }}" class="main-cover">
                
                <div class="price-tag">
                    Prix : <span class="price-amount">{{ number_format($livre->prix_book, 0, ',', ' ') }} FCFA</span>
                </div>
                
                @if($livre->prix_book > 0)
                    <button class="purchase-btn" onclick="showPaymentPopup()">
                        <i class="fas fa-shopping-cart"></i> Acheter maintenant
                    </button>
                @else
                    <a href="{{ route('lecture.livre', $livre->id_book) }}" class="read-free-btn">
                        <i class="fas fa-book-open"></i> Lire gratuitement
                    </a>
                @endif
            </div>
            
            <div class="book-info">
                <h1>{{ $livre->nom_book }}</h1>
                <p class="author">Par {{ $livre->createur->pseudo_createur ?? 'Auteur inconnu' }}</p>
                <p class="category">Catégorie : {{ $livre->categorie->nom_categorie ?? 'Non classé' }}</p>
                
                <div class="description">
                    <h3>Description</h3>
                    <p>{{ $livre->description ?? 'Pas de description disponible.' }}</p>
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
        @if($livre->prix_book > 0 && (session('paiement_effectue_' . $livre->id_book) || auth()->user()?->hasPurchased($livre->id_book)))
            <div class="download-all-container">
                <button onclick="downloadAllChapters()" class="download-all-btn">
                    <i class="fas fa-download"></i> Télécharger tous les chapitres
                </button>
            </div>
        @endif
        
        <div class="chapters-list @if($livre->prix_book > 0 && !session('paiement_effectue_' . $livre->id_book) && !auth()->user()?->hasPurchased($livre->id_book)) locked-content @endif">
            @forelse ($livre->chapitres as $index => $chapitre)
            <div class="chapter-card">
                <div class="chapter-number">Chapitre {{ $index + 1 }}</div>
                <div class="chapter-content">
                    <h3>{{ $chapitre->nom_chapitre }}</h3>
                    <div class="chapter-actions">
                        @if($livre->prix_book > 0 && !session('paiement_effectue_' . $livre->id_book) && !auth()->user()?->hasPurchased($livre->id_book))
                            <button class="preview-btn" onclick="showPaymentPopup()">
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
        @if($livre->prix_book > 0 && !session('paiement_effectue_' . $livre->id_book) && !auth()->user()?->hasPurchased($livre->id_book))
            <div class="lock-overlay" onclick="showPaymentPopup()">
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

    <!-- Popup de Paiement -->
    <div id="paymentPopup" class="popup-overlay">
        <div class="popup-content">
            <span class="close-btn" onclick="hidePaymentPopup()">&times;</span>
            <h2><i class="fas fa-credit-card"></i> Paiement</h2>
            <p>Vous allez acheter "{{ $livre->nom_book }}" pour {{ number_format($livre->prix_book, 0, ',', ' ') }} FCFA</p>
            
            <form id="paymentForm">
                @csrf
                <input type="hidden" name="book_id" value="{{ $livre->id_book }}">
                
                <div class="payment-methods">
                    <div class="method-option">
                        <input type="radio" id="flooz" name="payment_method" value="flooz" checked>
                        <label for="flooz">
                            <img src="{{ asset('image/flooz.jpg') }}" alt="Flooz">
                            <span>Flooz</span>
                        </label>
                    </div>
                    
                    <div class="method-option">
                        <input type="radio" id="tmoney" name="payment_method" value="tmoney">
                        <label for="tmoney">
                            <img src="{{ asset('image/yas.jpg') }}" alt="T-Money">
                            <span>T-Money</span>
                        </label>
                    </div>
                    
                    <div class="method-option">
                        <input type="radio" id="visa" name="payment_method" value="visa">
                        <label for="visa">
                            <img src="{{ asset('image/visa.jpg') }}" alt="Visa">
                            <span>Carte Bancaire</span>
                        </label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="phone">Numéro de téléphone</label>
                    <input type="tel" id="phone" name="phone" placeholder="Ex: 91234567" required>
                </div>
                
                <button type="button" onclick="processPayment()" class="confirm-payment">
                    <i class="fas fa-check-circle"></i> Confirmer le paiement
                </button>
            </form>
        </div>
    </div>

    <script>
        // Gestion du popup de paiement
        function showPaymentPopup() {
            document.getElementById('paymentPopup').style.display = 'flex';
        }
        
        function hidePaymentPopup() {
            document.getElementById('paymentPopup').style.display = 'none';
        }
        
        // Fermer le popup si on clique en dehors
        window.onclick = function(event) {
            const popup = document.getElementById('paymentPopup');
            if (event.target === popup) {
                popup.style.display = 'none';
            }
        }
        
        // Fonction pour télécharger tous les chapitres
        function downloadAllChapters() {
            @foreach($livre->chapitres as $chapitre)
                window.open("{{ asset('storage/' . $chapitre->fichier_chapitre) }}", '_blank');
            @endforeach
        }
        
        // Simulation de paiement TOUJURS réussie
        function processPayment() {
            const form = document.getElementById('paymentForm');
            const submitBtn = document.querySelector('.confirm-payment');
            
            // Afficher un loader
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';
            submitBtn.disabled = true;

            // Simulation d'un paiement réussi après 1.5 secondes
            setTimeout(() => {
                // Créer un objet FormData pour récupérer les valeurs
                const formData = new FormData(form);
                const paymentData = {
                    book_id: formData.get('book_id'),
                    payment_method: formData.get('payment_method'),
                    phone: formData.get('phone')
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
                    hidePaymentPopup();
                    alert('Paiement simulé avec succès ! Les chapitres sont maintenant disponibles.');
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    // En cas d'erreur, on simule quand même le succès pour le développement
                    hidePaymentPopup();
                    alert('Paiement simulé avec succès ! (Mode développement)');
                    window.location.reload();
                })
                .finally(() => {
                    submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Confirmer le paiement';
                    submitBtn.disabled = false;
                });
            }, 1500);
        }
    </script>
</body>
</html>