<?php

namespace Controllers;

use Models\BoardsCategory;

class Controller {
    protected $arrErrorMsg = []; // 화면에 표시할 에러 메세지 리스트(포르퍼티)
    protected $arrBoardNameInfo = []; // 헤더 게시판드롭다운 리스트

    // 생성자
    public function __construct(string $action) {
            // 세션 시작
            // 세션 확인
            if(session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // 유저 로그인 및 권한 체크


            // 헤더 드롭다운 리스트 획득
            $boardsCategoryModel = new BoardsCategory();
            $this->arrBoardNameInfo = $boardsCategoryModel->getBoardNameList();

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