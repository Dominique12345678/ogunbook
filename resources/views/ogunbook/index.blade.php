@extends('layouts.creator')

@section('title', 'Mes livres')

@section('content')
    <h1>Mes OgunBooks</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ogunbooks.create') }}" style="display:inline-block; margin-bottom:20px; padding:10px 15px; background:#3498db; color:white; border-radius:5px; text-decoration:none;">+ Créer un nouveau livre</a>

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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ogunbooks as $book)
                    <tr>
                        <td>
                            @if ($book->photo_couverture_ogoun) {{-- ✅ Correction ici --}}
                                <img src="{{ asset('storage/' . $book->photo_couverture_ogoun) }}" alt="Image" width="80"> {{-- ✅ Correction ici --}}
                            @else
                                <span>Aucune image</span>
                            @endif
                        </td>
                        <td>{{ $book->titre_ogoun }}</td> {{-- ✅ Correction ici --}}
                        <td>{{ Str::limit($book->description_ogoun, 80) }}</td> {{-- ✅ Correction ici --}}
                        <td>{{ $book->nombre_de_chapitre }}</td>
                        <td>{{ $book->prix_ogoun }} $</td> {{-- ✅ Correction ici et ajout du symbole $ --}}
                        <td>{{ $book->categorie->nom_categorie ?? 'Non défini' }}</td>
                
                        <td>
                            {{-- Édition / suppression (à créer plus tard) --}}
                            <form action="{{ route('ogunbooks.destroy', $book->id_ogoun) }}" method="POST" style="display:inline-block;">
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