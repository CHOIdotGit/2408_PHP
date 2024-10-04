<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

try {
    //PDO Instance
    $conn = my_db_conn();

    // max page 획득 처리
    $max_board_cnt = my_board_total_count($conn); // 게시글 총 수 획득
    $max_page = (int)ceil($max_board_cnt / MY_LIST_COUNT); // max page 획득

    // pagination 설정 처리
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1; // 현재 페이지 획득
    $offset = ($page - 1) * MY_LIST_COUNT; // 오프셋 설정
    // 화면 표시 페이지 버튼 시작 값
    $start_page_button_number = (int)(floor(($page - 1) / MY_PAGE_BUTTON_COUNT) * MY_PAGE_BUTTON_COUNT) + 1; 
    // 화면 표시 페이지 버튼 마지막 값
    $end_page_button_number = $start_page_button_number + (MY_PAGE_BUTTON_COUNT - 1);
    
    // max page 초과시 페이지 버튼 마지막 값 조절
    $end_page_button_number = $end_page_button_number > $max_page ? $max_page : $end_page_button_number;
    
    // 이전 버튼
    $prev_page_button_number = $page - 1 < 1 ? 1 : $page - 1; 
    // 다음버튼
    $next_page_button_number = $page + 1 > $max_page ? $max_page : $page + 1; 

    // prepared statment setitng
    $arr_prepare = [
        "list_cnt" => MY_LIST_COUNT // 100
        ,"offset"  => $offset // 0
    ];

    //paginaiton select 처리
    $result = my_board_select_pagination($conn, $arr_prepare);
    
} catch(Throwable $th) {
    // echo $th->getMessage();
    // 위 에러 표시 대신 밑의 코드를 사용
    require_once(MY_PATH_ROOT);
    exit; // 이후의 처리를 하지 않음
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/photo.css">
    <title>여행 사진 게시판</title>
</head>
<body>
    <div class="header">
        <div class="header_title">
            <a href="./index.php" class="header-img">
                <h1>Share your travel reviews!</h1>
            </a>
        </div>
    </div>
    <div class="top-btn">
        <div class="btn btn-center">여행 사진 게시판</div>
        <div>
            <a href="/photo_insert.php">
                <button class="btn btn-right">글 작성</button>
            </a>
        </div>
    </div>
    <div class="container">
        <main class="main-content">
            <?php foreach($result as $item) { ?>
            <div class="card">
                <div class="oversee_img"><img src="<?php echo $item["img"] ?>"></div>
                <a href="/detail.php?id=<?php echo $item["id"] ?>&page=<?php echo $page ?>" class="title"><h2 class="oversee_title"><?php echo $item["title"] ?></h2></a>
                <div class="write">
                    <textarea readonly class="oversee_write"><?php echo $item["content"] ?></textarea>
                </div>
            </div>
            <?php } ?>
            <!-- <div class="card">
                <div class="oversee_img oversee_img_two"></div>
                <a href="/delete.php"><h2 class="oversee_title">독일 프랑크푸르트(?)</h2></a>
                <p class="oversee_write">대학교 건물이었는데 기억 안 남</p>
            </div>
            <div class="card">
                <div class="oversee_img oversee_img_three"></div>
                <a href="/delete.php"><h2 class="oversee_title">큐슈 후쿠오카</h2></a>
                <p class="oversee_write">후쿠오카 타워</p>
            </div>
            <div class="card">
                <div class="oversee_img oversee_img_four"></div>
                <a href="/delete.php"><h2 class="oversee_title">큐슈 후쿠오카</h2></a>
                <p class="oversee_write">후쿠오카 타워 내부에서 찍은 바깥 사진</p>
            </div>   -->
        </main>
    </div>    
    <!-- <div class="go_reviews">
        <a href="./reviews.php"><button class="btn btn-bottom">여행 후기 게시판</button></a>
    </div> -->
    <div class="main-footer">
        <?php if($page !== 1) { ?>
            <a href="/photo.php?page=<?php echo $prev_page_button_number ?>"><button class="btn btn-small">이전</button></a>
        <?php } ?>
        <?php for($i = $start_page_button_number; $i <= $end_page_button_number; $i++) { ?> 
            <a href="/photo.php?page=<?php echo $i ?>"><button class="btn btn-small <?php echo $page === $i ? "btn-seleted" : "" ?>"><?php echo $i ?></button></a>
        <?php } ?>
        <a href="/photo.php?page=<?php echo $next_page_button_number ?>"><button class="btn btn-small">다음</button></a>
    </div> 
</body>
</html>