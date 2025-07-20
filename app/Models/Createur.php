<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Createur extends Model
{
    protected $table = 'createur'; // Correction ici ✅

    protected $fillable = [
        'nom_createur',
        'prenoms_createur',
        'pseudo_createur',
        'date_de_naissance',
        'genre',
        'type_createur',
        'email_createur',
        'num_tel_createur',
        'mot_de_passe_createur',
    ];
}
