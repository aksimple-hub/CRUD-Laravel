<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

// 1. Ruta para el cambio de idioma (Debe estar fuera de auth para que funcione en el Welcome)
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'es', 'fr'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('set.lang');

// 2. Rutas públicas
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 3. Rutas protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // SOLO UNA VEZ el recurso de alumnos
    Route::resource('alumno', AlumnoController::class);
});

require __DIR__.'/settings.php';
//require __DIR__.'/auth.php';
