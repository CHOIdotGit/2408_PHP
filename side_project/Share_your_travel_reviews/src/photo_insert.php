<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);
    $conn = null;
    
    // post로 왔을 때 데이터를 저장
    // $_SERVER의 REQUEST_METHOD로 인해 GET으로 왔는지 POST로 왔는지 
    // 확인 할 수 있다.
    // strtoupper << 여기 안을 대문자 처?리
    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
        try {
            // PDO Instance
            $conn = my_db_conn();
            $up_file = $_FILES["up_file"];
            $tmp_file_path = $up_file["tmp_name"];

            $type = explode("/", $up_file["type"]);
            $file_name = uniqid().".".$type[1];

            move_uploaded_file($tmp_file_path, MY_PATH_ROOT."img/".$file_name);
            // insert 처리 / 유효성 체크는 지금은 하지 않는다.
            $arr_prepare = [
                "user_id" => $_POST["user_id"]
                ,"img" => "/img/".$file_name
                ,"title" => $_POST["title"]
                ,"content" => $_POST["content"]
            ];

            //begin transaction
            $conn->beginTransaction();
            my_board_insert($conn, $arr_prepare);
            
            $conn->commit();

            header("Location: /"); // 요청을 보내고 응답 - html의 head태그에 "/"(루트)로 이동하는 로케이션을 넣음
            exit;
        } catch(Throwable $th) {
            if(!is_null($conn)) {
                $conn->rollBack();
            }
            require_once(MY_PATH_ERROR);
            exit;
        }
    }
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
        <form action="/photo_insert.php" method="post" enctype="multipart/form-data">
            <div class="text-title">
                <input type="text" maxlength="15" id="title" name="title" class="title" placeholder="제목은 최대 15글자 입니다.">
                <div class="user_num">회원 번호</div>
                <input type="number" id="user_id" maxlength="10" name="user_id" class="user_id" placeholder="최대 10자리 숫자로 사용해주세요.">
            </div>
            <div class="hr">
                <hr>
            </div>
            <div class="content-area">
                <div class="img-box">
                    <div id="upload-img"></div>
                </div>
                <div class="t_area">
                    <textarea name="content" id="content" class="content" maxlength="20" placeholder="내용은 간략하게 적어주세요.(20자 제한)"></textarea>            
                </div>
            </div>
            <div class="file-upload">
                <div class="file_box">
                    <label for="up_file">파일 선택</label>
                    <input type="file" id="up_file" name="up_file" accept="image/*" onchange="setThumbnail(event);">
                </div>
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
                <a href="/photo.php"><button type="submit" class="btn-write">작성</button></a>
                <a href="/photo.php"><button type="button" class="btn-cancel">취소</button></a>
            </div>
        </form>
    </main>
</body>
</html>