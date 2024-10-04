<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/error.css">
    <title>여행 사진 게시글 에러 페이지</title>
</head>
<body>
    <div class="header">
        <div class="header_title">
            <a href="./index.php" class="header-img">
                <h1>Share your travel reviews!</h1>
            </a>
        </div>
    </div>
    <main class="main_err">
        <div class="error_table">
            <div class="box">
                <h2>에러가 발생했습니다.</h2>
                <br>
                <p>메인 페이지로 되돌아가서</p>
                <p>다시 실행해 주세요.</p>
                <br>
                <p>확인을 누르시면</p>
                <p>메인 페이지로 돌아갑니다.</p>
                <br>
                <span><?php echo $th->getMessage() ?></span>
            </div>
        </div>
        <a href="/"><button type="button" class="btn btn-bottom">확인</button></a>
    </main>
</body>
</html>
