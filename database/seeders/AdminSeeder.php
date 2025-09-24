<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // Importer le modèle Admin
use Illuminate\Support\Facades\Hash; // Importer la façade Hash

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Créer un administrateur par défaut
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@ogunbook.com',
            'password' => Hash::make('password123'), // Changez ce mot de passe !
        ]);
    }
}