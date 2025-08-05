<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Paiement; // Assurez-vous d'importer le modèle Paiement

class Utilisateur extends Authenticatable
{
    use Notifiable;

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
        'remember_token', //Vous pouvez l'ajouter si vous utilisez la fonctionnalité "se souvenir de moi"//
    ];

    public $timestamps = true;

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->mot_de_passe_utilisateur;
    }

    /**
     * Vérifie si l'utilisateur a acheté un livre spécifique.
     *
     * @param int $bookId L'ID de l'Ogunbook à vérifier.
     * @return bool
     */
    public function hasPurchased(int $bookId): bool
    {
        // Vérifie si un enregistrement de paiement existe pour cet utilisateur et ce livre,
        // avec un statut 'effectue' ou 'terminé' (ajustez selon vos statuts réels).
        return Paiement::where('user_id', $this->id_utilisateur)
                       ->where('book_id', $bookId)
                       ->where('statut', 'effectue') // Ou 'terminé', 'completed', etc.
                       ->exists();
    }
}
