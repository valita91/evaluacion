<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonaController;


Route::post('/personas', [PersonaController::class, 'store']);     //
Route::put('/personas/{persona}', [PersonaController::class, 'update']); 
Route::delete('/personas/{persona}', [PersonaController::class, 'destroy']); 