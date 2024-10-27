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