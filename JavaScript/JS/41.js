// -----------------
// 타이머 함수

// setTimeout( callback, msec ) : 일정 시간이 흐른 후에 콜백 함수를 실행(계속 실행되는 것이 아님 딱 한번만 실행됨)
// 비동기 처리
// setTimeout(() => {
//     // console.log('시간초과');
// }, 5000); // 5초
// 굉장히 조심해서 사용해야 한다.
// 예시
// setTimeout(() => console.log('A'), 1000)
// setTimeout(() => console.log('B'), 2000)
// setTimeout(() => console.log('C'), 3000)
// setTimeout(() => console.log('F'), 6000)
// setTimeout(() => console.log('E'), 5000)
// setTimeout(() => console.log('D'), 4000)
// JS는 동기와 비동기 처리가 있음
// 동기는 1초 후 A가 찍히고 그 후 2초가 지난 3초에 B가, 그 후 3초가 지난 6초에 C가 출력 된다.
// setTimeout은 비동기 처리라서 위 콘슬은 1초에 A 2초에 B 3초에 C가 출력 된다.
// 이전의 처리를 기다리지 않음
// 그래서 비동기 처리는 잘 못 제어하면 버그가 와장창 일어난다.

// setTimeout(() => {
//     console.log('A'); 
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000)
//     }, 2000)
// }, 3000);
// A가 3초 후에 찍히고 그 후 2초가 지나 5초에 B, 그후 1초 지나 6초에 C가 출력된다.
// 콜백지옥으로 영어로 callBack hell이라고 한다
// 위는 비동기 방식을 억지로 몸 비틀어 가며 동기 방식으로 바꾸는 것


// clearTimeout(timerId) : 해당 타이머 ID의 처리를 제거한다.
// const TIMER_ID = setTimeout(() => console.log('타이머'), 10000);
// console.log(TIMER_ID); // 타이머 ID 조회 / ID 조회 후 clearTimeout으로 제거
// clearTimeout(TIMER_ID); // setTimeout(() => console.log('타이머'), 10000); << 이 처리를 없애는 것


// setInterval(callback, msec) : 일정 시간 마다 콜백함수를 실행
// const INTERVAL_ID = setInterval(() => {
//     console.log('인터벌');
// }, 1000);

// clearInterval(timerId) : 해당 ID의 인터벌을 제거한다.
// clearInterval(INTERVAL_ID);
// setTimeout(() => clearInterval(INTERVAL_ID), 10000);

// html을 건드리지 않고 두둥등장이 화면에 나오는데
// 1초마다 빨강과 파란색을 바꾸도록
// const H1 = document.createElement('h1');
// const TEXT = document.createTextNode('두둥등장');
// H1.appendChild(TEXT);
// 위 두 줄을 하나로 줄이는 방법 
// H1.textContent = '두둥등장';
// H1.classList.add('blue');
// document.body.appendChild(H1);

(() => {
    const H1 = document.createElement('h1');
    H1.textContent = '두둥등장';
    H1.classList.add('blue');
    H1.style.fontSize = '5rem';
    document.body.appendChild(H1);
})();

setInterval(() => {
    const H1 = document.querySelector('h1');
    H1.classList.toggle('blue');
    H1.classList.toggle('red');
}, 500)







// (ↀДↀ)  (ↀДↀ)✧
// const P1 = document.createElement('p');
// P1.textContent = '(ↀДↀ)';
// const P2 = document.createElement('p');
// P2.textContent = '(ↀДↀ)✧';
const KAMOJI1 = '(ノ^o^)ノ';  
const KAMOJI2 = '( °ᗝ° )<span style="color: yellow;">.ᐟ.ᐟ</span>';
(()=>{
    const P = document.createElement('p');
    P.innerHTML = KAMOJI1;
    P.style.fontSize = '5rem';
    document.body.appendChild(P);
})();
setInterval(() => {
    const P = document.querySelector('p');
    if(P.innerHTML === KAMOJI1) {
        P.innerHTML = KAMOJI2;
    } else {
        P.innerHTML = KAMOJI1;
    }
}, 800);


// H1.classList.add('title');
// const TITLE = document.querySelector('.title');


// 나의 온 몸 비틀기
// setInterval(() => {
//     H1.style.color = 'blue';
//     setTimeout(() => {
//         H1.style.color = 'red';
//     }, 100);
// }, 200);
// toggle을 이용해서 반짝이 효과를 넣을 수 있다.


// (ↀДↀ) (ↀДↀ)✧