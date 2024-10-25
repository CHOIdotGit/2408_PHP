<?php
namespace PHP\OOP;

// 추상 클래스 - Mammal
abstract class Mammal {
    private $name;
    private $residence;

    //  생성자 - construct (강제성x)
    public function __construct($name, $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }

    // 추상 메소드
    abstract public function printInfo();
}

// class Mammal {
//     private $name;
//     private $residence;
    
//     // 생성자 - construct
//     public function __construct($name, $residence) {
//         $this->name = $name;
//         $this->residence = $residence;
//     }

//     // 정보 출력
//     // final public function printInfo() {
//     public function printInfo() {
//         return $this->name."가 ".$this->residence."에 삽니다.";
//     }
// }

// 소스코드의 표준화 \ 다형성(이런 것이 있다 정도만) \ 