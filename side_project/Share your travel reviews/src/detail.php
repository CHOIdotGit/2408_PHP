<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);
    
    $conn = null;
    
    try {
        // id 획득 - 유저가 get method로 요청
        $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
    
        // page 획득
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
       
        if($id < 1) {
            throw new Exception("파라미터 오류");
        }
    
        // PDO Instance
        $conn = my_db_conn();
    
        $arr_prepare = [
            "id" => $id
        ];
    
        $result = my_board_select_id($conn, $arr_prepare);
    
    } catch(Throwable $th) {
        require_once(MY_PATH_ROOT);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/detail.css">
    <title>여행 사진 게시글 상세 페이지</title>
</head>
<body>
    <div class="header">
        <div class="header_title">
            <a href="./index.php" class="header-img">
                <h1>Share your travel reviews!</h1>
            </a>
        </div>
    </div>
    
    <div class="text-title">
        <div class="title"><?php echo $result["title"] ?></div> <!-- 제목 -->
        <div class="user_num">회원 번호</div>
        <div class="user_num user_id"><?php echo $result["user_id"] ?></div> <!-- 회원 번호 -->
    </div>
    <div class="hr">
        <hr>
    </div>
    <div class="content-area">
        <div class="img-box">
            <div id="upload-img"><img src="<?php echo $result["img"] ?>"></div>
        </div>
        <div class="t_area">
        <div class="box-content"><?php echo $result["content"] ?></div> <!-- 내용 -->          
        </div>
    </div>
    <!-- <div class="file-upload preview-img">
        <label for="up-file">파일 선택</label>
        <input type="file" id="up-file" accept="image/*" onchange="setThumbnail(event);">
    </div> -->
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
    <form action="" class="btn-insert">
        <a href="/update.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="submit" class="btn-write">수정</button></a>
        <a href="/photo.php?page=<?php echo $page ?>"><button type="button" class="btn-cancel">취소</button></a>
        <a href="/delete.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="button" class="btn-cancel">삭제</button></a>
    </form>
</body>
</html>