<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

// Files Routes
Route::get('/books/pdf', [FileController::class, 'createPdf']);

// Book Routes
Route::apiResource('books', BookController::class);

// Category Routes
Route::apiResource('categories', CategoryController::class);
