@extends('layouts.creator')

@section('title', 'Mes livres')

@section('content')
    <h1>Mes OgunBooks</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ogunbook.create') }}" style="display:inline-block; margin-bottom:20px; padding:10px 15px; background:#3498db; color:white; border-radius:5px; text-decoration:none;">+ Créer un nouveau livre</a>

    @if ($ogunbooks->isEmpty())
        <p>Aucun livre créé pour le moment.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead>
                <tr style="background-color: #f5f5f5;">
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Chapitres</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ogunbooks as $book)
                    <tr>
                        <td>
                            @if ($book->image_book)
                                <img src="{{ asset('storage/' . $book->image_book) }}" alt="Image" width="80">
                            @else
                                <span>Aucune image</span>
                            @endif
                        </td>
                        <td>{{ $book->nom_book }}</td>
                        <td>{{ Str::limit($book->description, 80) }}</td>
                        <td>{{ $book->nombre_de_chapitre }}</td>
                        <td>{{ number_format($book->prix_book, 0, ',', ' ') }} FCFA</td>
                        <td>{{ $book->categorie->nom_categorie ?? 'Non défini' }}</td>
                
                        <td>
                            {{-- Édition / suppression (à créer plus tard) --}}
                            <form action="{{ route('ogunbook.destroy', $book->id_book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Supprimer ce livre ?')" style="background: red; color:white; border:none; padding:5px 10px;">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
