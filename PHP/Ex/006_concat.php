<?php

// 연결 연산자(Concatenation Operator)
$str1 = "안녕, ";
$str2 = "PHP!!";
$concat1 = $str1.$str2." hihihihihihihihi\n";

echo $concat1;


// 연결 연산자를 이용해 "안녕하세요~" 출력
$str3 = "\"안녕";
$str4 = "하세요";
$concat2 = $str3.$str4."~\"";
echo $concat2;
// echo에서 바로 연결 할 수 있다.
// echo $str3.$str4."~";
// \" : 문자열 안에 쌍 따옴표를 넣을 때 사용