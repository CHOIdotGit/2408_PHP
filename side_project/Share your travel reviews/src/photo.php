<?php



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
            <a href="./photo_insert.php"><button class="btn btn-right">글 작성</button></a>
        </div>
    </div>
    <div class="container">
        <main class="main-content">
            <div class="card">
                <div class="oversee_img oversee_img_one"></div>
                <a href="./oversee_photo_delete.php"><h2 class="oversee_title">독일</h2></a>
                <p class="oversee_write">라인 뤼데샤임의 수도원 Eibingen Abbey</p>
            </div>
            <div class="card">
                <div class="oversee_img oversee_img_two"></div>
                <a href="./oversee_photo_delete.php"><h2 class="oversee_title">독일 프랑크푸르트(?)</h2></a>
                <p class="oversee_write">대학교 건물이었는데 기억 안 남</p>
            </div>
            <div class="card">
                <div class="oversee_img oversee_img_three"></div>
                <a href="./oversee_photo_delete.php"><h2 class="oversee_title">큐슈 후쿠오카</h2></a>
                <p class="oversee_write">후쿠오카 타워</p>
            </div>
            <div class="card">
                <div class="oversee_img oversee_img_four"></div>
                <a href="./oversee_photo_delete.php"><h2 class="oversee_title">큐슈 후쿠오카</h2></a>
                <p class="oversee_write">후쿠오카 타워 내부에서 찍은 바깥 사진</p>
            </div>  
        </main>
    </div>    
    <div class="go_reviews">
        <a href="./reviews.php"><button class="btn btn-bottom">여행 후기 게시판</button></a>
    </div>
    <div class="main-footer">
        <a href=""><button class="btn btn-small">이전</button></a>
        <a href=""><button class="btn btn-small">1</button></a>
        <a href=""><button class="btn btn-small">2</button></a>
        <a href=""><button class="btn btn-small">3</button></a>
        <a href=""><button class="btn btn-small">다음</button></a>
    </div> 
</body>
</html>