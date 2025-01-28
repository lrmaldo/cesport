<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistroController;
use App\Models\Registro;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/carrera', function () {
    $conteo = Registro::count();
    return view('carrera', compact('conteo'));
});
Route::post('/summit-registro', [RegistroController::class, 'store'])->name('summit-registro');

Route::get('/confirmacion/{numero_corredor}', [RegistroController::class, 'confirmacion']);

Route::resource('users', UserController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [RegistroController::class, 'index'])->name('dashboard');
    Route::resource('registros', RegistroController::class)->except(['store']);
    /* getData */
    Route::get('getData', [RegistroController::class, 'getData'])->name('getData');
});


