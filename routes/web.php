<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listController;

Route::get('/', function () {
    return view('home');
});


Route::get('/', [listController::class, 'index']);
Route::post('/add', [ListController::class, 'create']);

Route::delete('/posts/{id}', [ListController::class, 'destroy'])->name('posts.destroy');
Route::patch('/posts/{id}/status', [ListController::class, 'update'])->name('posts.updateStatus');
