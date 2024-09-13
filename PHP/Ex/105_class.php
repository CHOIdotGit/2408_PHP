<?php

// Class : 동종의 객체들을 모아 정의한 것
// 관습적으로 파일명과 클래스명을 동일하게 지어준다.
// + 객체 지향 프로그래밍을 하기 위한 최소의 단위
// 클래스마다 파일을 만들어줘야한다.

// OOP : Object Oriented Programming / 소규모 프로젝트에 적합하지 않음

// require_once("./Whale.php");

// 인스터스화
// 클래스가 하나의 객체 - 컴퓨터 메모리에 저장(소스 코드는 메모리 저장X)
// $whale = new Whale();

// Class의 메소드(method) 사용
// $whale->breath(); // << 얘 사용법이 중요함

// 프로퍼티 접근
// echo $whale->name; // public. 내/외부 접근 가능
// echo $whale->age; // private. 외부에서 접근 불가
// echo $whale->info();

// 메소드 접근 지시자 사용가능

// 캡슐화 - 데이터를 외부로부터 은닉, 보호

// 프로퍼티와 메소드는 인스턴스화를 거쳐야만 사용 가능

// 스태틱 맴버에 접근
// Whale::myStatic();

require_once("./Shark.php");
// 상어 클래스
$shark = new Shark("아기 상어 뚜루루 뚜뚜");
echo $shark->name;   // << 얘 사용 방법은 기억하기