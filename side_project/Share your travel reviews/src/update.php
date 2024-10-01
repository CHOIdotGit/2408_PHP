<?php

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/update.css">
    <title>여행 사진 게시글 수정 페이지</title>
</head>
<body>
    <div class="header">
        <div class="header_title">
            <a href="./index.php" class="header-img">
                <h1>Share your travel reviews!</h1>
            </a>
        </div>
    </div>
    <div class="notion">
        <div class="full_screen">화면을 최대화 해주세요!!!</div>  
    </div>
    <main>
        <form action="/update.php" method="post">
            <input type="hidden" name="">
            <input type="hidden" name="">

            <div class="text-title">
                <input type="text" id="title" name="title" class="title" value="<?php echo $result["title"] ?>">
                <div class="user_num">회원 번호</div>
                <div class="user_id"><?php echo $result["id"] ?></div>
            </div>
            <div class="hr">
                <hr>
            </div>
            <div class="content-area">
                <div class="img-box">
                    <div id="upload-img"></div>
                </div>
                <div class="t_area">
                    <textarea name="content" id="content" class="content"><?php echo $result["content"] ?></textarea>            
                </div>
            </div>
            <div class="file-upload preview-img">
                <label for="up-file">파일 선택</label>
                <input type="file" id="up-file" accept="image/*" onchange="setThumbnail(event);">
            </div>
            <div class="btn-insert">
                <button type="submit" class="btn-write">확인</button>
                <a href="/detail.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="button" class="btn-cancel">취소</button></a>
            </div>
        </form>
    </main>
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
</body>
</html>