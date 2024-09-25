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
     ."      board "
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
        ."      board "
        ." WHERE "
        ."      deleted_at IS NULL "
    ;

    $stmt = $conn->query($sql);
    $result = $stmt->fetch();

    return $result["cnt"];
}