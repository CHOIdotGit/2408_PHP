<?php
// 구구단
// **** 2단 ****
// 2 X 1 = 2
// ....

// $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// foreach($arr as $key => $val) {
//     echo "****".$arr."단"."****"."\n";
//     echo $arr." X ".$key." = ".($key * $val);
// }


// for($dan = 2; $dan <= 9; $dan++) {
//     echo "****".$dan."단"."****"."\n";
//     for($dan1 = 1; $dan1 <= 9; $dan1++) {
//         echo $dan." X ".$dan1." = ".($dan * $dan1)."\n";
//     }
// }


// $arr = range(2,9);
// $arr1 = range(1,9);
// $asd = [];
// foreach($arr as $key => $item) {
//     $asd[] = "\n"."**** ".$item."단"." ****"."\n";
//     foreach($arr1 as $key => $item1) {
//         $asd[] = $item." X ".$item1." = ".($item * $item1)."\n";
//     }
// }
// echo implode($asd);


// 선생님 로직
// $dan = 9;

// for($i = 2; $i <= $dan; $i++) {
//     echo "**** ".$dan."단 ****"."\n";
//     for($z = 1; $z <= $dan; $z++) {
//         echo $i." X ".$z." = ".($i * $z)."\n";
//     }
// }

// -----------------------------------------------------------
// function : 코드 중복을 제거(?)
// 코드를 여러 번 사용하지 않고 한 번만 사용하여 유지보수를 하는 것
//  = 모듈화

// function이 무엇인가?, 왜 사용하는가?

// 두 수를 더해서 반환하는 함수
// function sum($i, $j){
//     echo $i + $j."\n";
// }
// sum(10, 17);

// // 선생님 로직
// function my_sum($num1, $num2) {
//     return $num1 + $num2;
// }
// echo my_sum(1, 2)."\n";

// 제약 설정(int = 숫자만 설정 가능) 다만, type int는 완벽하지 않음
// 실수(숫자)로 지정할 경우 float도 사용할 수 있다. 
// function sum1(int $i, int $j){ // << 타입 힌트
//     echo $i + $j."\n";
// }
// sum1(10, "ㅇㅅㅇ");

// // return에 제약 설정(return type)
// function my_sum1(int $num1, int $num2): int {
//     return $num1 + $num2;
// }
// echo my_sum1(1, 2)."\n";

// time();

// // 파라미터에 디폴트 값 세팅
// function my_sum2(int $num1, int $num2 = 10): int {
//     return $num1 + $num2;
// }
// echo my_sum2(1)."\n";

// -----------------------------------------------------------------
// 예외처리 - try-catch문
// 에러가 발생하면 해당 처리에서 멈춰버리니까
// 그 에러를 예외처리한다.
// try {
//     // 처리하고자 하는 로직
//     // 5 / 0;
// } catch(Throwable $th) { // 7버전 이전에서는 Exception $e 사용함
//     // 예외 발생 시 할 처리
//     echo $th->getMessage();
// } finally { // 예외가 발생하든 발생하지 않든 무조건 실행한다.
//     // = 예외 발생 여부와 상관없이 항상 실행 할 처리
//     echo " 파이널리";
// }
// echo " 처리 끝";

// try {
//     echo "바깥쪽 try\n";
//     // 5 / 0;
//     try {
//         5 / 0;
//         echo "안쪽 try\n";
//     } catch(Throwable $th) {
//         echo "안쪽 catch\n";
//         // 5 / 0; << 이런짓은 하지 않는 편이 좋다.
//         // catch문 안에서는 예외사항이 발생하면 안된다.
//     }
// } catch(Throwable $th) {

//     echo "바깥쪽 catch\n";
// }

// --------------------------------------------------------------
// 강제 예외 발생
try {
    throw new exception("강제 예외 발생");
    echo "try";
} catch(Throwable $th) { // Throwable << 얘는 인터페이스
    echo $th->getMessage();
}