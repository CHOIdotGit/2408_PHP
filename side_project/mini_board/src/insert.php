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

            // insert 처리 / 유효성 체크는 지금은 하지 않는다.
            $arr_prepare = [
                "title" => $_POST["title"]
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
    <link rel="stylesheet" href="./css/insert.css">
    <title>작성 페이지</title>
</head>
<body>
    <?php
        require_once(MY_PATH_ROOT."header.php");
    ?>

    <main>
        <form action="/insert.php" method="post"><!-- 선생님 코드 추가  -->
            <!-- <div> -->
            <ul class="ul-top">
            <!-- </div> -->    
                <li class="item">
                    <!-- <div> -->
                    <label for="title" class="title t_title">제목</label>
                    <!-- </div> -->
                    <!-- <div> -->
                    <input type="text" id="title" name="title" class="text">
                    <!-- </div> -->
                </li>
                <li class="item">
                    <!-- <div> -->
                    <label for="textarea" class="title title-box">내용</label>
                    <!-- </div> -->
                    <!-- <div> -->
                    <textarea id="textarea" name="content" class="text t_text"></textarea>
                    <!-- </div> -->
                </li>
            </ul>
       
            <div class="main-footer">
                <button type="submit" class="btn-small">작성</button>
                <a href="/"><button type="button" class="btn-small">취소</button></a>
            </div>
        </form>
    </main>
</body>
</html>