<?php

    // HTTP Method가 POST일 때 요청 데이터를 받는 방법
    // echo isset($_POST["id"]) ? $_POST["id"] : 1;
    // 민감한 정보는 POST를 이용한다.
    var_dump($_POST); 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="id" id="id">
        <br>
        <button type="submit">버튼</button>
    </form>
</body>
</html>