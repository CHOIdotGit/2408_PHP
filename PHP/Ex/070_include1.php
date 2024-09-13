<?php

// 다른 파일의 소스 코드를 사용하기 위해 불러오는 방법

// include - 해당 파일의 소스 코드 전체를 불러온다.
// -> 중복 작성할 경우 여러번 불러온다.
// echo "include 1111\n";
// include_once("./070_include2.php");
// include_once("./070_include2.php");
// include("./070_include2.php");

// include_once : 중복으로 파일을 불러왔을 때 방지가 가능하다.
// -> 똑같은 파일은 딱 한 번만 출력된다.

// 오류 발생 시 워닝이 출력

// 둘의 공통점 : 오류 발생 시 프로그램을 정지하지 않고 계속 진행(처리)한다.


// require : 해당 파일의 소스 코드 전체를 불러온다.
// -> 중복 작성할 경우 여러번 불러온다.

// require_once : 해당 파일의 소스 코드 전체를 불러온다
// -> 똑같은 파일은 딱 한 번만 출력된다.

// 오류 발생 시 에러가 출력

// 둘의 공통점 : 오류 발생 시 프로그램을 정지한다.

require("./070_include2.php");

require_once("./070_include2.php");

echo "include 1111\n";

// 웬만하면 require_once를 사용 권장
// 다만, 최상단에 불러오는것이 좋다