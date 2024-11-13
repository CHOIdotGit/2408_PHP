<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // 로그인 페이지로 이동
    public function goLogin() {
        return view('login');
    }

    // 로그인 처리
    public function login(Request $request) {
        Log::debug('리퀘스트 데이터', $request->only('u_email', 'u_password'));
        // 유효성 체크, 회원 정보 체크(exists)
        $validator = Validator::make(
            $request->only('u_email', 'u_password')
            ,[
                'u_email' => ['required', 'exists:users,u_email', 'regex:/^[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}@[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}\.[a-zA-Z]{2,3}$/']
                ,'u_password' => ['required', 'between:8,20', 'regex:/^[a-zA-Z0-9!@]+$/']
            ]
        );

        if($validator->fails()) {
            return redirect()
                    ->route('goLogin')
                    ->withErrors($validator->errors());
        }

        // 회원 정보 획득, first : 하나의 레코드를 가져오는 것
        $userInfo = User::where('u_email', '=', $request->u_email)->first();

        // 비밀번호 체크
        if(!(Hash::check($request->u_password, $userInfo->u_password))) {
            return redirect()->route('goLogin')->withErrors('비밀번호가 일치하지 않습니다.');
        }

        // 유저 인증 처리
        Auth::login($userInfo); //세션에 저장되어 자동으로 관리된다

        // var_dump(Auth::id()); // 로그인한 유저의 pk 획득할 수 있다
        // var_dump(Auth::user()); // 로그인한 유저의 정보를 획득할 수 있다
        // var_dump(Auth::check()); // 로그인 여부를 체크해준다(true, false)
        return redirect()->route('boards.index');
        
    }

    // 로그아웃
    public function logout() {
        Auth::logout(); // 로그아웃 처리

        Session::invalidate(); // 기존 세션의 모든 데이터 제거 및 새로운 세션 ID 발급
        Session::regenerateToken(); // CSRF 토큰 재발급하는 처리

        return redirect()->route('goLogin');
    }
}
