<?php

use Illuminate\Support\Facades\Route;

# route pour afficher la page d'acceuil
Route::get('/', function () {
    return view('home');
});

# Route pour afficher le formulaire d'inscription
Route::get('/register', function() {
    return view('register');
});

# Route pour afficher le formulaire de connexion
Route::get('/login', function() {
    return view('login');
});