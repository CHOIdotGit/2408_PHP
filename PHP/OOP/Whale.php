<?php
namespace PHP\OOP; // namespace는 최상단에 불러와야함

require_once("./Mammal.php"); // 나중에는 laravel이 자동으로 해줌(만들어야 함. 하지만 만드는 경우는 흔치 않음)
require_once("./Swim.php"); 

use PHP\OOP\Mammal;
use PHP\OOP\Swim;


class Whale extends Mammal implements Swim {
    // private $name;
    // private $residence;

    // // 생성자 - construct
    // public function __construct($name, $residence) {
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }

    // // 정보 출력
    // public function printInfo() {
    //     return $this->name."가 ".$this->residence."에 삽니다.";
    // }

    // 수영 메소드
    public function swimming() {
        return "수영합니다.";
    }
    
    public function printInfo() {
        return "고래고래고래";
    }
}


// 인터페이스는 다중 상속 가능하다.
// 클래스의 사용방법은 확실히 알고 가야한다.
































// 클래스

// class Whale {
//     // 접근 제어 지시자 : public(외부에서 접근, 변경 가능. 캡슐화x), private(외부에서 접근 불가능), protect(외부에서 접근 불가능)
//     // 프로퍼티($name) : 클래스 내부에 정의(선언)된 변수
//     public $name = "고래";
//     private $age = 20;

//     // 생성자 메소드 : ~할 때 딱 한 번 사용함
//     // 무조건 '__construct'(){} << 이 이름으로 만들어야 함
//     // 자동으로 실행 됨 / 아무것도 없는 상태가 디폴트라 이때까지 오류가 없었음
//     public function __construct($name, $age) {
//         $this->name = $name;
//         $this->age = $age;
//         // echo "생성자 실행 됨"."\n";
//     }
//     // 실행하는 이유 : 초기 데이터를 셋팅하기 위해서


//     // 메소드 : 클래스 내부에 정의(선언)된 함수
//     public function breath() {
//         return "숨을 쉽니다.";
//     }

//     public function printInfo() {
//         return $this->name."는 ".$this->age."살 입니다.";
//     }

//     // getter / setter 메소드 (캡슐화. private이라 우회해서 값 세팅)
//     // (private를 외부로 꺼내는 메소드 - 내부의 변수에 저장된 값을 외부로 리턴.), (프로퍼티 변경하기 위함 / setter는 거의 사용하는 일이 없음)
//     public function getAge() {
//         return $this->age;
//     }
//     public function setAge($age) { // 여기의 $age는 외부에서 받은 $age이다.
//         $this->age = $age;
//     }

//     // static method
//     // 인스턴스를 하지 않고 사용할 수 있음 / 콜론 2개, 메소드 명
//     // 전부 다 스태틱으로 만들면 리소스를 많이 차지하여 컴퓨터의 속도가 느려지게 된다.
//     public static function dance() {
//         return "고래가 춤을 춥니다.";
//     }
// }

// echo Whale::dance();

// Whale Instance / 인스턴스화 - 메모리 상에 새로운 것을 넣겠다는 의미
// $whale = new Whale("핑크고래", 40); // 함수나 메소드 호출(실행) 한다는 뜻 -> construct를 실행한다는 뜻
// echo $whale->printInfo()."\n";
// $whale2 = new Whale();

// $whale->age; // << 빨간 밑줄이 생김 = 캡슐화(보호 중)

// echo $whale->printInfo();
// echo $whale->getAge()."\n"; // = 20
// $whale->setAge(30);
// echo $whale->getAge()."\n"; // = 30
// echo $whale2->getAge()."\n"; // = 20
// 동명이인의 개념과 비슷하다. 서로 다른 존재이기 떄문
