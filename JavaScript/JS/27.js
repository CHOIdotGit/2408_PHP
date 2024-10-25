// 배열(Array) 객체

// 배열 - PHP의 개념과 사뭇 다르다 - PHP는 아무 데이터나 다 담을 수 있고 순서가 정해져 있지 않다.

// JS의 배열은 순서가 정해져 있는 데이터 타입(손 댈 수 없음)

const ARR1 = [1, 'two', 3, 'four', 5];


// push*()
// 원본 배열의 마지막 요소를 추가. 리턴 값으로 변경된 length를 알려준다.
// 배열에서 새로운 요소 추가(맨 뒤에 추가됨) php에서는 '->' 였지만 JS는 '.'이다.
ARR1.push(10);

// length
// 배열의 길이 획득(메소드가 아닌 프로퍼티이기 때문에 괄호가 없음)
console.log(ARR1.length);


// isArray()
// 배열인지 아닌지 체크해 주는 함수
console.log(Array.isArray(ARR1)); // true
console.log(Array.isArray(1)); // false