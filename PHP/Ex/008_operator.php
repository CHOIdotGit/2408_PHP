<?php

// 대입 연산자
$num = 1;
// "=" << 대입 연산자

// 산술 연산자 : 사칙연산과 나머지 구하는 기능을 하는 연산자
$num1 = 10;
$num2 = 5;

// 더하기
echo $num1 + $num2."\n";

// 빼기
echo $num1 - $num2."\n";

// 곱하기
echo $num1 * $num2."\n";

// 나누기
echo $num1 / $num2."\n";

// 나머지 구하는 방법
echo $num1 % $num2."\n";

$mul = 4 * 4 + 1 - (5 + 2);
echo $mul;

// 산술 대입 연산자
$tmp1 = 0;

// $tmp1 = $tmp1 +5;
echo "\n";

// 더하기
$tmp1 += 5; // 산술 대입 연산자 사용
echo $tmp1."\n";

// 빼기
$tmp1 -= 5;
echo $tmp1."\n";

// 곱하기
$tmp1 *= 5;

// 나누기
$tmp1 /= 5;

// 나머지
$tmp1 %= 5;

$str1 = "안녕";
$str1 .= "하세요";
echo $str1."\n";

// 실습 - 산술 대입 연산자를 이용해서 
$tng_num = 100;
echo $tng_num."\n";

// $tng_num에 10을 더하기
$tng_num += 10;
echo $tng_num."\n";

// $tng_num에 5로 나누기
$tng_num /= 5;
echo $tng_num."\n";

// $tng_num에 4를 빼기
$tng_num -= 4;
echo $tng_num."\n";

// $tng_num를 7로 나눈 나머지 구하기
$tng_num %= 7;
echo $tng_num."\n";

// $tng_num에 3을 곱하기
$tng_num *= 3;
echo $tng_num."\n";


// 증감 연산자 : 1을 더하거나 빼는 연산자

// 후위 증감 연산자 / 87번 연산이 끝나기 전까지 값이 1이다.
$num = 0;
$num++;
echo $num."\n";
$num--;
echo $num."\n";
echo $num++."\n"; // << 현재 이 상태에서는 증감하지 않고 다음 출력에서 증감된다.

// 전위 증감 연산자
$num = 0;
++$num;
echo $num."\n";
--$num;
echo $num."\n";
echo ++$num."\n"; // << 현재 이 상태에서 계산이 되어있음
echo $num."\n";

// 비교 연산자
// 두 값을 비교하는 연산자
// true 또는 false를 반환한다. 
var_dump(1 > 0);
var_dump(1 < 0);
var_dump(1 >= 0);
var_dump(1 <= 0);


$num = 1;
$str = "1";
// 변수1 == 변수2 : 변수1과 변수2가 같다. 불완전 비교(데이터 타입 체크 x)
var_dump($num == $str); // 값만 확인

// 변수1 === 변수2 : 변수1과 변수2가 같다. 완전 비교(데이터 타입 체크 o)
var_dump($num === $str); // 값과 데이터 타입을 확인한다.

// 변수1 != 변수2 : 변수1과 변수2가 같지 않다. 불완전 비교(데이터 타입 체크 x)
var_dump($num != $str); // 값만 확인

// 변수1 !== 변수2 : 변수1과 변수2가 같지 않다. 완전 비교(데이터 타입 체크 o)
var_dump($num !== $str); // 값과 데이터 타입을 확인


// 논리 연산자 : 값이 boolean 타입만 가지는 집합에서 사용하는 연산
// &&(and) 연산자 
var_dump(1 === 1 && 2 === 1);

// ||(or) 연산자 
var_dump(1 === 1 || 2 === 1);

// !(not) 연산자
var_dump(!(1 === 1));

// 삼항 연산자 : 조건식의 결과에 따라 다른 결과를 반환한다.
$result = 1 === 1 ? "참 입니다." : "거짓 입니다.";
echo $result;
var_dump($result);