<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\NominationController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/nominate',  [NominationController::class, 'create']);
Route::post('/nominate', [NominationController::class, 'store']);

Route::get('/admin/nominations', [NominationController::class, 'index']);
Route::delete('/admin/nominations/{id}', [NominationController::class, 'destroy']);

Route::get('/admin/nominations/export', [NominationController::class, 'export']);