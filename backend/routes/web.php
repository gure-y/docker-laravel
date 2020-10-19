<?php

use App\Http\Controllers\ItemsController;

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


Route::get('/',[ItemsController::class, 'index'])->name('index');

Route::get('/create',[ItemsController::class, 'create'])->name('create');
Route::post('/store',[ItemsController::class, 'store'])->name('store');

Route::get('/edit/{id}', [ItemsController::class, 'edit'])->name('edit');
Route::post('/update', [ItemsController::class, 'update'])->name('update');

Route::get('/delete/{id}', [ItemsController::class, 'delete'])->name('delete');

Route::get('/show/{id}', [ItemsController::class, 'show'])->name('show');

Auth::routes(); 
// ↑は、vendor/laravel/framework/src/Illuminate/Routing/Router.php
// に記述されているauthメソッドを呼び出している。
// これではじめから用意されているuser系のルーティングは記述する必要がなくなる(devise forみたいなもの)

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/bookmark', [ItemsController::class, 'bookmark'])->name('bookmark');
Route::post('/bookmark', [ItemsController::class, 'addBookmark'])->name('addBookmark');