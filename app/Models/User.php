<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Le nom de la table associée au modèle.
     *
     * @var string
     */
    protected $table = 'utilisateurs';

    /**
     * La clé primaire du modèle.
     *
     * @var string
     */
    protected $primaryKey = 'id_utilisateur';

    /**
     * Les attributs qui sont assignables en masse.
     * Note: J'ai ajouté 'google_id_utilisateur' pour le login social.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom_utilisateurs',
        'prenoms_utilisateurs',
        'pseudo_utilisateurs',
        'num_tel_utilisateur',
        'genre_utilisateur',
        'date_de_naissance_utilisateur',
        'email_utilisateur',
        'mot_de_passe_utilisateur',
        'google_id_utilisateur', // <-- Ajout pour le login Google
    ];

    /**
     * Les attributs qui doivent être masqués lors de la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'mot_de_passe_utilisateur',
        'remember_token',
    ];

    /**
     * Les casts pour les attributs.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'mot_de_passe_utilisateur' => 'hashed',
            'email_verified_at' => 'datetime',
        ];
    }

    /**
     * Récupère le mot de passe pour l'authentification.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe_utilisateur;
    }

    /**
     * Récupère l'email pour la vérification.
     *
     * @return string
     */
    public function getEmailForVerification()
    {
        return $this->email_utilisateur;
    }
    
    /**
     * Récupère le nom de l'identifiant d'authentification.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'email_utilisateur';
    }
}
