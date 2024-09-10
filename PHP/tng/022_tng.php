<?php
// IF로 만들기
// 성적
// 범위 : 
//       100   : A+
//      90이상 100미만 : A
//      80이상 90미만 : B
//      70이상 80미만 : C
//      60이상 70미만 : D
//      60미만: F

// 출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"

$num1 = 80;
$rank = "";

if($num1 === 100) {
    $rank = "A+";
} else if ($num1 >= 90) {
    $rank = "A";
} else if ($num1 >= 80) {
    $rank = "B";
}
  else if ($num1 >= 70) {
    $rank = "C";
}
  else if ($num1 >= 60) {
    $rank = "D";
}
  else if ($num1 < 60) {
    $rank = "F";
}
echo "당신의 점수는 ".$num1."점  입니다. <".$rank.">\n";
// rank와 score를 이용해 점수와 등급을 따로 나눈다면 좀 더 편해질 수 있다.
// "당신의 점수는 70~79점 입니다. <C>\n" ->> ".$num1." 로 치환해서 사용할 수 있다.
// ($num1 >= 90 && $num1 < 100) <<- 이것을
// ($num1 >= 90) 이렇게만 적용해도 괜찮다.

// 점수가 0점~100점 조건을 넣을 때
// if($num1 >= 0 && $num1 <= 100) {
//     if($num1 === 100) {
//         $rank = "A+";
//     } else if ($num1 >= 90) {
//         $rank = "A";
//     } else if ($num1 >= 80) {
//         $rank = "B";
//     }
//       else if ($num1 >= 70) {
//         $rank = "C";
//     }
//       else if ($num1 >= 60) {
//         $rank = "D";
//     }
//       else if ($num1 < 60) {
//         $rank = "F";
//     }
//     echo "당신의 점수는 ".$num1."점  입니다. <".$rank.">\n";
// }


$num1 = 80;

if($num1 === 100) {
  echo "당신의 점수는 100점 입니다. <A+>\n";
} else if ($num1 >= 90 && $num1 < 100) {
  echo "당신의 점수는 90~99점  입니다. <A>\n";
} else if ($num1 >= 80 && $num1 < 90) {
  echo "당신의 점수는 80~89점  입니다. <B>\n";
}
else if ($num1 >= 70 && $num1 < 80) {
  echo "당신의 점수는 70~79점  입니다. <C>\n";
}
else if ($num1 >= 60 && $num1 < 70) {
  echo "당신의 점수는 60~69점  입니다. <D>\n";
}
else if ($num1 < 60) {
  echo "당신의 점수는 60점 미만 입니다. <F>\n";
}
