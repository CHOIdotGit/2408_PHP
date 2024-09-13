<?php


// mkdir() : 디렉토리 생성

// mkdir("./my_dir", 777 OR 775); - 리눅스
// $mkdir_result = mkdir("./my_dir");
// if($mkdir_result) {
//     // 정상일 경우 처리
// } else {
//     // 실패일 경우 처리
// }
// if안에 mkdir("./my_dir") << 얘를 바로 넣을 수 있음


// is_dir() : 디렉토리 존재 유무 체크
// $chk_result = is_dir("./my_dir");
// if($chk_result) {
//     echo "있다.";
// } else {
//     echo "없거나 삭제 됨";
// }


// 디렉토리 열기 및 읽기
// $open_result = opendir("./my_dir");
// -> 디렉토리 열기

// while($file = readdir($open_result)) {
//     echo $file."\n";
// }
// 출력했을 때 점 하나는 현재 폴더를 의미하고
// 점 두개는 상위 폴더를 의미한다.


// 디렉토리 닫기
// closedir($open_result);


// 디렉토리 삭제 : 성공은 true 실패는 false
// rmdir("./my_dir");
// 디렉토리를 삭제하는 경우는 많지 않음
// 삭제할 경우 폴더 안의 파일을 다 불러와서 삭제하고 폴더를 삭제


// ------------------
// 파일과 관련된 작업
// ------------------

// 파일 열기 - 보통의 경우 1, 2번째만 셋팅하고 3,4는 세팅하지 않는다
$file = fopen("./my_dir/test.txt", "a");
// "a"로 설정했기 때문에 해당 파일이 없으면 새로 생성하고 열어준다.
if($file) {
    // 파일 열기 성공시 처리
    fwrite($file, "떡볶이"); // 해당 파일에 쓰기
    // 로그 남길 때 많이 사용한다. (접속 이력 등)
} else {
    // 파일 열기 실패시 처리
    echo "파일 열기 실패";
}


// 파일 닫기 - 성공은 true 실패는 false
fclose($file);

// 파일 삭제
unlink("./my_dir/test.txt");