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
        'fichier_chapitre', // ✅ Correction ici
        'id_ogoun'  // ✅ Correction ici
    ];

    /**
     * Relation vers le livre (Ogunbook)
     */
    public function ogunbook()
    {
        return $this->belongsTo(Ogunbook::class, 'id_ogoun', 'id_ogoun'); // ✅ Correction ici
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
