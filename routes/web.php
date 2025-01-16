<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'index']);

Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');

    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/create', [ArticleController::class, 'store'])->name('create');

    Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('edit');
    Route::put('/edit/{article}', [ArticleController::class, 'update'])->name('update');

    Route::delete('/delete/{article}', [ArticleController::class, 'delete'])->name('delete');

    Route::get('/show/{article}', [ArticleController::class, 'show'])->name('show');
});
