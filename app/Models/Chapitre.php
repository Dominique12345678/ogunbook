<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    protected $table = 'chapitre';
    protected $primaryKey = 'id_chapitre';
    public $timestamps = true;

    protected $fillable = [
        'nom_chapitre', 
        'image_chapitre', 
        'fichier_chapitre', 
        'id_book'  // Clé étrangère
    ];

    /**
     * Relation vers le livre (Ogunbook)
     */
    public function ogunbook()  // Meilleur nom pour la relation
    {
        return $this->belongsTo(Ogunbook::class, 'id_book', 'id_book');
    }
    
    /**
     * Accessor pour le chemin complet de l'image
     */
    public function getImageChapitreAttribute($value)
    {
        return $value ? asset('storage/'.$value) : asset('images/default-chapter.png');
    }
    
    /**
     * Accessor pour le chemin complet du fichier
     */
    public function getFichierChapitreAttribute($value)
    {
        return $value ? asset('storage/'.$value) : null;
    }
}