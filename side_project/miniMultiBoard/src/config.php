<?php

// 경로
define('_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('_PATH_VIEW', _ROOT.'/View');
define('_PATH_IMG', '/View/img');

// MariaDB
define('_MARIA_DB_HOST', 'localhost'); // 호스트
define('_MARIA_DB_PORT', '3306'); // 포트
define('_MARIA_DB_USER', 'root'); // 계정
define('_MARIA_DB_PASSWORD', 'php504'); // 비밀번호
define('_MARIA_DB_NAME', 'mini_multi_board'); // DB 이름
define('_MARIA_DB_CHARSET', 'utf8mb4'); // DB Charset
define('MARIA_DB_DSN', 
    'mysql:host='._MARIA_DB_HOST
    .';port='._MARIA_DB_PORT
    .';dbname='._MARIA_DB_NAME
    .';charset='._MARIA_DB_CHARSET
);
