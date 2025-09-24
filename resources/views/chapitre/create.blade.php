*@extends('layouts.creator')

@section('title', 'Ajouter un chapitre')

@section('content')
    {{-- Le conteneur principal est déjà géré par la classe .main-content de votre layout --}}
    
    <h1 class="page-title">
        Sélectionnez un livre pour ajouter un chapitre
    </h1>

    @if (session('success'))
        <div class="alert-success" role="alert">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if ($ogunbooks->isEmpty())
        <div class="empty-state">
            <svg class="empty-state-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <h3 class="empty-state-title">Aucun Ogunbook trouvé</h3>
            <p class="empty-state-text">Vous n'avez pas encore créé de livre. Commencez par en créer un.</p>
            <a href="{{ route('ogunbooks.create') }}" class="btn-create-book">
                Créer un Ogunbook
            </a>
        </div>
    @else
        <div class="book-grid">
            @foreach ($ogunbooks as $book)
                <div class="book-card">
                    
                    @if ($book->photo_couverture_ogoun)
                        <img src="{{ asset('storage/' . $book->photo_couverture_ogoun) }}" alt="Couverture de {{ $book->titre_ogoun }}" class="book-cover">
                    @else
                        <div class="book-cover-placeholder">
                            <span>Aucune image</span>
                        </div>
                    @endif
                    
                    <h2 class="book-title">{{ $book->titre_ogoun }}</h2>
                    <p class="book-description">{{ Str::limit($book->description_ogoun, 80) }}</p>
                    
                    <a href="{{ route('creator.chapters.add_to_book', $book->id_ogoun) }}" class="btn-add-chapter">
                        Ajouter un chapitre
                    </a>
                </div>
            @endforeach
        </div>
    @endif
    
@endsection