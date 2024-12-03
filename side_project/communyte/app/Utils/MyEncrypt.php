<?php

namespace App\Utils;

use Illuminate\Support\Str;

class MyEncrypt {
    /**
     * base64 URL 인코드
     * 
     * @param string $json
     * 
     * @return string base64 URL encode
     */
    
    public function base64UrlEncode(string $json) {
        return rtrim(strtr(base64_encode($json), '+/', '-_'), '=');
    }

    /**
     * base64 URL decode
     * 
     * @param string $base64 base64 URL encode
     * 
     * @return string $json
     */
    public function base64UrlDecode(string $base64) {
        return base64_decode(strtr($base64, '-_', '+/'));
    }

    /**
     * Salt(특정 길이의 랜덤한 문자열) 생성
     * 
     * @param int $saltLength
     * 
     * @return string 랜덤 문자열
     */
    public function makeSalt($saltLength) {
        return Str::random($saltLength);
    }

    /**
     * 문자열 암호화 처리 메소드
     * 
     * @param   string $alg 알고리즘명(타입)
     * @param   string $str 암호화 할 문자열
     * @param   string $salt salt
     * 
     * @return  string 암호화 된 문자열 반환
     */
    public function hashWithSalt(string $alg, string $str, string $salt) {
        return hash($alg, $str).$salt;
    }

    /**
     * 특정 길이의 salt를 제거한 문자열을 반환
     * 
     * @param string $signature salt 포함된 signature
     * @param int $saltLength salt 길이
     * 
     * @return string salt가 제거된 문자열
     */
    public function subSalt(string $signature, int $saltLength ) {
        return mb_substr($signature, 0, (-1 * $saltLength));
    }
}