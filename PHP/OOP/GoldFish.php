<?php
namespace PHP\OOP;

require_once('./Swim.php');
require_once('./Pet.php');

use PHP\OOP\Swim;
use PHP\OOP\Pet;

class GoldFish implements Swim, Pet { 
    // interface는 implement(구현)을 사용한다. 또한, 다중상속 가능하다.
    private $name = '금붕어';

    public function swimming() {
        return '수영합니다.';
    }
    public function printPet() {
        return '펫입니다. 첨벙첨벙';
    }
}