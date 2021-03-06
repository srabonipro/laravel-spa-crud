<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProductController;

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

// Files Routes
Route::get('/books/pdf', [FileController::class, 'createPdf']);
Route::get('/books/excel', [FileController::class, 'createExcel']);
Route::get('/books/csv', [FileController::class, 'createCsv']);

// Search Routes
Route::get('/books/search', [BookController::class, 'search']);

// Product Routes
Route::post('product/store', [ProductController::class, 'store']);

// Book Routes
Route::apiResource('books', BookController::class);

// Category Routes
Route::apiResource('categories', CategoryController::class);
