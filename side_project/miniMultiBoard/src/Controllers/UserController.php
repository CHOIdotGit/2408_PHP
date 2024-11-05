<?php

namespace Controllers;

use Controllers\Controller;
use Lib\UserValidator;
use Models\User;

class UserController extends Controller{
    public function goLogin() {
        return 'login.php';
    }

    protected function login() {
        // 유저 입력 정보 획득
        $requestData = [
            'u_email' => $_POST['u_email']
            ,'u_password' => $_POST['u_password']
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return 'login.php';
        }
        // 유저 정보 획득
        $userModel = new User();
        $prepare = [
            'u_email' => $requestData['u_email']
        ];
        $resultUserInfo = $userModel->getUserInfo($prepare);

        // var_dump($resultUserInfo);
        // var_dump(password_hash($requestData['u_password'], PASSWORD_DEFAULT)); // 비밀번호 확인
        // exit;

        // 유저 존재 유무 체크
        if(!$resultUserInfo) {
            $this->arrErrorMsg[] = '존재하지 않는 유저입니다.';
        } else if(!password_verify($requestData['u_password'], $resultUserInfo['u_password'])) {
            // 패스워드 체크
            $this->arrErrorMsg[] = '비밀번호가 일치하지 않습니다.';
        }

        // 세션에 u_id 저장
        $_SESSION['u_email'] = $resultUserInfo['u_email'];

        // 로케이션 처리
        return 'Location: /boards';

        // 쿠키에 개인을 특정할 수 있는 정보가 들어가면 안됨 / 5mb용량을 가지고 있어 쿠키의 용량이 크면 안 됨
    }
}