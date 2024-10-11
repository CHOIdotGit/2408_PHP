<?php
$fileUrl = 'https://apihub.kma.go.kr/api/file?authKey=YOUR_AUTH_KEY'; // 다운로드할 파일의 URL
$fileName = 'output_file.zip'; // 다운로드할 파일의 이름

header('Content-Type: application/octet-stream'); // 다운로드할 파일의 MIME 타입 설정
header("Content-Transfer-Encoding: Binary"); // 파일을 이진 데이터로 전송
header("Content-disposition: attachment; filename=\"$fileName\""); // 다운로드할 파일의 이름을 헤더에 포함

readfile($fileUrl); // 파일을 읽어와 출력
?>