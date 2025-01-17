<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;

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
