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
            throw new Exception("파라미터 오류 : G");
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

        // page 획득
        $page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;

        // title 획득
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        
        // content 획득
        $content = isset($_POST["content"]) ? $_POST["content"] : "";

        if($id < 1 || $title ==="") {
            throw new Exception("파라미터 오류 : P");
        }
    
        // PDO Instance
        $conn = my_db_conn();
        
        // beginTransaction / Transaction Start
        $conn->beginTransaction();

        $arr_prepare = [
            "id" => $id
            ,"title" => $title
            ,"content" => $content
        ];
        
        //update할 때 img는 $arr_prepare에 동적으로 포함된다.
        // 유저가 이미지를 바꾸지 않을 때는 제외시키고 이미지를 바꿀 때는 포함시킨다. 
        $up_file = $_FILES["up_file"]; // $up_file이라는 변수명에 슈퍼 글로벌 변수$_FILES를 담는다.
        // 이렇게 적용하면 밑의 html코드에 있는 file type의 input태그의 name이 up_file인데 이곳에 적용된다.
        // 그래서 name을 정해주는 것이 중요하다.

        if($file["name"] !== "") {
            $tmp_file_path = $up_file["tmp_name"];

            $type = explode("/", $up_file["type"]);
            $file_name = uniqid().".".$type[1];

            move_uploaded_file($tmp_file_path, MY_PATH_ROOT."img/".$file_name);

            $arr_prepare["img"] = "/img/".$file_name;
        }

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
        <form action="/update.php" method="post" enctype="multipart/form-data">
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
                    <div id="upload-img"><img src="<?php echo $result["img"] ?>"></div>
                </div>
                <div class="t_area">
                    <textarea name="content" maxlength="30" id="content" class="content"><?php echo $result["content"] ?></textarea>            
                </div>
            </div>
            <div class="file-upload">
                <div class="file_box">
                    <label for="up-file">파일 선택</label>
                    <input type="file" id="up-file" name="up_file" accept="image/*" onchange="setThumbnail(event);">
                </div>
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
                let uploadImg = document.querySelector("#upload-img");
                uploadImg.replaceChildren();

                var img = document.createElement("img");
                img.setAttribute("src", event.target.result);
                uploadImg.appendChild(img);
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>