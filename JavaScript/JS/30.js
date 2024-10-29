// -----------------
// Date 객체
const dayToKorean = day => {
    const ARR_DAY = ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'];
    return ARR_DAY[day];
    // switch(day) {
    //     case 0:
    //         return '일요일';
    //     case 1:
    //         return '월요일';
    //     case 2:
    //         return '화요일';
    //     case 3:
    //         return '수요일';
    //     case 4:
    //         return '목요일';
    //     case 5:
    //         return '금요일';
    //     default:
    //         return '토요일';
    // }
}

const addLpadZero = (num, length) => {
    return String(num).padStart(length, '0');
}

// 현재 날짜 및 시간 획득
const NOW = new Date(); // new가 인스턴스화
const TEST = new Date('1990-01-01 00:00:00');
console.log(NOW);

// 개선 ? 
NOW.toLocaleDateString(); // 2024. 10. 29
NOW.toLocaleString(); // 2024. 10. 29. 19:22:15
// 위 두가지를 사용하는 일은 없음
// 시:분:초 연.월.일 다 따로 구해서 조립함


// getFullYear() : 연도만 가져오는 메소드(YYYY)
const YEAR = NOW.getFullYear();
const YEAR2 = TEST.getFullYear();
console.log(YEAR);
// getYear()는 2000년 이전에 사용하던 메소드라서 사용하면 버그가 발생해 더이상 사용하지 않는다.


// getMonth() : 월을 가져오는 메소드(MM)
const MONTH = NOW.getMonth() + 1; // 0번 방에 1월이 들어가기 때문? 아니면 i가 i = 0; i < 12 이기 때문?
console.log(MONTH);
// const MONTH = String(NOW.getMonth() + 1).padStart(2, '0');
// const MONTH = addLpadZero(NOW.getMonth() + 1, 2);


// getDate() : 일을 가져오는 메소드(DD)
const DATE = NOW.getDate();
console.log(DATE);


// getHours() : 시간을 가져오는 메소드
const HOUR = NOW.getHours();

// getMinutes() : 분을 가져오는 메소드
const MINUTE = NOW.getMinutes();

// getSeconds() : 초를 가져오는 메소드
const SECOND = NOW.getSeconds();

// getMilliseconds() : 미리 초를 가져오는 메소드
const MILLISECOND = NOW.getMilliseconds();
// const MILLISECOND = addLpadZero(NOW.getMilliseconds(), 3);

// getDay() : 요일을 가져오는 메소드, 0(일요일) ~ 6(토요일) 리턴
const DAY = NOW.getDay();


const FORMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${HOUR}:${MINUTE}:${SECOND}.${MILLISECOND}, ${dayToKorean(DAY)}`;
console.log(FORMAT_DATE);


// getTime() : UNIX Timestamp를 반환하는 메소드 (미리 초 단위)
console.log(NOW.getTime());

// 두 날짜의 차를 구하는 방법
const TARGET_DATE = new Date('2025-03-13 18:10:00');
const DIFF_DATE = Math.floor(Math.abs(NOW - TARGET_DATE) / 86400000)
// 1000 * 60 * 60 * 24 = 86400000


// 2024-01-01 13:00:00과 2025-05-30 00:00:00은 몇 개월 후 입니까?
const JAN = new Date('2024-01-01 00:00:00');
const MAY = new Date('2025-05-30 00:00:00');
const DIFF_MONTH = Math.floor(Math.abs(JAN - MAY) / 86400000 / 30);
// 17개월 후

// 현업에서 정확히 계산하기 위해 년-월-일 시:분:초를 다 구하고 나열한다.


const days = ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'];
console.log(days[DAY]);

// 코드 보완 1
// const DAY = NOW.getDay();
// const days = ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'];
// console.log(days[DAY] || '요일 정보가 없습니다.');

// 코드 보완 2
// const DAY = NOW.getDay();
// const days = ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'];
// if (DAY >= 0 && DAY <= 6) {
//   console.log(days[DAY]);
// } else {
//   console.log('요일 정보가 없습니다.');
// }

// DAY 변수의 값이 0부터 6까지의 범위인지 확인하고, 
// 범위 내에 있으면 days 배열의 요소를 출력합니다. 
// 범위를 벗어나면 '요일 정보가 없습니다.'라는 문자열을 출력합니다.
