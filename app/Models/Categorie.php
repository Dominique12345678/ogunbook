<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id_categorie';
    public $timestamps = true;

    protected $fillable = ['nom_categorie'];

    public function ogunbooks()
    {
        return $this->hasMany(Ogunbook::class, 'id_categorie');
    }
}
