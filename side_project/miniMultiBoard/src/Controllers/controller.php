<?php

namespace Controllers;

class Controller {
    // 생성자
    public function __construct(string $action) {
            // 세션 시작

            // 유저 로그인 및 권한 체크

            // 해당 Action 호출
            $resultAction = $this->$action();
            // echo $resultAction; // 호출할 파일 이름

            // view 호출
            $this->callView($resultAction);

            exit; // php 처리 종료
    }
    // 뷰 OR 로케이션 처리용 메소드
    private function callView($path) {
        if(strpos($path, 'Location:') === 0) {
            header($path);
        } else {
            require_once(_PATH_VIEW.'/'.$path);
        }
        
    }
}