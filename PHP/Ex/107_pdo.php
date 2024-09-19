<?php

// PDO : PHP Data Objects / DB 엑세스 방법 중 하나
// -> DB에 접속하고 여러 DB 작업을 수행하기 위한 확장 모듈
// + 여러 종류의 DB에 대해 동일한 방식으로 작업을 할 수 있도록 해주는 모듈

// DB 접속 정보 + DB에 대한 정보의 갱신
$my_host = "localhost"; // DB Host
// 따로 서버 있는것이 아니라 나 자신의 데이터
$my_port = "3306"; // port - HeidiSQL port (number)
$my_user = "root"; // DB 계정 이름
$my_password = "php504"; // DB 계정 비밀번호
$my_db_name = "dbsample"; // 접속할 DB 이름
$my_charset = "utf8mb4"; // DB Charset 파일이 깨진다면 캐릭터셋 문제 가능성 높음

// DSN
// $my_dsn = "mysql:host=".$my_host.";dbname=".$my_db_name.";charset=".$my_charset; // del v001 << 이런식으로 코멘트 아웃하는것이 좋다.
$my_dsn = "mysql:host=".$my_host.";port=".$my_port.";dbname=".$my_db_name.";charset=".$my_charset; // add v001

// PDO option(옵션) 설정
$my_otp = [
    // Prepared Statement로 쿼리를 준비할 때, 
    // PHP와 DB 어디에서 에뮬레이션 할지 여부를 결정하는 옵션
    PDO::ATTR_EMULATE_PREPARES => false
    // PDO에서 예외 발생 시, 예외를 처리하는 방식을 지정하는 옵션
    ,PDO::ATTR_ERRMODE         => PDO::ERRMODE_EXCEPTION
    // DB의 결과를 fetch하는 방식을 지정하는 옵션 / Fetch할 때 데이터 타입 설정
    ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // 연관 배열로 fetch
];
// [] << 배열로 선언한다는 뜻

// DB 접속 - PDO Class 인스턴스 - 'new' / 옵션은 선택사항
$conn = new PDO($my_dsn, $my_user, $my_password, $my_otp);
// class를 인스턴스 할 때 무조건 'new'를 사용한다.
// PDO는 클래스

// select
// $sql = "SELECT *
//         FROM employees
//         ORDER BY emp_id ASC
//         LIMIT 5";
// $sql = " SELECT "
//        ."       * "
//        ." FROM "
//        ."        employees "
//        ." LIMIT 3 ";
// 연결 연산자를 사용할 경우 좌우에 공백이 있어야 에러가 발생하지 않는다.

// $stmt = $conn->query($sql); // PDO::query() : 쿼리 준비와 실행
// $result = $stmt->fetchall(); // 사용하기 편한 데이터 타입으로 변경. 쿼리의 결과를 Fetch.
// print_r($result);

// select 예제
$sql = 
    " SELECT "
    ." * "
    ." FROM "
    ."      employees "
    ." WHERE "
    ."       emp_id = :emp_id1 "
    ."   OR emp_id = :emp_id2 "
;
$prepare = [
    "emp_id1" => 10001
    ,"emp_id2" => 10002
];

$stmt = $conn->prepare($sql); // 쿼리 준비
$stmt->execute($prepare); // 쿼리 실행 / 여러개를 담아야 함
// execute의 type이 배열
$result = $stmt->fetchAll(); // 결과 fetch 작업 진행

print_r($result);
// var_dump로 출력하면 null 값 반환됨
// print_r은 컴퓨터가 null 값을 인식한 상태이지만 출력하지 않고 빈칸

// 사번과 이름만 출력
// foreach($result as $item) {
//     echo $item["emp_id"]. " ".$item["name"]."\n";
// }