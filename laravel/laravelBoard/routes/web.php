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

// 액션 메소드 명(유저) / 로그인 관련
// 로그인 페이지 이동
Route::middleware('guest')->get('/login', [UserController::class, 'goLogin'])->name('goLogin');
// 로그인 처리
Route::middleware('guest')->post('login', [UserController::class, 'login'])->name('login');
// 로그아웃 처리
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


// 회원가입 페이지 이동
Route::middleware('guest')->get('/regist', [UserController::class, 'goRegist'])->name('goRegist');
// 선생님 코드
Route::middleware('guest')->get('/registration', [UserController::class, 'registration'])->name('get.registration');

// 회원가입 처리
Route::middleware('guest')->post('/regist', [UserController::class, 'regist'])->name('regist');
// 선생님 코드
Route::middleware('guest')->post('/registration', [UserController::class, 'storeRegistration'])->name('post.registration');

// 게시판 관련 + 로그인이 되었는지 체크(콜론 옆에 붙이거나 세미콜론 옆에 붙일 수 있다)
Route::middleware('auth')->resource('/boards', BoardController::class)->except(['update', 'edit']);
