<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}',[CategoryController::class, 'show']);
Route::post('/categories',[CategoryController::class, 'save']);
Route::delete('/categories/{category}',[CategoryController::class, 'destroy']);




Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}',[PostController::class, 'show']);
Route::post('/posts',[PostController::class, 'save']);
Route::put('/posts/{post}', [PostController::class, 'update']);

Route::get('/posts/{post}/comments', [CommentController::class, 'index']);
Route::post('/posts/{post}/comments', [CommentController::class, 'save']);
Route::put('/posts/{post}/comments/{comment}', [CommentController::class, 'update']);
