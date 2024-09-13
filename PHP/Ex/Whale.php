<?php

class Whale {
    // 프로퍼티 - C#에서는 필드?
    // 클래스 내에 선언하는 변수
    // 클래스 이름 맨 앞 글자는 대문자!!
    
    // 접근 제어 지시자
    // public : class 내/외부 어디에서나 접근 가능하다.
    public $name = "\n이름: 고래,";
    // private : class 외부에서 접근할 수 없다. 내부에서만 접근 가능
    private $age = 30;
    // protected : class 내부 및 상속 관계에서 접근 가능(외부에서 접근 불가)
    protected $gender;

    // 메소드(method)
    function breath() {
        echo "숨을 쉽니다. (끄덕)\n";
    }

    function info() {
        // $this참조 변수 : (같은)class 내의 프로퍼티나 메소드에
        // 접근하기 위해 사용하는 참조 변수
        echo " 나이: ".$this->age;
    }

    // static 메소드 / 정적 메소드
    // 인스턴스화를 거치지 않아도 사용(출력) 가능
    public static function myStatic() {
        echo "스태틱 메소드";
    }
    // 스태틱 앞 퍼블릭은 관습 - 자동으로 적용된다.
}
// 클래스에 속한 프로퍼티와 메소드를 멤버라고 한다.
// echo로 먼저 "나이"를 출력하려 해도 $this로 불러온 것이 먼저 선출력된다.