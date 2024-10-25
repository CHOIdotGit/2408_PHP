<?php
namespace PHP\OOP;

interface Swim { // 추상 메소드 밖에 없음 \ 클래스가 아닌 '인터페이스'
    // 인터페이스가 조립설명서와 유사하다고 생각하면 이해하는데 한결 괜찮아진다
    public function swimming(); // 앞에 abstract 키워드 없어도 됨
}