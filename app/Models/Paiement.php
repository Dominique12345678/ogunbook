<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $table = 'paiements';
    
    protected $fillable = [
        'user_id',
        'book_id',
        'montant',
        'methode',
        'statut'
    ];

    // Relation avec le livre
    public function livre()
    {
        return $this->belongsTo(Ogunbook::class, 'book_id', 'id_book');
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}