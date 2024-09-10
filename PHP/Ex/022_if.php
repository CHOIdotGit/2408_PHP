<?php

// if문 : 특정 조건에 따라 서로 다른 처리를 할 때 사용하는 문법

$num = 7;
if($num === 10) {
    echo "10입니다!\n";
} else if($num === 5) {
    echo "5입니다!\n";
} else if($num === 7) {
    echo "럭키!\n";
} else {
    echo "숫자입니다.\n";
}
// 중괄호로 감싼다면 세미콜론은 사용하지 않는다?

// 1이면 1등, 2라면 2등, 3이면 3등 나머지는 순위 외, 5번만 특별상을 출력
$num1 = 4;
if($num1 === 1) {
    echo "1등!!!\n";
} else if($num1 === 2) {
    echo "2등!!\n";
} else if($num1 === 3) {
    echo "3등!\n";
} else if($num1 === 4 || $num1 === 5) {
    echo "특별상!\n";
} else {
    echo "순위 외\n";
}

// 1번 문제의 정답은 2, 2번 문제의 정답은 5
// 1번 문제와 2번 문제 모두 정답이면 100점
// 둘 중 하나만 정답이면 50점
// 모두 오답이면 0점을 출력
$answer1 = 2;
$answer2 = 5;

if($answer1 === 2 && $answer2 === 5) {
    echo "100점!\n";
} else if ($answer1 === 2 || $answer2 === 5){
    echo "50점...\n";
} else {
    echo "0점\n";
}