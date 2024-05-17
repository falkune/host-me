<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

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

# Route pour enregistrer un utilisateur
Route::post('/register', function(Request $request) {
    $user = User::create([
        'nom'      =>  $request->input('nom'),
        'prenom'   =>  $request->input('prenom'),
        'email'    =>  $request->input('email'),
        'password' =>  $request->input('password'),
    ]);
});