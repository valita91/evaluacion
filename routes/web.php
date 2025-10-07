<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/personas', [PersonasController::class, 'index'])->name('personas.index');
