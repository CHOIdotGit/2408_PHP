<?php

require_once("./my_db.php");

try {
    $conn = my_db_conn();

    $id = 1;
    // Prepared Statment
    $sql =" SELECT " 
          ."    * "
           ." FROM employees "
           ." WHERE "
           ." emp_id = :emp_id "
           ." AND name = :name ";
    
    $arr_prepare = [
        "emp_id" => $id
        ,"name" => "홍길동"
    ];
    
    $stmt = $conn->prepare($sql); // DB 질의 준비
    $stmt->execute($arr_prepare); // 질의 실행
    $result = $stmt->fetchAll(); // 질의 결과 패치
    
    print_r($result);

} catch(Throwable $th) {
    echo $th->getMessage(); // 예외 메세지 출력
}
