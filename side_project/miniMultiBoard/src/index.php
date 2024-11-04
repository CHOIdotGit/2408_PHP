<?php

// './' 생략가능(해당 파일과 같은 위치에 있을 경우)
require_once('./config.php'); // 설정 파일 불러오기
require_once('./autoload.php'); // 오토 로드 파일 불러오기

new Route\Route(); // 라우터 호출

// php 종료
// exit;