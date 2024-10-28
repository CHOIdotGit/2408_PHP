// 원본은 보존하면서 오름차순 정렬 + 중복된 값 제거
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
const COPY_ARR5 = [...ARR1]; // 내 방식
let resultSort = COPY_ARR5.sort((a, b) => a - b); // 내 방식
console.log(resultSort); // 내 방식
let copyArr1 = [...ARR1]; // 선생님 방식
copyArr1.sort((a, b) => a - b); // 선생님 방식
console.log(copyArr1); // 선생님 방식

// [...new Set(ARR1)].sort((a, b) => a - b); ??

// 중복된 값 제거
// 1. forEach() + includes() << 배열의 특정 요소의 존재여부를 체크하고 boolean 리턴
let dupArr = [];
copyArr1.forEach(val => {
    if(!dupArr.includes(val)) {
        dupArr.push(val);
}
});

// 2. filter() + indexOf() << 배열에서 특정 요소를 검색하고, 해당 인덱스를 반환
let dupArr2 = copyArr1.filter((val, idx) => {
    return copyArr1.indexOf(val) === idx;
});

// 3. Set 객체
let dupArr3 = Array.from(new Set(copyArr1));


// 짝수와 홀수를 분리해서 각각 새로운 배열을 만들어 주세요
const ARR2 = [5, 7, 3, 4, 5, 1, 2];
// 선생님 방식
const ODD = ARR2.filter(num => num % 2 !== 0);
const EVEN = ARR2.filter(num => num % 2 === 0);
console.log(ODD);
console.log(EVEN);

// 내 방식
const COPY_ARR3 = [...ARR2];

let ARR3 = COPY_ARR3.map( num => {
    if(num % 2 !== 0) {
        return num;
    }
});

let ARR4 = COPY_ARR3.map( num => {
    if(num % 2 === 0) {
        return num;
    }
});
// 내가 찾은 방법(undefined가 배열에 포함되어있다)
console.log(ARR3);
console.log(ARR4);

let ARR5 = COPY_ARR3.filter(num => num % 2 !== 0);
let ARR6 = COPY_ARR3.filter(num => num % 2 === 0);
// 정석? 내 것 보다 깔끔함
console.log(ARR5);
console.log(ARR6);