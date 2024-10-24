// -------------------
// 함수 선언식

// 함수는 유지보수를 쉽게 하기 위해서 사용한다.
// 특정 값을 넣었을 때 

// 호이스팅에 영향을 받는다.
// 재할당 가능하므로 함수명 중복 안되게 조심해야 함 -> 가장 큰 문제점
// var와는 다르게 아예 쓰지 말라는 건 아니지만 조심해야한다.
console.log(mySum(4, 5));
// 밑에 함수를 선언하고 위에서 값을 넣어도 작동 하니까 조심해야하는 것.

function mySum(a, b) {
    return a + b;
}

// ------------------
// 함수 표현식

// 호이스팅에 영향을 받지 않는다.
// 재할당 방지 - const(상수)로 인해 방지됨 / let, var 들어가지만 const를 사용

// 익명 함수 - 함수의 이름이 없음
// 익명 함수를 myPlus라는 변수에 저장
const myPlus = function(a, b) {
    return a + b;
}

myPlus(1, 2);

// --------------------
// 화살표 함수

// 짧게 적기 위해서 나온 문법 / 현업에서도 많이 사용한다.
// 파라미터가 2개 이상일 경우(소괄호 생략 불가)
const arrowFnc = (a, b) => a + b;
 function test1(a, b) {
    return a + b;
 }

// const OBJ1 = {
//     key1: 1
//     ,mySum: (a, b) => a + b
// }
// OBJ1.mySum(1, 2);

// 파라미터가 1개일 경우(소괄호 생략 가능)
const arrowFnc2 = a => a;
function test2(a) {
    return a;
 }

// 파라미터가 없는 경우(소괄호 생략 불가)
const arrowFnc3 = () => 'test';
function test3() {
    return 'test';
 }

//  처리가 여러 줄일 경우
const arrowFnc4 = (a, b) => {
    if(a < b) {
        return 'b가 더 큼';
    } else {
        return 'a가 더 큼';
    }
}

function test4(a, b) {
    if(a < b) {
        return 'b가 더 큼';
    } else {
        return 'a가 더 큼';
    }
}

Function