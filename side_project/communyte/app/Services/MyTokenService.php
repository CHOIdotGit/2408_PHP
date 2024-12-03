<?php

namespace App\Services;

use App\Models\User;

/**
 * Class MyTokenService.
 */
class MyTokenService
{
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

    /**
     * 토큰 생성 메서드
     * 
     * @param User $user
     * @param int $expiry
     * @param bool $isAccessToken
     * @return string
     */
    private function createToken(User $user, int $expiry, bool $isAccessToken = true): string
    {
        $payload = [
            'user_id' => $user->id,
            'email' => $user->email,
            'type' => $isAccessToken ? 'access' : 'refresh',
            'exp' => time() + $expiry,
        ];

        return $this->generateJwt($payload);
    }

    /**
     * JWT 생성 메서드
     * 
     * @param array $payload
     * @return string
     */
    private function generateJwt(array $payload): string
    {
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT',
        ];

        $key = env('JWT_SECRET', 'your-secret-key');

        $base64UrlHeader = base64_encode(json_encode($header));
        $base64UrlPayload = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $key, true);
        $base64UrlSignature = base64_encode($signature);

        return $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;
    }
}
