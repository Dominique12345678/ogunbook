<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Createur extends Authenticatable
{
    protected $table = 'createur';
    protected $primaryKey = 'id_createur';


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

    protected $hidden = [
        'mot_de_passe_createur',
        'remember_token', // Ajouté pour masquer le token de rappel si utilisé
    ];

    // ✅ Ajout de la méthode casts pour le hachage automatique du mot de passe
    protected function casts(): array
    {
        return [
            'mot_de_passe_createur' => 'hashed',
        ];
    }

    public function getAuthPassword()
    {
        return $this->mot_de_passe_createur;
    }
}
