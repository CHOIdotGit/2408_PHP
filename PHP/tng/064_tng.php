<?php
// 로또 번호 생성기
// 1. 1 ~ 45의 번호가 있다.
// 2. 랜덤한 번호 6개를 출력한다.
//  2-1. 단, 번호는 중복되지 않는다.

// $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45];


// foreach

// echo rand(1, 45).", ";
// echo rand(1, 45).", ";
// echo rand(1, 45).", ";
// echo rand(1, 45).", ";
// echo rand(1, 45).", ";
// echo rand(1, 45)." | ";

// $arr = [];
// $get_muber = [];
// for($i = 1; $i <=45; $i++) {
//     $arr[$i - 1] = $i;
// }

// for($i = 0; $i < 6; $i++) {
//     $random_num = random_int(0, 44);
//     $random_pick = $arr[$random_num];

//     foreach($get_muber as $val) {
//         if($val === $random_pick) {

//         }
//     }
// }

// $arr1 = range(1, 45);
// $store = [];

// $random = array_rand($arr1, 6);

// foreach($random as $val) {
//     $store[] = $arr1[$val];
// }
// echo implode(" ", $store);

$numbers = range(1, 45);
shuffle($numbers);
$lottoNumbers = array_slice($numbers, 0, 6);
sort($lottoNumbers);
echo "생성된 로또 번호: " . implode(', ', $lottoNumbers);
