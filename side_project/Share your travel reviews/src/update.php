<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

try {
    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
        // GET처리
        // page 획득
        $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

        if($id < 1) {
            throw new Exception("파라미터 오류");
        }

        // PDO Instance
        $conn = my_db_conn();

        // 데이터 조회
        $arr_prepare = [
            "id" => $id
        ];

        $result = my_board_select_id($conn, $arr_prepare);

    } else {
    // POST 처리
        // parameter 획득(id, page, title, content)
        // id 획득
        $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
        
        // user_id 획득
        $id = isset($_POST["user_id"]) ? (int)$_POST["user_id"] : 0;

        // page 획득
        $page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;

        // title 획득
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        
        // content 획득
        $content = isset($_POST["content"]) ? $_POST["content"] : "";

        if($id < 1 || $title ==="") {
            throw new Exception("파라미터 오류");
        }

        // PDO Instance
        $conn = my_db_conn();
        
        // beginTransaction / Transaction Start
        $conn->beginTransaction();

        $arr_prepare = [
            "id" => $id
            ,"user_id" => $user_id
            ,"title" => $title
            ,"content" => $content
        ];

        my_board_update($conn, $arr_prepare);

        // commit
        $conn->commit();

        // detail 페이지로 이동
        header("Location: /detail.php?id=".$id."&page=".$page);
        exit;
    }
} catch(Throwable $th) {
    if(!is_null($conn) && $conn->inTransaction()) {
        $conn->rollBack();
    }


    require_once(MY_PATH_ERROR);
    exit;
}
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
    <main>
        <form action="/update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $result["id"] ?>">
            <input type="hidden" name="page" value="<?php echo $page ?>">

            <div class="text-title">
                <input type="text" id="title" name="title" class="title" value="<?php echo $result["title"] ?>">
                <div class="user_num">회원 번호</div>
                <div class="user_id"><?php echo $result["user_id"] ?></div>
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
            <div class="file-upload">
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