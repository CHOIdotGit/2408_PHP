<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");

function my_db_conn() {
    $option = [
        pdo::ATTR_EMULATE_PREPARES    => false
        ,PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    return new PDO(MY_MARIADB_DSN, MY_MARIADB_USER, MY_MARIADB_PASSWORD, $option);
}

// board select 페이지네이션 
function my_board_select_pagination(PDO $conn, array $arr_param) {
    // SQL
    $sql =
    " SELECT "
    ."      * "
    ." FROM "
    ."      boards "
    ." WHERE "
    ."      deleted_at IS NULL "
    ." ORDER BY "
    ."      created_at DESC "
    ."      , id DESC "
    ." LIMIT :list_cnt OFFSET :offset "
   ;


   $stmt = $conn->prepare($sql);
   $result_flg = $stmt->execute($arr_param);
   // $result_cnt = $stmt->rowCount();

   if(!$result_flg) {
       throw new Exception("쿼리 실행 실패");
   }

   return $stmt->fetchAll();
}

// board 테이블 유효 게시글 총 수 획득
function my_board_total_count(PDO $conn) {
    $sql =
        " SELECT "
        ."      COUNT(*) cnt "
        ." FROM "
        ."      boards "
        ." WHERE "
        ."      deleted_at IS NULL "
    ;

    $stmt = $conn->query($sql);
    $result = $stmt->fetch();

    return $result["cnt"];
}

// board 테이블 insert 처리
function my_board_insert(PDO $conn, array $arr_param) {
    $sql = 
        " INSERT INTO boards ( "
        ."      user_id "
        ."      ,title "
        ."      ,content "
        ." ) "
        ." VALUES ( "
        ."      :user_id "
        ."      ,:title "
        ."      ,:content "
        ." ) "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);
    
    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    $result_cnt = $stmt->rowCount();

    if($result_cnt !== 1) {
        throw new Exception("Insert Count 이상");
    }
    
    return true;
}

// id로 게시글 조회
function my_board_select_id(PDO $conn, array $arr_param) {
    $sql = 
    " SELECT "
        ."      * "
        ." FROM "
        ."      boards "
        ." WHERE "
        ."      id = :id "
    ;
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }
    
    return $stmt->fetch();
}

// board 테이블 update
function my_board_update(PDO $conn, $arr_param) {
    $sql =
        " UPDATE boards "
        ." SET "
        ."      title = :title "
        ."      ,content = :content "
        ."      ,updated_at = NOW() "
        ." WHERE "
        ."      id = :id "
    ;
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }
    
    if($stmt->rowCount() !== 1) {
        throw new Exception("Update Count 이상");
    }

    return true;
}

// board 테이블 delete
function my_board_delete_id(PDO $conn, $arr_param) {
    $sql =
        " UPDATE boards " // 특정 기간이 지났을 경우 DELETE를 사용 그 외는 소프트 DELETE
        ." SET "
        ."      updated_at = NOW() "
        ."      ,deleted_at = NOW() "
        ." WHERE "
        ."      id = :id "
    ;
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    if($stmt->rowCount() !== 1) {
        throw new Exception("Delete Count 이상");
    }
    return true; // true를 사용하는 이유는 데이터를 특별히 보내야 할 것이 없기 때문
}