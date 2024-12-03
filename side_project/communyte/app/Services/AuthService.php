<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class AuthService.
 */
class AuthService {
    /**
     * 로그인 처리
     * 
     * @param string $email
     * @param string $password
     * 
     * @return array|null
     */
    public function signUp($account, $password) {
        $user = User::where('account', $account)->first();

        if($user && Hash::check($password, $user->password)) {
            // JWT
            $accessToken = JWTAuth::fromUser($user);
        }
    }
}
