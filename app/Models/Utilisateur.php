<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'utilisateurs';
    protected $primaryKey = 'id_utilisateur';
    public $timestamps = true;

    protected $fillable = [
        'nom_utilisateurs',
        'prenoms_utilisateurs',
        'pseudo_utilisateurs',
        'num_tel_utilisateur',
        'genre_utilisateur',
        'date_de_naissance_utilisateur',
        'email_utilisateur',
        'google_id_utilisateur',
        'mot_de_passe_utilisateur',
    ];

    protected $hidden = [
        'mot_de_passe_utilisateur',
    ];

    // ⚠️ Laravel attend "password", donc on mappe
    public function getAuthPassword()
    {
        return $this->mot_de_passe_utilisateur;
    }
}
