<?php
require_once("./my_db.php");
$conn = null; // connection 초기화 작업(object일때)
try {
    $conn = my_db_conn();
    // sql(쿼리문 작성)
    $sql = 
        " INSERT INTO employees( "
        ."      name   "
        ."      ,birth   "
        ."      ,gender   "
        ."      ,hire_at   "
        ." ) "
        ." VALUES( "
        ."      :name "
        ."      ,:birth "
        ."      ,:gender "
        ."      ,DATE(NOW()) "
        ." ) "
    ;
    $arr_prepare = [
        "name" => "홍길동"
        ,"birth" => "2000-01-01"
        ,"gender" => "M"
    ];

    // transaction 시작
   $conn->beginTransaction(); // 커밋을 하지 않는다면 데이터가 저장되지 않는다.
    // DB에 국한되지는 않는다. PHP에서 AUTO_COMMIT이 활성화 됨
    // transaction이란?
    // 트랜잭션은 일반적으로 일괄 변경 사항을 "저장"하여 한꺼번에 
    // 적용함으로써 구현된다. 
    // 이는 해당 업데이트의 효율성을 크게 개선하는 좋은 부작용이 있습니다. 
    // 다시 말해, 트랜잭션은 스크립트를 더 빠르고 잠재적으로 
    // 더 강력하게 만들 수 있습니다(이러한 이점을 얻으려면 
    // 여전히 올바르게 사용해야 합니다).

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $exec_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    // true or false로 반환
    $result_count = $stmt->rowCount(); // 영향 받은 레코드 수를 반환

    // 쿼리 실행 예외 처리
    if(!$exec_flg) {
        throw new Exception("execute 예외 발생"); // 강제로 예외 발생
    } // else if()
    // 위 처리가 발생하고 catch로 간다.

    // 영향 받은 레코드 수 이상
    if($result_count !== 1) {
        throw new Exception("레코드 수 이상"); // 강제로 예외 발생
    }
    
    // commit 처리
    $conn->commit();

} catch(Throwable $th) {
    // PDO 인스턴스화 확인 작업
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getCode()." ".$th->getMessage();
}