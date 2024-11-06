<?php

namespace Controllers;

use Controllers\Controller;
use Lib\UserValidator;
use Models\User;

class UserController extends Controller{
    protected $userInfo = [
        'u_email' => ''
        ,'u_name' => ''
    ];
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
            return 'login.php'; // 단순 뷰 파일 불러오는 용도
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

    // 로그아웃 처리
    public function logout() {
        unset($_SESSION['u_email']); // 유저 이메일 제거
        session_destroy(); // 세션 파기
        
        return 'Location: /login'; // 화면전환을 해야할 때 사용
    }

    // 회원가입 페이지 이동
    public function goRegist() {
        return 'regist.php'; // 단순 뷰 파일 불러오는 용도
    }

    // 회원가입 처리
    public function regist() {
        $requestData = [
            // 유효성 검사가 필요함 - isset
            'u_email' => isset($_POST['u_email']) ? $_POST['u_email'] : ''
            ,'u_password' => isset($_POST['u_password']) ? $_POST['u_password'] : ''
            ,'u_password_chk' => isset($_POST['u_password_chk']) ? $_POST['u_password_chk'] : ''
            ,'u_name' => isset($_POST['u_name']) ? $_POST['u_name'] : ''
        ];

        $this->userInfo = [
            'u_email' => $requestData['u_email']
            ,'u_name' => $requestData['u_name']
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            
            return 'regist.php'; // 단순 뷰 파일 불러오는 용도
        }

        // 이메일 중복 체크
        $userModel = new User();
        $prepare = [
            'u_email' => $requestData['u_email']
        ];
        $resultUserInfo = $userModel->getUserInfo($prepare);
        if($resultUserInfo) {
            $this->arrErrorMsg[] = '이미 가입된 이메일입니다.';
            return 'regist.php';
        }

        // 회원 정보 인서트
        $userModel->beginTransaction();
        $prepare = [
            'u_email' => $requestData['u_email']
            ,'u_password' => password_hash($requestData['u_password'], PASSWORD_DEFAULT)
            ,'u_name' => $requestData['u_name']
        ];
        $resultRegistUserInfo = $userModel->registUserInfo($prepare);
        if($resultRegistUserInfo !== 1) {
            $userModel->rollBack();
            $this->arrErrorMsg[] = '회원가입에 실패했습니다.';
            return 'regist.php';
        }

        $userModel->commit();

        return 'Location: /login';
    }
}