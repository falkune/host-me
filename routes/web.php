<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hebergement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        'password' =>  Hash::make($request->input('password')),
    ]);
});

# route pour connecter un utilisateur
Route::post('/login', function(Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
    return back();
});

# route pour afficher le formulaire de mise en ligne d'un hebergement
Route::get('/add-host', function(){
    return view('add-host');
});

# Route pour mettre en ligne une annonce
Route::post('/add-host', function(Request $request) {
    $image = $request->file('image');
    $extension = $image->getClientOriginalExtension();
    $imageName = time() . '.' . $extension;
    $image->move(public_path('imgs'), $imageName);

    $add = Hebergement::create([
        'titre'          =>    $request['titre'],
        'description'    =>    $request['description'],
        'localisation'   =>    $request['localisation'],
        'user_id'        =>    auth()->user()->id,
        'image'          =>    $imageName
    ]);
});