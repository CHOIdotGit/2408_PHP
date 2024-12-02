<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', function(Request $request) {
    // 이메일과 비밀번호 가져오기
    $credentials = $request->only('email', 'password');

    // 이메일을 기준으로 사용자 검색
    $userInfo = User::where('email', $credentials['email'])->first();

    if($userInfo && Hash::check($credentials['password'], $userInfo->password)) {
        $token = $userInfo->createToken('YourAppName')->plainTextToken;
    }
});
