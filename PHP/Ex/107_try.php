<?php

try {
    echo "try문 시작\n";
    // 예외나 에러가 발생할 가능성이 있는 소스 코드를 작성
    // 5 /0;
    echo "try문 끝\n";
}   catch(Throwable $th) {
    // try문에서 예외나 에러가 발생했을 때 실행할 소스 코드를 작성한다.
    echo "catch 예외 발생\n";
} finally {
    echo "finally";
}

// echo "처리 종료됨";