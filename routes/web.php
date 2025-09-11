<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MysteryBoxController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MysteryBoxController::class, 'getMysteryBox']);

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/box/1', function () {
    return redirect()->route('payment.show', ['box' => '1']);
});

Route::get('/box/2', function () {
    return redirect()->route('payment.show', ['box' => '2']);
});

Route::get('/box/3', function () {
    return redirect()->route('payment.show', ['box' => '3']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes de paiement
Route::get('/payment', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');

Route::get('/test-db', function () {
    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();
        $dbName = \Illuminate\Support\Facades\DB::connection()->getDatabaseName();
        return "✅ Connexion réussie à la base de données : {$dbName}";
    } catch (\Exception $e) {
        return "❌ Erreur de connexion : " . $e->getMessage();
    }
});

require __DIR__.'/auth.php';

