<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

// Book Routes
Route::get('books', [BookController::class, 'index']);
Route::group(['prefix' => 'book'], function () {
    Route::post('add', [BookController::class, 'add']);
    Route::get('edit/{id}', [BookController::class, 'edit']);
    Route::post('update/{id}', [BookController::class, 'update']);
    Route::delete('delete/{id}', [BookController::class, 'delete']);
});

// Category Routes
Route::get('categories', [CategoryController::class, 'index']);
Route::group(['prefix' => 'category'], function () {
    Route::post('add', [CategoryController::class, 'add']);
    Route::get('edit/{id}', [CategoryController::class, 'edit']);
    Route::post('update/{id}', [CategoryController::class, 'update']);
    Route::delete('delete/{id}', [CategoryController::class, 'delete']);
});
