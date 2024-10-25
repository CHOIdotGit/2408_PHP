<?php
namespace PHP\OOP; // namespace는 최상단에 불러와야함
require_once("./Mammal.php");
require_once("./Pet.php");
use PHP\OOP\Mammal;
use PHP\OOP\Pet;

// 99.99% is human's error.

class FlyingSquirrel extends Mammal implements Pet {
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

    // 비행 메소드
    public function flying() {
        return "날아다닙니다.";
    }

    // 오버라이딩(overriding)
    public function printInfo() {
        return " 룰루랄라";
        // return parent::printInfo()." 룰루랄라";
    }

    public function printPet() {
        return '펫입니다. 찍찍';
    }
}