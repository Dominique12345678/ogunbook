<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ogunbook extends Model
{
    protected $table = 'ogunbook';
    protected $primaryKey = 'id_ogoun'; // ✅ Correction ici
    public $timestamps = true;

    protected $fillable = [
        'titre_ogoun', // ✅ Correction ici
        'description_ogoun', // ✅ Correction ici
        'prix_ogoun', // ✅ Correction ici
        'id_createur',
        'id_categorie',
        'photo_couverture_ogoun', // ✅ Correction ici
        'tags_ogoun', // ✅ Correction ici
        'nombre_de_chapitre' // Cette colonne n'est pas dans la migration, à vérifier
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
        return $this->hasMany(Chapitre::class, 'id_ogoun'); // ✅ Utilisez 'id_ogoun' comme clé étrangère
    }
    
    // Accessor pour le prix formaté
    public function getPrixFormateAttribute()
    {
        return number_format($this->prix_ogoun, 0, ',', ' ').' FCFA'; // ✅ Correction ici
    }
    
    // Accessor pour l'URL complète de l'image
    public function getImageUrlAttribute()
    {
        return $this->photo_couverture_ogoun ? asset('storage/'.$this->photo_couverture_ogoun) : asset('images/default-book.jpg'); // ✅ Correction ici
    }
}
