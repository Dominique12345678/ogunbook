<!-- resources/views/dashboardcreator.blade.php -->
@extends('layouts.creator')

@section('title', 'Profil du Créateur')

@section('content')
    <h1>Bienvenue, {{ session('createur')->nom ?? 'Créateur' }}</h1>
    <p>Ceci est votre tableau de bord.</p>
@endsection
