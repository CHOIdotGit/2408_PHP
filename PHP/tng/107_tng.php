<?php

// 나의 급여를 25000000으로 변경해주세요.

require_once("../Ex/my_db.php");
$conn = null;

try {
    $conn = my_db_conn();
    $conn->beginTransaction();

    // 나의 급여를 2500만 원으로 변경
    $sql = 
        " UPDATE salaries "
        ." SET "
        ."      end_at = DATE(NOW()) "
        ." WHERE "
        ."      emp_id = :emp_id "
    ;
    $arr_prepare = [
        "emp_id" => 100008
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount();

    if(!$result_flg) {
        throw new Exception("쿼리 실행 예외 발생");
    }
    if($result_cnt !== 1) {
        throw new Exception("수정 레코드 수 이상");
    }

    // 2500
    $sql = 
        " INSERT INTO salaries( "
        ."      emp_id  " 
        ."      ,salary " 
        ."      ,start_at " 
        ." ) " 
        ." VALUES( " 
        ."      :emp_id " 
        ."      ,:salary " 
        ."      ,DATE(NOW()) " 
        ." ) " 
    ;
    $arr_prepare = [
        "salary"  => 25000000
        ,"emp_id" => 100008
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount();

    if(!$result_flg) {
        throw new Exception("쿼리 실행 예외 발생");
    }
    if($result_cnt !== 1) {
        throw new Exception("수정 레코드 수 이상");
    }


    $conn->commit();
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}