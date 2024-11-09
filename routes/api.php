<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::middleware(['auth:api'])->namespace('post')->group(function () {
    Route::post('/add',[AddController::class, 'add']);
    Route::get('/list',[ListController::class, 'list']);
    Route::put('/edit/{id}',[EditController::class, 'edit']);
    Route::delete('/remove/{id}',[DeleteController::class, 'remove']);
});
