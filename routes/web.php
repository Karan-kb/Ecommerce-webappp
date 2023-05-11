<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// tag
Route::get('backend/tag/create',[\App\Http\Controllers\Backend\TagController::class,'create'])->name('backend.tag.create');
Route:: post('backend/tag',[\App\Http\Controllers\Backend\TagController::class,'store'])->name('backend.tag.store');
Route::get('backend/tag',[\App\Http\Controllers\Backend\TagController::class,'index'])->name('backend.tag.index');
Route:: get('backend/tag/{id}',[\App\Http\Controllers\backend\TagController::class,'show'])->name('backend.tag.show');
Route:: delete('backend/tag/{id}',[\App\Http\Controllers\backend\TagController::class,'destroy'])->name('backend.tag.destroy');
//route to edit data
Route:: get('backend/tag/{id}/edit',[\App\Http\Controllers\backend\TagController::class,'edit'])->name('backend.tag.edit');
//route to update data
Route:: put('backend/tag/{id}',[\App\Http\Controllers\backend\TagController::class,'update'])->name('backend.tag.update');