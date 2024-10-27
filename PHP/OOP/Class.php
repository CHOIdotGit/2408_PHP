<?php

// 클래스 : 객체를 정의하는 틀
// 속성-프로퍼티(변수)와 메소드(함수)를 가질 수 있다.

class Whale {
    // 접근 제어 지시자 : public(외부에서 접근, 변경 가능. 캡슐화x), private(외부에서 접근 불가능), protect(외부에서 접근 불가능)
    // 프로퍼티($name) : 클래스 내부에 정의(선언)된 변수
    public $name = "고래";
    private $age = 20;

    // 생성자 메소드 : 클래스의 인스턴스가 생성될 때 자동으로 호출되는 메소드(~할 때 딱 한 번 사용함)
    // 무조건 '__construct'(){} << 이 이름으로 만들어야 함
    // 자동으로 실행 됨 / 아무것도 없는 상태가 디폴트라 PHP에서 이때까지 오류가 없었음
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
        // echo "생성자 실행 됨"."\n";
    }
    // 실행하는 이유 : 초기 데이터를 셋팅하기 위해서


    // 메소드 : 클래스 내부에 정의(선언)된 함수
    public function breath() {
        return "숨을 쉽니다.";
    }

    public function printInfo() {
        return $this->name."는 ".$this->age."살 입니다.";
    }

    // getter / setter 메소드 (캡슐화. private이라 우회해서 값 세팅)
    // (private를 외부로 꺼내는 메소드 - 내부의 변수에 저장된 값을 외부로 리턴.), (프로퍼티 변경하기 위함 / setter는 거의 사용하는 일이 없음)
    public function getAge() {
        return $this->age;
    }
    public function setAge($age) { // 여기의 $age는 외부에서 받은 $age이다.
        $this->age = $age;
    }

    // static method
    // 인스턴스를 하지 않고 사용할 수 있음 / 콜론 2개, 메소드 명
    // 전부 다 스태틱으로 만들면 리소스를 많이 차지하여 컴퓨터의 속도가 느려지게 된다.
    public static function dance() {
        return "고래가 춤을 춥니다.";
    }
}

echo Whale::dance();

// Whale Instance / 인스턴스화 - 메모리 상에 새로운 것을 넣겠다는 의미
$whale = new Whale("핑크고래", 40); // 함수나 메소드 호출(실행) 한다는 뜻 -> construct를 실행한다는 뜻
echo $whale->printInfo()."\n";
$whale2 = new Whale("돌고래", 20);

$whale->age; // << 빨간 밑줄이 생김 = 캡슐화(보호 중)

echo $whale->printInfo();
echo $whale->getAge()."\n"; // = 20
$whale->setAge(30);
echo $whale->getAge()."\n"; // = 30
echo $whale2->getAge()."\n"; // = 20
// 동명이인의 개념과 비슷하다. 서로 다른 존재이기 떄문