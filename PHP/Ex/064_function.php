<?php

// 두 수를 전달해주면 합을 반환하는 함수
// function my_sum() {

// }
// 위가 함수의 기본 형태
// $num1,2는 파라미터(매개변수, 인자)
// 함수 정의
// 보통 함수 위에 코멘트를 남겨 둠

/**
 * 두 수를 더해서 반환
 * @param int $num1 : 숫자
 */
function my_sum($num1, $num2) {
    return $num1 + $num2;
}
// 'return'이 없는 함수도 있지만 대부분의 함수는 'return'이 있다.

my_sum(3, 5); // << 함수 호출한 상태
// 숫자는 인수, argument
echo "\n";

// 두 수를 받아서 +, -, *, /, %의 결과를 리턴하는 함수를 만들어 주세요.
function plus($a, $b) {
    return $a + $b;
}
echo plus(5, 4);
echo "\n";

function qorl($a, $b) {
    return $a - $b;
}
echo qorl(5, 4);
echo "\n";

function rhqgkrl($a, $b) {
    return $a * $b;
}
echo rhqgkrl(5, 4);
echo "\n";

function sksnrl($a, $b) {
    return $a / $b;
}
echo sksnrl(5, 4);
echo "\n";

function skajwl($a, $b) {
    return $a % $b;
}
echo skajwl(11, 4);
echo "\n";

// 가변 길이 Argument - 인수
// 전달되는 모든 숫자를 더해서 반환하는 함수를 만든다.
// **주의 사항 : "..."은 php 5.6 이상만 사용 가능 
function my_sum_all(...$numbers) {
    // $sum = 0;
    
    // foreach($numbers as $val) {
    //     $sum += $val;
    // }
    // return $sum;

    return array_sum($numbers);
}
// ...$numbers << 데이터 타입이 array

echo my_sum_all(4, 5, 6, 7, 8, 9, 3, 2, 1);

// 5.5버전 이하일 때 가변 길이 argument 사용법
// function my_sum_all1() {
//     $numbers1 = func_get_args();
// return array_sum($numbers); << 이거 사용해도 됨
//     $sum = 0;
    
//     foreach($numbers1 as $val) {
//         $sum += $val;
//     }
//     return $sum;
// }

// echo my_sum_all1(4, 5, 6, 7, 8, 9, 3, 2, 1);

// 일반 파라미터와 가변 파라미터를 같이 쓸 경우
function test($param_str, ...$arr_str) {
    $str = "";
    foreach($arr_str as $val) {
        $str .= $val;
    }
    $str .= $param_str;
    echo $str;
}
test("젤뒤", "a", "B", "c");