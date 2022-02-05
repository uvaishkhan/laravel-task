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
Route::get('/home', function () {
    return "Home";
});
Route::resource('/events/', App\Http\Controllers\EventManagementController::class);
// Route::get('/learner/post/title/{id}', [App\Http\Controllers\PostController::class, 'postTitle'])->name('learner.postTitle');
// Route::post('/learner/post/update-title', [App\Http\Controllers\PostController::class, 'updatePostTitle'])->name('learner.updatePostTitle');