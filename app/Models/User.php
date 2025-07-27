<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
        'remember_token',
    ];

    // ✅ Ajout de la méthode casts pour le hachage automatique du mot de passe
    protected function casts(): array
    {
        return [
            'mot_de_passe_utilisateur' => 'hashed',
            'email_verified_at' => 'datetime', // Garder si vous avez cette colonne
        ];
    }

    public function getAuthPassword()
    {
        return $this->mot_de_passe_utilisateur;
    }

    public function getEmailForVerification()
    {
        return $this->email_utilisateur;
    }
    
    public function getAuthIdentifierName()
    {
        return 'email_utilisateur';
    }
}
