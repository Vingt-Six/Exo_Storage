<?php

use App\Http\Controllers\ImageController;
use App\Models\Image;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $images = Image::where('archived', false)->get();
    return view('welcome', compact('images'));
});

Route::get('/corbeille', [ImageController::class, 'index']);
Route::get('/create', [ImageController::class, 'create']);
Route::post('/store', [ImageController::class, 'store']);
Route::get('/edit/{id}', [ImageController::class, 'edit']);
Route::put('/update/{id}', [ImageController::class, 'update']);
Route::delete('/delete/{id}', [ImageController::class, 'destroy']);
Route::get('/archive/{id}', [ImageController::class, 'archive']);