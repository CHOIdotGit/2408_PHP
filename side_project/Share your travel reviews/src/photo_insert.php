<?php

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/photo_insert.css">
    <title>여행 사진 게시글 작성 페이지</title>
</head>
<body>
    <div class="header">
        <div class="header_title">
            <a href="./index.php" class="header-img">
                <h1>Share your travel reviews!</h1>
            </a>
        </div>
    </div>
    </div>  
    <div class="notion">
        <div class="full_screen">화면을 최대화 해주세요!!!</div>  
    </div>
    <main>
        <form action="/photo_insert.php" method="post">
            <div class="text-title">
                <input type="text" id="title" name="title" class="title" placeholder="제목">
                <div class="user_num">회원 번호</div>
                <input type="number" id="user_id" name="user_id" class="user_id">
            </div>
            <div class="hr">
                <hr>
            </div>
            <div class="content-area">
                <div class="img-box">
                    <div id="upload-img"></div>
                </div>
                <div class="t_area">
                    <textarea name="content" id="content" class="content" placeholder="내용은 간략하게 적어주세요.(40자 제한)"></textarea>            
                </div>
            </div>
            <div class="file-upload preview-img">
                <label for="up-file">파일 선택</label>
                <input type="file" id="up-file" accept="image/*" onchange="setThumbnail(event);">
            </div>
            <script>
                function setThumbnail(event) {
                    var reader = new FileReader();
        
                    reader.onload = function(event) {
                        var img = document.createElement("img");
                        img.setAttribute("src", event.target.result);
                        document.querySelector("#upload-img").appendChild(img);
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            </script>
            <div class="btn-insert">
                <button type="submit" class="btn-write">작성</button>
                <a href="/"><button type="button" class="btn-cancel">취소</button></a>
            </div>
        </form>
    </main>
</body>
</html>