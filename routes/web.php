<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/box/1', function () {
    return view('box1');
});

Route::get('/box/2', function () {
    return view('box2');
});

Route::get('/box/3', function () {
    return view('box3');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        $dbName = DB::connection()->getDatabaseName();
        return "✅ Connexion réussie à la base de données : {$dbName}";
    } catch (\Exception $e) {
        return "❌ Erreur de connexion : " . $e->getMessage();
    }
});

require __DIR__.'/auth.php';
