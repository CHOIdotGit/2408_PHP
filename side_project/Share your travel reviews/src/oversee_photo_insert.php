<?php

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/oversee_photo_insert.css">
    <title>해외 여행 사진 게시글 작성 페이지</title>
</head>
<body>
    <div class="header">
        <div class="header_title">
            <a href="./index.php" class="oversee-img">
                <h1>해외 여행</h1>
            </a>
        </div>
    </div>    
    <div>
        <input type="text" id="title" name="title" class="text" placeholder="제목">
    </div>
    <hr>
    <div>
        <div>
            <div>
                사진
            </div>
        </div>
        <textarea name="content" id="content" placeholder="내용
        간략하게 적어주세요
        *수정이 불가하오니 신중하게 적어주세요"></textarea>
    </div>
    <form action="">
        <a href=""><button type="submit">작성</button></a>
        <a href=""><button type="button">취소</button></a>
    </form>
</body>
</html>