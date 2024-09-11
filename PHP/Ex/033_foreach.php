<?php
// foreach문 : 배열을 편하게 루프하기 위한 반복문

$arr = [1, 2, 3];
foreach($arr as $key => $val) {
    echo "key : ".$key.", value : ".$val."\n";
}

// 아래 arr2를 이용해서 구구단 2단을 출력
$arr2 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
foreach($arr2 as $key => $val) {
    echo ($key = 2)."X".$val."=".($key * $val)."\n";
}

// 선생님 코드
$arr2 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
foreach($arr2 as $val) {
    echo "2 X ".$val." = ".($val * 2)."\n";
}

// 연관배열의 경우 : 키 값을 정해줄 수 있음
$arr3 = [
    "name" => "cat"
    ,"age" => 5
    ,"gender" => "M"
];

foreach($arr3 as $key => $val) {
    echo $key." : ".$val."\n";
}
// 1. key에는 name, val에는 cat이 들어감
// 2. age / 5가 각각 들어간다.
// 3. gender / M이 각각 들어간다.