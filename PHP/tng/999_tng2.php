<?php

// $stdin = fopen("php://stdin", "r");
// $input = fread($stdin, 1024);
// fclose($stdin);

// fscanf(STDIN, "%d\n", $input);
// echo $input * 10;

// 가위 바위 보 게임
// 게임 실행 시, "가위", "바위", "보" 중 하나를 입력
// 컴퓨터는 랜덤으로 "가위", "바위", "보" 중 하나를 출력
// 결과를 출력
//      유저 : 가위
//      컴퓨터 : 바위
//      졌습니다. 또는 이겼습니다. 또는 비겼습니다.


fscanf(STDIN, "%s\n", $input);
// $arr = [
//     "scissors" 
//     ,"rock" 
//     ,"paper" 
// ];
   
// $comuter;
$randNum = rand(1, 3);
// $userNum = 0;

switch($randNum) {
    case 1:
        $c = "scissors";
        break;
    case 2:
        $c = "rock";
        break;
    case 3;
        $c = "paper";
        break;
}

echo "유저 : ".$input."\n";
echo "컴퓨터 : ".$c."\n";
if($input == $c) {
    echo "비겼습니다.\n";
} else if(($input == "scissors" && $c == "paper")||($input == "rock" && $c == "scissors")||($input == "paper" && $c == "rock")) {
    echo "이겼습니다.\n";
} else {
    echo "졌습니다.\n";
}