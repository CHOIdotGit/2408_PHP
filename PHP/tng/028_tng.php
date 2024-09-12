<?php

// 1. 3의 배수 게임 (100까지)
// 출력 예) 1, 2, 짝, 4, 5, 짝, 7, 8, 짝, 10 ...
for($i = 1; $i <= 100; $i++) {
    if($i && $i % 3 == 0) echo "짝, ";
        else if($i === 100) {
            echo "100";
        }
        else {echo $i.", ";}
}


// 2. 반복문을 이용하여 급여가 5000이상이고, 성별이 남자인 사원의
// id와 이름을 출력
// 출력 예)
    //  id : 1, name : 미어캣
    //  id : 2, name : 홍길동
    //  ...
$arr = [
    ["id" => 1, "name" => "미어캣", "gender" => "M", "salary" => "6000"]
    ,["id" => 2, "name" => "홍길동", "gender" => "M", "salary" => "3000"]
    ,["id" => 3, "name" => "갑순이", "gender" => "F", "salary" => "10000"]
    ,["id" => 4, "name" => "갑돌이", "gender" => "M", "salary" => "8000"]
];

foreach($arr as $val) {
    if($val["gender"] === "M" && $val["salary"] >= "5000")  {
        echo "id : ".$val["id"].", name : ".$val["name"]."\n";
    }
}

// 선생님 코드
foreach($arr as $item) {
    if(($item["gender"] === "M") && ((int)$item["salary"] >= 5000))  {
        echo "id : ".$item["id"].", name : ".$item["name"]."\n";
    }
}

// key : 만약 위 arr가 1줄만 있다면 key 값은 id, name, gender
// salary이고 위와 같이 여러줄인 상황에서는 key 값은 총 줄의 -1값(숫자)
// 그래서 다차원 배열이 되었을 때 key 값에는 문자가 들어갈 수 없고
// 숫자만 들어갈 수 있다.
// 조건에 === 연산자를 사용한 이유는 데이터 타입과 값을 일치하기 위함이다.


// value(val) : 위의 arr를 예시로 []안에 있는 값 전부 포함?
// id나 1, name과 미어캣, gender와 M salary와 6000 모두 value값이다.

// 위 문제에서는 $key 값을 사용하지 않기에 foreach문에서 $key를
// 생략할 수 있다.