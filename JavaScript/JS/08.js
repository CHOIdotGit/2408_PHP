// if문
let num = 1;
if(num === 1) {
    console.log('1등');
}else if(num === 2) {
    console.log('2등');
}else if(num === 3) {
    console.log('3등');
}else {
    console.log('등수 외');
}

//  switch문
switch(num) {
    case 1:
        console.log('1등');
        break;
    case 2:
        console.log('2등');
        break;
    default:
        console.log('순위 외');
        break;
}

// for 문
// 구구단 2~9단
for(let i = 2; i < 10; i++) {
    console.log('** ' + i + '단' + ' **');
    for(let j = 1; j < 10; j++) {
        console.log(i + ' X ' + j + ' = ' + (i*j));
    }
}

// 삼각형
let str = '';
for(let a = 0; a < 5; a++) {
    for(let b = 5; b > 0; b--) {
        if(b - a > 1) {
           str += ' ';
        }
        else {
            str += '*';
        }
    }
    str += "\n";
}
console.log(str);

// 역삼각형
let str1 = '';
for(let c = 1; c <= 5; c++) {
    for(let d = 5; d >= 0; d--) {
        if(d <= c) {
           str1 += ' ';
        }
        else {
            str1 += '*';
        }
    }
    str1 += "\n";
}
console.log(str1);

// while, do_while은 건너뜀

// for...in : 루프. 모든 객체를 반복하는 문법m key를 가져와서 사용 - key에 접근
const OBJ2 = {
    key1: 'val1'
    ,key2: 'val2'
}

for(let key in OBJ2) {
    console.log(OBJ2[key]);
}


// for...of : 루프. 이터러블(iterable) 객체를 반복하는 문법(순서가 정해져있다)
const STR1 = '안녕하세요';

for(let val of STR1) {
    console.log(val);
}
// JS에서 length 속성이 있는 개체는 이터러블 객체이다.
// 변수명 뒤에 .length를 붙여서 검색할때 값이 나오면 이터러블 객체