<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MessageController;

Route::get('/', [ArticleController::class, 'index']);

Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');

    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/create', [ArticleController::class, 'store'])->name('store');

    Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('edit');
    Route::put('/edit/{article}', [ArticleController::class, 'update'])->name('update');

    Route::delete('/delete/{article}', [ArticleController::class, 'delete'])->name('delete');

    Route::get('/show/{article}', [ArticleController::class, 'show'])->name('show');
});

Route::prefix('tags')->name('tags.')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('index');

    Route::get('/create', [TagController::class, 'create'])->name('create');
    Route::post('/create', [TagController::class, 'store'])->name('store');

    Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('edit');
    Route::put('/edit/{tag}', [TagController::class, 'update'])->name('update');

    Route::delete('/delete/{tag}', [TagController::class, 'delete'])->name('delete');

    Route::get('/show/{tag}', [TagController::class, 'show'])->name('show');
});

// Route::prefix('message')->name('messages.')->group(function () {
//     Route::get('/', [MessageController::class], 'create')->name('index');

//     Route::get('/message', [MessageController::class], 'create')->name('create');
//     Route::post('/message', [MessageController::class], 'store')->name('store');
// });


Route::prefix('messages')->name('messages.')->group(function () {
    Route::get('/', [MessageController::class, 'index'])->name('index');

    Route::get('/create', [MessageController::class, 'create'])->name('create');
    Route::post('/create', [MessageController::class, 'store'])->name('store');
});
