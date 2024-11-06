<?php

namespace Lib;

class Auth {
    public static function chkAuthorization() {
        // 비로그인 시 접속 불가능한 리스트
        $arrNeedAuth = [
            'boards'
            ,'boards/detail'
            ,'logout'
            ,'boards/insert'
        ];

        // 접근 권한과 관련된 단어 : chkAuthorization
        $url = $_GET['url']; // 접속 url 획득

        // 접속 권한이 없는 페이지 접속 차단(로그인 페이지로 이동)
        if(!isset($_SESSION['u_email']) && in_array($url, $arrNeedAuth)) {
            header('Location: /login');
            exit;
        }

        // 로그인한 상태에서 로그인 페이지 접속 시 자유게시판(/boards)으로 이동
        if(isset($_SESSION['u_email']) && !in_array($url, $arrNeedAuth)) {
            header('Location: /boards');
            exit;
        }
    }
}