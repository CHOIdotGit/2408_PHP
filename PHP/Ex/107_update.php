<?php

require_once("./my_db.php");

$conn = null;
// 위 설정을 하지 않는다면 my_db_conn에서 에러가 발생하면 undefined variable이 출력된다.

try {
    // PDO Class 인스턴스화
    $conn = my_db_conn();

    $sql = 
        " UPDATE employees "
        ." SET "
        ."      name = :name "
        ."      ,updated_at = NOW() "
        ." WHERE "
        ."      emp_id = :emp_id "
    ;
    $arr_prepare = [
        "name" => "갑순이"
        ,"emp_id" => 100001
    ];
    $conn->beginTransaction(); // 트랜잭션 시작
    // 트랜잭션은 insert, update, delete를 한다면 무조건 있어야 한다.
    // + DB 연결하고 바로 실행해도 된다(11번 라인에).
    
    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 반환
    
    if(!$result_flg) {
        throw new Exception("쿼리 실행 예외 발생");
    }
    
    if($result_cnt !== 1) {
        throw new Exception("수정 레코드 수 이상");
    }
    
    $conn->commit(); // 커밋 처리
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}