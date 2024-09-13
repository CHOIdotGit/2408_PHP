<?php

class Shark {
    public $name; // << 얘는 $this의 name이다. + 지역 영역 스코프

    // 생성자(Construct)
    // ** 객체를 인스턴스화 할 때, 딱 한 번만 실행되는 메소드
    public function __construct($name) {
        $this->name = $name;
    }
}

// 하나의 클래스 범위가 맴버 필드?