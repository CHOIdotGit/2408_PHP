<?php

namespace App\Utils;

use MyEncrypt;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDOException;

class MyToken {
    /**
     * 엑세스 토큰과 리프래시 토큰 생성
     * 
     * @param App\Models\User $user
     * @return Array [$accessToken, $refreshToken]
     */

    public function createTokens(User $user) {
        $accessToken = $this->createToken($user, env('TOKEN_EXP_ACCESS'));
        $refreshToken = $this->createToken($user, env('TOKEN_EXP_REFRESH'), false);

        return [$accessToken, $refreshToken];
    }

    // public
    /**
     * 리프레시 토큰 업데이트
     * 
     * @param App\Models\User $userInfo 유저 정보
     * @param string $refreshToken 리프레시 토큰
     * 
     * @return bool true
     */
    public function updateRefreshToken(User $userInfo, string $refreshToken) {
        // 유저 모델에 리프래시 토큰 변경
        $userInfo->refresh_token = $refreshToken;

        DB::beginTransaction();

        if(!($userInfo->save())) {
            DB::rollBack();
            throw new PDOException('Error UpdateRefreshToken');
        }

        DB::commit();

        return true;
    }


    // private

    /**
     * JWT 생성 메소드
     * 
     * @param App\Models\User $user
     * @param int $ttl
     * @param bool $accessFlg = true
     * 
     * @return string JWT
     */

    private function createToken(User $user, int $ttl, bool $accessFlg =true) {
        $header = $this->createHeader();
        $payload = $this->createPayload($user, $ttl, $accessFlg);
        $signature = $this->createSignature($header, $payload);

        return $header . '.' . $payload . '.' . $signature;
    }

    /**
     * JWT Header 생성
     * 
     * @return string base64Ur;Encoded
     */
    private function createHeader() {
        $header= [
            'alg' => env('TOKEN_ALG')
            ,'typ' => env('TOKEN_TYPE')
        ];

        return MyEncrypt::base64UrlEncode(json_encode($header));
    }

    /**
     * JWT payload 작성
     * 
     * @param App\Models\User $user
     * @param int $ttl
     * @param bool $accessFlg = true
     * 
     * @return string base64Payload
     */
    private function createPayload(User $user, int $ttl, bool $accessFlg = true) {
        $now = time(); // 현재 시간 습득

        // 페이로드 기본 데이터 생성
        $payload = [
            'idt' => $user->user_id
            ,'iat' => $now // 발급 시간
            ,'exp' => $now + $ttl
            ,'ttl' => $ttl
        ];

        // 엑세스 토큰일 경우 아래 데이터 추가
        if($accessFlg) {
            $payload['acc'] = $user->account;
        }

        return MyEncrypt::base64UrlEncode(json_encode($payload));
    }

    /**
     * JWT 시그니처 작성
     * 
     * @param string $header base64URL Encode
     * @param string $payload base64URL Encode
     * 
     * @return string base64Signature
     */
    private function createSignature(string $header, string $payload) {
        return MyEncrypt::hashWithSalt(
            env('TOKEN_ALG')
            , $header.env('TOKEN_SECRET_KEY').$payload
            , MyEncrypt::makeSalt(env('TOKEN_SALT_LENGTH'))
        );
    }
}