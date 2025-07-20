<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ogunbook extends Model
{
    protected $table = 'ogunbook';
    protected $primaryKey = 'id_book';
    public $timestamps = true;

    protected $fillable = [
        'nom_book', 
        'description', 
        'prix_book', 
        'id_createur', 
        'id_categorie', 
        'image_book', 
        'nombre_de_chapitre'
    ];

    // Relation vers le créateur
    public function createur()
    {
        return $this->belongsTo(Createur::class, 'id_createur', 'id_createur');
    }

    // Relation vers la catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie', 'id_categorie');
    }

    // Relation vers les chapitres - CORRIGÉ
    public function chapitres()
    {
        return $this->hasMany(Chapitre::class, 'id_book'); // Utilisez 'id_book' comme clé étrangère
    }
    
    // Accessor pour le prix formaté
    public function getPrixFormateAttribute()
    {
        return number_format($this->prix_book, 0, ',', ' ').' FCFA';
    }
    
    // Accessor pour l'URL complète de l'image
    public function getImageUrlAttribute()
    {
        return $this->image_book ? asset('storage/'.$this->image_book) : asset('images/default-book.jpg');
    }
}