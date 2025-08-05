<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'utilisateurs'), // Assurez-vous que c'est 'utilisateurs' ou 'web' si c'est le défaut
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'utilisateurs', // Le provider par défaut pour les utilisateurs
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        // ✅ Vérifiez cette section pour les créateurs
        'createur' => [
            'driver' => 'session',
            'provider' => 'createurs', // Doit pointer vers le provider 'createurs'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'utilisateurs' => [
            'driver' => 'eloquent',
            'model' => App\Models\Utilisateur::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        // ✅ Vérifiez cette section pour les créateurs
        'createurs' => [
            'driver' => 'eloquent',
            'model' => App\Models\Createur::class, // Doit pointer vers votre modèle Createur
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */
    'passwords' => [
        'utilisateurs' => [
            'provider' => 'utilisateurs',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],

        // ✅ Vérifiez cette section pour les créateurs
        'createurs' => [
            'provider' => 'createurs',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
