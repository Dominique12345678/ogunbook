<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id_utilisateur';

    protected $fillable = [
        'nom_utilisateurs',
        'prenoms_utilisateurs',
        'pseudo_utilisateurs',
        'num_tel_utilisateur',
        'genre_utilisateur',
        'date_de_naissance_utilisateur',
        'email_utilisateur',
        'mot_de_passe_utilisateur',
    ];

    protected $hidden = [
        'mot_de_passe_utilisateur',
    ];

    public $timestamps = true;
}
