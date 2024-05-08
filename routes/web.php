<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LoginController;
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


Route::group(['prefix' => '/', 'middleware' => 'login'], function () {
    route::get('/admin', [AdminController::class, 'index'])->name('admin');
    route::get('/data-account', [AdminController::class, 'dataAccount'])->name('data-account');
    Route::get('edit-member/{username}/detail', [AdminController::class, 'editDataAccount'])->name('edit-account');


    route::get('/author', [AuthorController::class, 'index'])->name('author');
});


route::get('/', [LoginController::class, 'index'])->name('home');

route::get('login', [LoginController::class, 'index'])->name('login');
route::post('login-admin', [LoginController::class, 'loginAdmin'])->name('loginAdmin');
route::post('login-member', [LoginController::class, 'loginMember'])->name('loginMember');
route::post('logout', [LoginController::class, 'logout'])->name('logout');