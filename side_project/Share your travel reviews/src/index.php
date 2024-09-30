<?php



?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Share your travel reviews!</title>
</head>
<body>
    <!-- 여기 div를 header를 줘도 어차피 css에서 display: inline-block 설정해야함 -->
    <div class="header">
        <div class="header_title">
            <a href="./index.php" class="header-img">
                <h1>Share your travel reviews!</h1>
            </a>
        </div>
    </div>
    <div class="container">
        <main class="main-content">
            <div class="card">
                <div class="pop_card_img"></div>
                <a href="./pop_photo.php"><h2 class="pop_card_title">인기글</h2></a>
            </div>
            <div class="card">
                <div class="oversee_card_img"></div>
                <a href="./oversee_photo.php"><h2 class="oversee_card_title">해외 여행</h2></a>
            </div>
            <div class="card">
                <div class="domestic_card_img"></div>
                <a href="./domestic_photo.php"><h2 class="domestic_card_title">국내 여행</h2></a>
            </div>
        </main>
    </div>    
<footer class="footer">
    © 2024. GREEN COMPUTER ART ACADEMY DAEGU / CREAT BY CHOI
</footer>

</body>
</html>