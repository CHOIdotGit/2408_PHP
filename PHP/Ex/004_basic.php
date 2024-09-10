<?php

// \n = 개행(엔터)
// 변수 (variable)
$dan = 2;

echo "$dan X 1 = 2\n";
echo "$dan X 2 = 4\n";
echo "$dan X 3 = 6\n";
echo "$dan X 4 = 8\n";
echo "$dan X 5 = 10\n";

// 변수 선언
$num;

// 변수 초기화
$num = 1;

// 변수 선언 및 초기화
$str = "가나다";

// 네이밍 기법
// 스네이크 기법 : 단어와 단어 사이에 언더바를 넣는다.
$user_name;

// 카멜 기법 : 단어와 단어 사이에 대문자를 넣는다. / 객체지향
$userName;

// 상수(Constants)
// 절대 변하지 않는 값 
// 상수 이름은 전부 다 대문자로 작성 - 관습, 변수와 구분하기 위함
define("AGE", 20);
echo AGE;
// 같은 상수 이름을 후에 사용한다면 이미 선언된 상수이므로 
// warning 처리가 일어나고 값이 바뀌지 않는다.

$name = "고양이";
echo $name;
$name = "러시안블루";
echo $name;

// underscore 표기법 - 은행권에서 사용, 콤마 대신 언더바를 사용
$num = 10_000_000;
echo $num;

// 아래와 같이 변수 값을 담아서 출력
// 점심메뉴
// 탕수육 8,000
// 짜장면 6,000
// 짬뽕 6,000
$menu = "\n점심메뉴\n";
$subuta = "탕수육 8000\n";
$jajang = "짜장면 6000\n";
$champon = "짬뽕 6000\n";

echo $menu, $subuta, $jajang, $champon;


// 두 변수의 스왑(Swap) / = 은 오른쪽에 있는 값을 왼쪽으로 대입시킨다.
$num1 = 200;
$num2 = 10;
$tmp;

$tmp = $num1;
$num1 = $num2;
$num2 = $tmp;
echo $num1, $num2;

// 데이터 타입
$num = 1;
var_dump($num);

// float, double : 실수(소수점) 플롯은 저장할 수 있는 소수점 단위가 더블보다 적다
$double = 3.141592;
var_dump($double);

// string : 문자 열
$str = "abc가나다";
var_dump($str);

// boolean : 논리 값
$boo = false;
var_dump($boo);

// NULL : 존재하지 않는 값
$null = NULL;
var_dump($null);
// 그럼 선언만 하고 바덤프로 불러오면 널과 동일한가?
// 동일하다. 하지만 PHP에서 선언만 하고 끝내지는 않고
// 보통은 NULL값을 넣어준다.

// array : 배열
$arr = [1, 2, 3];
var_dump($arr);

// object : 객체
$obj = new DateTime();
var_dump($obj);

// 형변환
$casting = (string)$num;
var_dump($casting);