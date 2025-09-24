<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Createur extends Authenticatable
{
    use Notifiable;

    protected $table = 'createur';
    protected $primaryKey = 'id_createur';
    public $timestamps = true;

    protected $fillable = [
        'nom_createur',
        'prenoms_createur',
        'pseudo_createur',
        'date_de_naissance',
        'genre',
        'type_createur',
        'email_createur',
        'google_id',
        'num_tel_createur',
        'mot_de_passe_createur',
    ];

    protected $hidden = [
        'mot_de_passe_createur',
    ];

    // ⚠️ Mapping du champ password
    public function getAuthPassword()
    {
        return $this->mot_de_passe_createur;
    }
}
