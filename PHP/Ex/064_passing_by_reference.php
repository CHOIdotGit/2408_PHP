<?php

// 말 그대로 참조-전달이다.
// 예시를 보면
// 값 복사 (value of copy)
$num1 = 100;
$num2 = $num1;

$num2 -= 50;
echo $num1.", ".$num2."\n"; // num1 = 100, num2 = 50


// &를 붙여 변동된 $num2의 값을 $num1에도 참조하여 전달한다면
// 참조-전달(passing by reference)
$num3 = 100;
$num4 = &$num3;

$num4 -= 50;
echo $num3.", ".$num4; // num3 = 50, num4 = 50
echo "\n";

function my_test(&$num) {
    $num--;
}

$num5 = 5;
my_test($num5);
echo $num5;
echo "\n";


// 스코프 : 변수나 함수의 유효 범위
// 변수나 함수가 어디에 선언되었는지에 따라 접근 가능 여부가 달라진다.
// 크게 전역, 지역, 정적 3가지의 스코프로 구분한다.

// 전역 스코프 : 스크립트 내 어디서든 접근 가능한 스코프
$str = "전역 스코프";

function my_scope1() {
    global $str; // 전역 스코프 사용을 위해 선언함
    echo $str;
}
my_scope1();
echo "\n";
// 함수의 영역은 전역이 아니라 지역이다. 따라서 접근할 수 없다.
// global을 사용하면 전역으로 적용할 수 있다.

// 지역 스코프 : 함수 등 특정 블록 내에서만 유효한 스코프
// 함수가 종료되면 함수내 변수들도 같이 사라진다.
function my_scope2() {
    $str2 = "my_scope2 영역";
    echo $str2;
}
my_scope2();
echo "\n";
// 지역을 나누는 기준은 보통 중괄호"{}"이다.
// function, class, class-mathod 이 외의 외부에서는 함부로 사용할 수 없다.

// 정적 스코프 - Laravel