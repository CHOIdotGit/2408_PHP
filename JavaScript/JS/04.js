console.log('외부파일');

// JS는 카멜 기법을 이용한다.
// -----------------------------------------------------
// 변수는 3가지 방법으로 선언한다.
// var : 중복 선언 가능, 재할당 가능, 함수레벨(지역) 스코프
var num1 = 1; //최초 선언
var num1 = 2; //중복 선언
num1 = 3; // 재할당

// 프로젝트 작업 시 var를 사용하지 않고 작업 진행
// var가 디폴트로 설정되어 앞에 아무것도 적지 않으면 var가 기본적으로 적용됨

// let(ECMA6) : 중복 선언 불가능, 재할당 가능. 블록레벨 스코프
let num2 = 2; //최초 선언
// let num2 = 3; //중복 선언 불가능
// 개발 시 실수를 줄이기 위해서 let 사용 권장
num2 = 4; // 재할당

// const : 상수(대문자 사용) / 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프, 상수
const NUM3 =3;
// NUM3 = 4; //재할당 불가능


// ---------------------------------------
// 스코프

// 변수나 함수가 유효한 범위
// 전역, 지역, 블록(레벨) 3가지의 스코프

// 전역 레벨 스코프
let globalScope = '전역이다.';

function myPrint() {
    console.log(globalScope);
}

// 지역 레벨 스코프
function myLocalPrint() {
    let localScope = '마이로컬프린트 지역';
    console.log(localScope);
}

// 블록 레벨 스코프
function myBlock() {
    if(true) {
        var test1 = 'var';
        let test2 = 'let';
        const TEST3 = 'const';
    }
    console.log(test1);
    console.log(test2);
    console.log(TEST3);
}

// ------------------------------------
// 호이스팅(hoisting)

// 인터 프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당하는 것
// 집을 짓기 전 집터를 만드는 것과 비슷함
// console.log(test); // 이 상태가 집 터를 만드는 것. undefined
// test = 'aaa';
// console.log(test);
// // var test; // 얘는 그냥 console에서 출력됨. var를 사용해서는 안되는 이유중 하나
// let test;

// ----------------
// 데이터 타입

//number : 숫자 / int가 아닌 number이다.
let num = 1;

// string : 문자열
let str = 'test';

// boolean : 논리(true or false)
let bool = true;

// null : 존재하지 않는 값 / 데이터 타입은 있으나 typeof는 object로 출력됨
let letNull = null;

// undefined : 값이 할당되지 않은 상태 << 얘는 어디다가 쓰나 / 예외 분기 처리
// 일반적으로 사용하는 경우는 거의 없다.
let letUndefined;

// symbol : 고유하고 변경이 불가능한 값
// 객체는 주소값으로 비교하기 때문에 같은 값이라도 false로 나오게 된다.
let symbol1 = Symbol('aaa');
let symbol2 = Symbol('aaa');
// 객체의 맨 앞글자는 대문자로

//object : 객체. 여러 개의 키-값 쌍으로 이루어진 복합 데이터 타입
let obj = {
    'key1': 'val1'
    ,'key2': 'val2'
}
// obj.key1 또는 obj.key2를 적어야 값을 가져옴. obj['key1']도 값을 가져오지만 배열로 사용하지는 않는다.
// key에 홀따옴표를 없애도 작동한다.
// ex) key1: 'val1' / key2: 'val2'