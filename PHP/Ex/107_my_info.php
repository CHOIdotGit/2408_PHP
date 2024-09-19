<?php
// 나의 사원 정보 입력(급여, 직급, 부서 정보 포함)
require_once("./my_db.php");

$conn = null;

try {
    $conn = my_db_conn();
    $conn->beginTransaction();
    // 사원 테이블 insert
    $sql = 
        " INSERT INTO employees( "
        ."      name " 
        ."      ,birth " 
        ."      ,gender " 
        ."      ,hire_at " 
        ." ) " 
        ." VALUES( " 
        ."      :name " 
        ."      ,:birth " 
        ."      ,:gender " 
        ."      ,DATE(NOW()) " 
        ." ) " 
;
    $arr_prepare = [
        "name"    => "고양이"
        ,"birth"  => "2000-01-01"
        ,"gender" => "M"
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 획득
    
    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("Insert Query Error : employees");
    }
    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert Count Error : employees");
    }
    // insert한 pk 획득
    $emp_id = $conn->lastInsertId();

    // 급여 테이블 insert
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
        "emp_id"    => "$emp_id"
        ,"salary"   => 1200000000
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 획득
    
    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("Insert Query Error : salaries");
    }
    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert Count Error : salaries");
    }

    // 직급 테이블 insert
    $sql = 
        " INSERT INTO title_emps( "
        ."      emp_id  " 
        ."      ,title_code " 
        ."      ,start_at " 
        ." ) " 
        ." VALUES( " 
        ."      :emp_id " 
        ."      ,:title_code " 
        ."      ,DATE(NOW()) " 
        ." ) " 
;
    $arr_prepare = [
        "emp_id"       => "$emp_id"
        ,"title_code"  => "T001"
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 획득
    
    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("Insert Query Error : salaries");
    }
    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert Count Error : salaries");
    }

    // 소속부서 테이블 insert
    $sql = 
    " INSERT INTO department_emps( "
    ."      emp_id  " 
    ."      ,dept_code " 
    ."      ,start_at " 
    ." ) " 
    ." VALUES( " 
    ."      :emp_id " 
    ."      ,:dept_code " 
    ."      ,DATE(NOW()) " 
    ." ) " 
    ;
    $arr_prepare = [
    "emp_id"      => "$emp_id"
    ,"dept_code"  => "D002"
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 획득

    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("Insert Query Error : department_emps");
    }
    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert Count Error : department_emps");
    }

    $conn->commit();
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}