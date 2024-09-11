<?php

// switch문 : 조건에 따라 서로 다른 처리를 하는 문법
// 조건이 참이면 해당 처리를 진행하고 거짓이면 다음 조건을 체크한다.
// 각 조건의 처리 마지막에 break를 해야 다음 조건의 처리를 진행하지 않는다.
// if문 처럼 조건을 주어 분기처리도 가능하지만 주로 검증하고자 하는 대상이
// 특정 값과 일치하는지 체크할 때 많이 사용한다.

// switch(검증 대상) {
//     case 일치 검증 값 또는 조건1:
//         // 실행할 처리
//         break;
//     case 일치 검증 값 또는 조건2:
//         // 실행할 처리
//         break;
//     // 상위 case문에서 일치 검증 값이 없을 경우 실행
//     default:
//     // 실행할 처리
//     break;
// }

$food = "떡볶이";
switch($food) {
    case "김밥":
        echo "한식";
        break;
    case "마파두부":
        echo "중식";
        break;
    default:
        echo "기타";
        break;
}

// 실습
// switch를 이용하여 작성
// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그 외는 노력상
// 을 출력해 주세요.

$rank = " ";
switch($rank) {
    case "1등":
        echo "금상";
        break;
    case "2등":
        echo "은상";
        break;
    case "3등":
        echo "동상";
        break;
    case "4등":
        echo "장려상";
        break;
    default:
        echo "노력상";
        break;
}