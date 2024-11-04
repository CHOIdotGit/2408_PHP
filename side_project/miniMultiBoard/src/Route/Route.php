<?php

namespace Route;

use Controllers\UserController;

// 라우터(트) : 유저의 요청을 분석해서 해당 controller로 연결해주는 클래스
class Route {
    // 생성자
    public function __construct() {
        $url = $_GET['url']; // 요청 경로 획득
        $httpMethod = $_SERVER['REQUEST_METHOD']; // HTTP 메소드 획득

        // 요청 경로를 체크
        if($url === 'login') {
            if($httpMethod === 'GET') {
                new Usercontroller('goLogin');
            } else if($httpMethod === 'POST') {

            }
        }
    }
}