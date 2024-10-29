// -----------------
// String 객체

// string : 문자열, 순서가 있는 객체는 length라는 프로퍼티가 있다.
let str = '문자열입니다.문자열입니다.';
let str2 = new String('문자열입니다.'); // 원래 이런 모양이다.

let str3 = '문자' + '테스트' + str + '이었다.';
let str4 = `문자테스트${str}이었다.`;

// length : 문자열의 길이를 반환
console.log(str.length);

// charAt(idx) : 해당 인덱스의 문자를 반환
console.log(str.charAt(2));

// indexOf() : 문자열에서 해당 문자열을 찾아 최초의 인덱스를 반환
// 해당 문자열이 없으면 -1 리턴
console.log(str.indexOf('자열')); // 1리턴 - 제일 앞의 문자열의 번호 리턴
console.log(str.indexOf('자열', 5));

// includes() : 문자열에서 해당 문자열의 존재 여부 체크
console.log(str.includes('문자')); // true
console.log(str.includes('php')); // false

let test = 'i am ironman'; 
test.includes('ir'); // true, 공백도 인식한다.

// replace() : 특정 문자열을 찾아서 첫번째 문자열만 지정한 문자열로 치환한 문자열을 반환
// 원본은 바뀌지 않고 맨 앞의 문자열을 바꾼다.
str = '문자열입니다.문자열입니다.';
console.log(str.replace('문자열', 'PHP')); //PHP입니다.문자열입니다.

// replaceAll() : 특정 문자열을 찾아서 모두 지정한 문자열로 치환한 문자열을 반환
console.log(str.replaceAll('문자열', 'PHP')); // PHP입니다.PHP입니다.
// str.replaceAll('문자열', ' ') << 공백을 넣어 해당 문자열을 지울 수도 있다. 

// substring(start, end) : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환한다.
// endIndex는 생략 시 startIndex부터 끝까지의 문자열을 반환한다.
console.log(str.substring(1, 3)); // 자열 / 해당 번호의 앞에서 자름

str = 'bearer: 3lqkwla9fasf3228OIHDAAIF'
console.log(str.substring(8));
// 주의사항 : String.substr() 이 있으나 현재 비표준으로 사용을 지양할 것 
// 버그가 일어날 가능성이 매우 크며(사용은 가능함) JS측에서도 책임지지 않는다.

// split(separator, limit) : 문자열을 separator 기준으로 잘라서 배열을 만들어 반환한다.
str= '짜장면, 탕수육, 라조기, 짬뽕, 볶음밥';
let arrSplit = str.split(', ');
let arrSplit2 = str.split(', ' , 2); // 보통 제한을 거는 경우는 거의 없다.
console.log(arrSplit);
console.log(arrSplit2);

// trim() : 좌우 공백 제거해서 반환
str = '        아, 점심시간 언제야...';
console.log(str.trim());

// toUpperCase(), toLowerCase() : 알파벳을 대/소문자로 변환해서 반환한다.
str = 'aBcDeFg';
console.log(str.toUpperCase());
console.log(str.toLowerCase());