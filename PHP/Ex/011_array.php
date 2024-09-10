<?php

// 배열(Array) : 하나의 변수에 여러 개의 값을 담을 수 있는 데이터 타입

// 배열 선언 / 순서대로 0번, 1번, 2번, 3번 방(key)이다.
$arr = [4, 3, 6, 1];

// 배열에서 특정 요소 접근
echo $arr[0]."\n"; // 4를 가져 온다.
echo $arr[1]."\n"; // 3을 가져 온다.

// array에서 6의 값을 100으로 바꾸기
$arr[2] = 100;
echo $arr[2]."\n";

$arr[0] = "안녕하세요.";
var_dump($arr);

// 연관 배열 : 방 번호(key)를 지정할 수 있음
// 사용자가 할당한 키를 사용하는 배열. 이 형태가 가장 많이 쓰인다.
$arr2 = [
    "key1" => 5000
    ,"key2" => "안녕하세요."
];
echo $arr2["key2"];

$arr2["key3"] = "미어캣";
var_dump($arr2);

$result = [
    "id" => 1
    ,"name" => "미어캣"
    ,"age" => 20
];

// 다차원 배열 : 요소로 하나 이상의 배여을 포함하는 배열
$arr3 = [
    [1, 2, 3]
    ,[4, 5, 6]
    ,[7, 8, 9]
];

echo $arr3[0][1]."\n";

// 다차원 배열의 예
$result2 = [
    [
        "id" => 10001
        ,"name" => "홍길동"
    ]
    ,[
        "id" => 10002
        ,"name" => "갑순이"
    ]
    ,[
        "id" => 10003
        ,"name" => "갑돌이"
    ]
];

echo $result2[2]["name"]."\n";

// 배열에서 자주 사용하는 함수

// count() : 배열의 길이(size)를 반환하는 함수 
// = 대괄호 안에 있는 요소의 개수
$arr4 = [5, 6, 7, 8, 9, 4, 3, 2];
echo count($arr4)."\n";

// unset() : 해당 키의 요소를 삭제한다.
unset($arr4[0]);
var_dump($arr4);
// 재정렬
// var_dump(array_values($arr4));

// 배열의 정렬 함수
// 값을 기준으로 오름차순 정렬
asort($arr4);
var_dump($arr4);

// 값을 기준으로 내림차순 정렬
arsort($arr4);
var_dump($arr4);

$arr5 = [
    "d" => "1"
    ,"a" => "2"
    ,"c" => "3"
    ,"b" => "4"
];

// key 기준으로 오름차순 정렬
ksort($arr5);
var_dump($arr5);

// key 기준으로 내림차순 정렬
krsort($arr5);
var_dump($arr5);