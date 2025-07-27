@extends('layouts.creator')

@section('title', 'Ajouter un chapitre')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Sélectionnez un Ogunbook pour ajouter un chapitre</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($ogunbooks->isEmpty())
            <p class="text-gray-600">Vous n'avez pas encore créé d'Ogunbook. Veuillez en créer un d'abord pour pouvoir ajouter des chapitres.</p>
            <a href="{{ route('ogunbooks.create') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Créer un Ogunbook
            </a>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($ogunbooks as $book)
                    <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center text-center">
                        @if ($book->photo_couverture_ogoun)
                            <img src="{{ asset('storage/' . $book->photo_couverture_ogoun) }}" alt="{{ $book->titre_ogoun }}" class="w-32 h-48 object-cover rounded-md mb-4">
                        @else
                            <div class="w-32 h-48 bg-gray-200 flex items-center justify-center rounded-md mb-4">
                                <span class="text-gray-500 text-sm">Pas d'image</span>
                            </div>
                        @endif
                        <h2 class="text-xl font-semibold mb-2">{{ $book->titre_ogoun }}</h2>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($book->description_ogoun, 100) }}</p>
                        <a href="{{ route('my_chapters.add_to_book', $book->id_ogoun) }}" class="mt-auto bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Ajouter un chapitre
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection