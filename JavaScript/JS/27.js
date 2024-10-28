// 배열(Array) 객체

// 배열 - PHP의 개념과 사뭇 다르다 - PHP는 아무 데이터나 다 담을 수 있고 순서가 정해져 있지 않다.

// JS의 배열은 순서가 정해져 있는 데이터 타입(손 댈 수 없음)

const ARR1 = [1, 'two', 3, 'four', 5]; //ARR2가 길어서 생략하면 이렇게 된다.
const ARR2 = new Array(1, 'two', 3, 'four', 5); // 배열 선언의 정석.


// push*()
// 원본 배열의 마지막 요소를 추가. 리턴 값으로 변경된 length를 알려준다.
// 배열에서 새로운 요소 추가(맨 뒤에 추가됨) php에서는 '->' 였지만 JS는 '.'이다. / 원본이 변경된다.
ARR1.push(10);

// length
// 배열의 길이 획득(메소드가 아닌 프로퍼티이기 때문에 괄호가 없음)
console.log(ARR1.length);


// isArray()
// 배열인지 아닌지 체크해 주는 함수
console.log(Array.isArray(ARR1)); // true
console.log(Array.isArray(1)); // false

// indexOf()
// 배열에서 특정 요소를 검색하고, 해당 인덱스를 반환한다. = 찾는 요소의 인덱스를 찾아 주는 함수
// 해당 값(요소)이 없을 때 -1을 반환한다. 
let i = ARR1.indexOf(4);
console.log(i);

// includes()
// 배열의 특정 요소의 존재여부를 체크하고 boolean 리턴
let arr1 = ['홍길동', '갑순이', '갑돌이']
let boo = arr1.includes('갑순이');
console.log(boo);

// push()
// 원본 배열의 마지막 요소를 추가한다. 리턴은 변경된 length, 원본 변경
ARR1.push(20);
ARR1.push(30, 40, 50);
// 성능이슈 발생 시 length를 이용해서 직접 요소를 추가할 것
ARR1[ARR1.length] = 100;
// 유저의 컴퓨터 성능에 의존한 언어라서 

// 배열 복사
// 객체는 기본적으로 얕은 복사가 되므로 deep copy를 하기 위해서 Spread Operator를 이용해야한다.

// 얕은 복사, shallow copy
// 주소를 가져와서 복사. 원본 보호 불가능 - 원본 값을 수정하는 행위가 되어버림
const COPY_ARR1 = ARR1;
COPY_ARR1.push(9999);
// 기존에 있던 값을 참조하여 만들어짐 / 위험한 방식이다.
// 객체는 참조로 전달되어서 값 자체를 복사하는 것이 아니다.

// 깊은 복사, deep copy
// 값 자체를 따로 가져와서 복사한다. 원본 보호 가능
const COPY_ARR2 = [...ARR1];
COPY_ARR2.push(8888);

// pop()
// 원본 배열의 마지막 요소를 제거, 제거된 요소를 반환, 원본 변경
// 제거할 요소가 없으면 undefined를 반환
const ARR_POP = [1, 2, 3, 4, 5];
let result_pop = ARR_POP.pop();
console.log(result_pop);
// 콘솔로 찍는 것과 ARR_POP.pop(); << 얘만 사용하는 것은 다른 결과물을 가져온다.


// unshift()
// 원본 배열의 첫번째 요소를 추가한다. 변경된 length를 반환, 원본 변경됨
const ARR_UNSHIFT = [1, 2, 3];
let resultUnshift = ARR_UNSHIFT.unshift(100);
console.log(resultUnshift);
ARR_UNSHIFT.unshift(200, 300, 400); // 여러개도 추가 가능

// shift()
// 원본 배열의 첫번째 요소를 제거, 제거된 요소를 반환, 원본 변경됨
// 제거할 요소가 없으면 undefined를 반환
const ARR_SHIFT = [1, 2, 3, 4];
let resultShift = ARR_SHIFT.shift();
console.log(resultShift);

// splice()
// 요소를 잘라서 자른 배열을 반환, 원본 변경
let arrSplice = [1, 2, 3, 4, 5];
let resultSplice = arrSplice.splice(2);
console.log(resultSplice);
console.log(arrSplice);
// 시작을 음수로 할 경우
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(-2);
console.log(resultSplice);
console.log(arrSplice);

// start, count를 모두 셋팅할 경우
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(1, 2);
console.log(resultSplice);
console.log(arrSplice);

// 배열의 특정 위치에 새로운 요소 추가
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 0, 999, 888); // 여러개 하고싶다면 세번째 파라미터에서 콤마하고 추가하면 됨
console.log(resultSplice);
console.log(arrSplice);

// 배열에서 특정 요소를 새로운 요소로 변경
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 1, 999); // (삭제할 지점, 개수, 추가할 요소)
console.log(resultSplice);
console.log(arrSplice);

// join()
// 배열의 요소들을 특정 구분자로 연결한 문자열(string)을 반환한다.
let arrJoin = [1, 2, 3, 4];
let resultJoin = arrJoin.join(', ');
console.log(resultJoin);
console.log(arrJoin);

// sort() - 원하는 값만 바꿔서 전부를 출력
// 배열의 요소를 오름차순으로 정렬한다. 결과도 리턴하고 원본도 정렬된다.
// 파라미터를 전달하지 않을 경우, 문자열로 변환 후 정렬한다.
// 요소가 단순 숫자만 존재할 때 sort만 쓰는것이 아닌 콜백함수도 같이 사용해야한다.
let arrSort = [5, 6, 7, 3, 2, 20];
// let resultSort = arrSort.sort();
// console.log(resultSort);
// console.log(arrSort);
let resultSort = arrSort.sort((a, b) => a - b);
// arrSort.sort((a, b) => a - b)에서 음수가 반환되면 위치를 바꾸지 않고 양수면 위치를 바꾸는 것을 계속 반복한다.
// arrSort.sort((a, b) => a - b)에서 arrSort.sort((a, b) => b - a) 로 바꾸면 내림차순으로 변경되며 위의 설명과 반대이다.
console.log(resultSort);
console.log(arrSort);
// 보통 PHP나 JS에서 sort하는 경우는 잘 없고 DB에서 정렬한다.

// map() - 상당히 자주 사용함 / 원본 변경x
// 배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후, 그 결과를 새로운 배열로 반환
let arrMap = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// 3, 6, 9 대신 짝을 출력하고 싶을 때
let resultMap = arrMap.map(num => {
    if(num % 3 === 0) {
        return '짝';
    } else {
        return num;
    }
});
console.log(resultMap);
console.log(arrMap);

// 콜백함수 - 지금 당장 실행시키는 것이 아닌 나중에 특정 조건에서 실행시켜라 라고 위임하는 것

function myCallBack(a, b) {
    return a + b;
}

function test(callback, flg) {
    if(flg) {
        callback();
    } else {
        console.log('콜백 실행 안됨');
    }
}

const TEST =  {
    entity: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    ,length: 10
    ,map: function(callback) { // callback = testCallBack
        let resultArr = [];

        for(let i = 0; i < this.entity.length; i++) {
            resultArr[resultArr.length] = callback(this.entity[i]); // testCallBack을 호출하는 것임(밑의 testCallback 설명중)
        }
        return resultArr;
    }
}

let resultTest = TEST.map( num => {
    if(num % 3 === 0) {
        return '짝';
    } else {
        return num;
    }
});
// let resultTest = TEST.map(testcallback);  << 이렇게

function testCallback(num) {
    if(num % 3 === 0) {
        return '짝';
    } else {
        return num;
    }
}

// filter() - 원하는 값만 바꿔서 해당 값만 출력
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고, 조건에 만족한 요소만 배열로 반환
let arrFilter = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let resultFilter = arrFilter.filter(num => num % 3 === 0);
// 3의 배수와 4의 배수를 동시에 반환
let resultFilter2 = arrFilter.filter(num => {
    if(num % 3 === 0 || num % 4 === 0) {
        return true;
    } else {
        return false;
    }
}); // true일때 boolean으로 저장?

// some()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고,
// 조건에 만족하는 결과가 하나라도 있으면 true, 하나도 없으면 false를 리턴
let arrSome = [1, 2, 3, 4, 5];
let resultSome = arrSome.some(num => num === 5);
console.log(resultSome);

// every()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고,
// 조건에 모든 결과가 만족하면 true, 하나라도 만족하지 않으면 false를 리턴
let arrEvery = [1, 2, 3, 4, 5];
let resultEvery = arrEvery.every(num => num <= 5);
console.log(resultEvery);

// 상황에 알맞게 some이나 every를 취사 선택하면 된다.

// forEach()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행, 원본 건드리지 않고 결과값만 바뀜
let arrForeach = [1, 2, 3, 4, 5];
arrForeach.forEach((val, idx) => {
    // console.log(idx + ' : ' + val);
    console.log(`${idx} : ${val}`); // 227번 라인과 결과는 동일하다
});