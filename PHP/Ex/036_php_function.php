<?php

// PHP 내장 함수

// trim(문자열) : 문자열의 (좌우) 공백을 제거해서 반환
$str = "    미어캣  "; 
echo trim($str)."\n";

// strtoupper(문자열), strtolower(문자열)
// 문자열을 대/소문자로 변환해서 반환
$str2 = "AbCdEfG";
echo strtoupper($str2);
echo strtolower($str2);
echo "\n";

// strlen는 1바이트 글자 숫자 인식. 단, 한글 인식 못함
// 똑같이 문자열의 길이를 반환하지만 멀티바이트 문자열에 대응하지 못한다.
$str3 = "고양이";
echo strlen($str3);
echo mb_strlen($str3);
// mb_strlen(문자열), multibyte를 사용하는것이 좋다.
// 문자열의 길이를 반환한다. 멀티 바이트 문자열에 대웅한다.
// 둘 다 띄워쓰기를 인식해서 문자열의 길이에 합산한다.
echo "\n";

// str_replace(치환 하려는(바꾸고싶은) 문자열, 치환될 문자열, 대상 문자열) 
// : 특정 문자를 치환해서 반환한다.
$str4 = "key: q3rlknzx9322";
echo str_replace("key: ", "", $str4);
// 위 replace에서는 "key: "를 ""와 같이 빈 공간으로 두겠다는 의미여서 
//  우리가 자르고 싶은 문자열을 첫번째 칸에 적었다.
// 만약 key에서 k를 a로 바꾸고 싶다면 "key: ", "a", $str4로 쓴다.
echo "\n";

// mb_substr(대상 문자열, 자를 개수(시작 위치), 출력할 개수) 
// : 문자열을 잘라서 반환한다. 출력할 개수는 생략 가능하다.
// 앞에서(좌측)부터 자른다.
$str5 = "PHP입니다.";
echo mb_substr($str5, 3, 4);
echo "\n";
echo mb_substr($str5, -7, 3); // 얘는 자를 위치보다는 시작 위치가 맞음
// 위는 "입니다." 가 출력되고 밑은 "PHP"가 출력된다.
echo "\n";

// mb_strpos(대상 문자열, 검색할 문자열) 
// : 검색할 문자열의 특정 위치를 반환한다.
$str6 = "점심 뭐먹지?";
echo mb_strpos($str6, "뭐먹");
echo "\n";
// 점:0번, 심:1번 ~ ?:6번
// "뭐"부터 3글자를 자르기
echo mb_substr($str6, mb_strpos($str6, "뭐"), 3); 
echo "\n";

// spintf(포맷 문자열, 대입 문자열1, 대입 문자열2...) 
// : 포맷 문자열에 대입 문자열을 순서대로 대입해서 반환하는 함수
$str_format = "당신의 점수는 %u점 입니다. <%s>"; 
// %u : 값이 양수인 숫자 / %d : 값이 음수~양수
// %f : 소수점 표시 / %.1f : 소수점 자리수 / %s : 문자열
echo sprintf($str_format, 90, "A");
echo "\n";

// isset(변수) 
// : 변수의 설정되어 있는지 여부를 확인하여 true / false를 반환한다.
$str7 = "";
$str8 = null;
var_dump(isset($str7));
var_dump(isset($str8));
var_dump(isset($no));
// 변수에 값이 null이거나 할당되어 있지 않다면 false가 나온다.
echo "\n";

// empty(변수) : 변수의 값이 비어있는지 확인해서 true / false를 반환한다.
$empty1 = "abc";
$empty2 = ""; // 문자열 안에 아무것도 없어서
$empty3 = 0; // 값을 가지지 않아서
$empty4 = [];
$empty5 = null;
var_dump(empty($empty1));
var_dump(empty($empty2));
var_dump(empty($empty3));
var_dump(empty($empty4));
var_dump(empty($empty5));
// 0은 왜 비어있는거?
echo "\n";

// is_null(변수) : 변수가 null인지 아닌지를 확인해 true / false를 반환한다.
$chk_null = null;
var_dump(is_null($chk_null));
echo "\n";

// gettype(변수) : 변수의 데이터 타입을 문자열로 반환한다.
$type1 = "abc";
$type2 = 0;
$type3 = 1.2;
$type4 = [];
$type5 = true;
$type6 = null;
$type7 = new DateTime();
echo gettype($type1)."\n";
echo gettype($type2)."\n";
echo gettype($type3)."\n";
echo gettype($type4)."\n";
echo gettype($type5)."\n";
echo gettype($type6)."\n";
echo gettype($type7)."\n";

// 타입 체크 예)
if(gettype($type2) === "integer") {
    echo "숫자";
}
echo "\n";

// settype(변수) : 변수의 데이터 타입을 변환한다.
$type8 = "1";
// var_dump((int)$type8)."\n"; / 원본은 변경하지 않고 캐스팅
settype($type8, "int")."\n"; // 원본의 데이터 타입을 변환
var_dump($type8)."\n"; 
echo "\n";

// 시간과 관련된 함수
// time() : 현재 시간을 반환 하는데 (타임스탬프의 초단위) 까지 가져온다.
echo time();
echo "\n";

// 위의 시간을 보기가 불편해서 나온 타입? - 현재 시간 구하는 방법
// date(시간 포맷, 타임 스탬프 값) : 시간 포맷 형식으로 문자열을 반환한다.
echo date("Y-m-d H:i:s", time());
// time() <- 생략가능하다.
// 년, 월, 일만 가져오려면 H:i:s를 지우면 된다.
echo "\n";

// ceil(변수-숫자), round(변수), floor(변수)
// : 각 올림, 반올림, 버림하여 반환한다.
echo ceil(1.2)."\n";
echo round(1.5)."\n";
echo floor(1.9)."\n";

// 랜덤함수
// random_int(시작 값, 끝 값) : 시작 값 부터 끝 값까지의 랜덤한 숫자 반환
echo random_int(1, 10000000);
echo "\n";