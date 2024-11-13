<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('goLogin');
});

// 액션 메소드 명(유저)
// 로그인 관련
Route::get('/login', [UserController::class, 'goLogin'])->name('goLogin');
Route::post('login', [UserController::class, 'login'])->name('login');
// 로그아웃 처리
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


// 게시판 관련
Route::resource('/boards', BoardController::class)->except(['update', 'edit']);