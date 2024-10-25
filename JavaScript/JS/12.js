// -------------------
// 함수 선언식

// 함수는 유지보수를 쉽게 하기 위해서 사용한다.
// 특정 값을 넣었을 때 

// 호이스팅에 영향을 받는다.
// 재할당 가능하므로 함수명 중복 안되게 조심해야 함 -> 가장 큰 문제점
// var와는 다르게 아예 쓰지 말라는 건 아니지만 조심해야한다.
// console.log(mySum(4, 5));
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

// ---------------
// 즉시 실행 함수

const execFnc = (function(a, b) {
    return a + b;
})(5, 6);
// 함수가 설정됨과 동시에 실행됨
// 외부로 부터 데이터 보호 - 캡슐화
// 범위에 대한 보호, 모듈(부품 만들기 위한) 패턴
// 얘를 사용하는 경우는 거의 없다. - 다른 사람의 함수를 가져오는것 정도?

// ------------------------
// 콜백 함수

// 얘는 주구장창 엄청 많이 사용하기 때문에 기억 잘 해야한다.
// 다른 함수의 파라미터로 전달되어 특정 조건에 따라 호출되는 함수
// 결국 모듈화 하기 위함

function myCallBack() {
    console.log('myCallBack');
}

function myChkPrint(callBack, flg) {
    if(flg) {
        callBack();
    }
}

if(flg) {
    myCallBack();
}
// 얘를 유지보수 측면에서 myChkPrint(callBack, true);
// 만 들고 오면 되고 고칠 때는 함수만 바꾸면 일일이 다 수정하지 않아도 된다.
// 함수 자체의 의미는 사라지지는 않고 어느 시점에서 호출되고, 어떻게 사용되는가에 따라 이름만 달라진다.

myChkPrint(() => 'ttt', true);
// 일회성 같은 느낌으로 사용한다(?)