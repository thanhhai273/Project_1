<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/going/{id?}/{link?}', [App\Http\Controllers\LinkController::class, 'clickNumber'])->where('link', '.*')->name('clickNumber');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/change_password',[App\Http\Controllers\Auth\changePasswordController::class, 'index']);
Route::post('/change_password',[App\Http\Controllers\Auth\ChangePasswordController::class, 'changePassword'])->name('change.password'); 
Route::group(['middleware' => 'auth'], function() {

    Route::get('/links', [App\Http\Controllers\UserController::class,'index']);
    Route::get('/links/link', [App\Http\Controllers\LinkController::class,'showLinks']);
    Route::get('/links/add-link', [App\Http\Controllers\LinkController::class,'create']);
    Route::post('/links/add-link', [App\Http\Controllers\LinkController::class,'addLink'])->name('addLink');
    Route::get('/links/{link}', [App\Http\Controllers\LinkController::class,'edit']);
    Route::post('/links/{link}', [App\Http\Controllers\LinkController::class,'update']);
    Route::get('/links/delete/{link}', [App\Http\Controllers\LinkController::class,'deleteLink'])->name('deleteLink');
    Route::get('/design', [App\Http\Controllers\LinkController::class,'design']);
    Route::get('/users/page', [App\Http\Controllers\UserController::class, 'showPage'])->name('showPage');
    Route::post('/users/page', [App\Http\Controllers\UserController::class, 'editPage'])->name('editPage');
    Route::get('/users/profile', [App\Http\Controllers\UserController::class, 'showProfile'])->name('showProfile');
    Route::post('/users/profile', [App\Http\Controllers\UserController::class, 'editProfile'])->name('editProfile');

});
Route::group([
    'middleware' => 'admin',
], function () {
Route::get('/admins/index', [App\Http\Controllers\AdminController::class, 'index'])->name('AdminIndex');
Route::get('/admins/users/{type}', [App\Http\Controllers\AdminController::class, 'users'])->name('showAllUser');
Route::post('/admins/users/{name?}', [App\Http\Controllers\AdminController::class, 'searchUser'])->name('searchUser');
Route::get('/admins/users/block/{block}/{id}', [App\Http\Controllers\AdminController::class, 'blockUser'])->name('blockUser');
Route::get('/admins/edit-user/{id}', [App\Http\Controllers\AdminController::class, 'showUser'])->name('showUser');
Route::post('/admins/edit-user/{id}',[App\Http\Controllers\AdminController::class, 'editUser'])->name('editUser');
});

Route::get('/{user}', [App\Http\Controllers\UserController::class,'show'])->name('show');
