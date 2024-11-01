// const H1 = document.createElement('h1');
// H1.textContent = '현재 시간';


// function clock() {

//     let TIMEWARD = '';

//     if(HOUR > 12) {
//         TIMEWARD = ' 오후 ';
//         HOUR - 12;
//     } else {
//         TIMEWARD = ' 오전 ';
//     }
//     TIMEWARD += `${MINUTE < 10 ? '0' : ''}${MINUTE}:${SECOND < 10 ? '0' : ''}${SECOND}`;

//     H1.textContent = `현재 시간 ${TIMEWARD}}`
// }
// clock();

// setInterval(clock, 1000);

const NOW = new Date();
const HOURS = NOW.getHours();
const MINUTES = NOW.getMinutes();
const SECOND = NOW.getSeconds();

const CLOCK = HOURS >= 12 ? ' 오후 ' : ' 오전 ';

const TIME = `${CLOCK} ${HOURS % 12 || 12}:${MINUTES.toString().padStart(2, '0')}:${SECOND.toString().padStart(2, '0')}`;

console.log(TIME);

// 1초마다 갱신되는 시간
(() => {
    const H2 = document.createElement('h2');
    // H2.textContent = '현재 시간' + TIME;
    H2.style.fontSize = '3rem';
    H2.style.fontWeight = '500';
    document.body.appendChild(H2);

    function updateTime() {
        const NOW = new Date();
        const HOURS = NOW.getHours();
        const MINUTES = NOW.getMinutes();
        const SECOND = NOW.getSeconds();
        const CLOCK = HOURS >= 12 ? ' 오후 ' : ' 오전 ';
        const TIME = `${CLOCK} ${HOURS % 12 || 12}:${MINUTES.toString().padStart(2, '0')}:${SECOND.toString().padStart(2, '0')}`;
        H2.textContent = '현재 시간' + TIME;
    }
    updateTime(); // 시간 업데이트 함수
    let FLOW = setInterval(updateTime, 1000); // 1초마다 업데이트

    // 멈춰 버튼
    const STOP_BTN = document.createElement('button');
    STOP_BTN.textContent = '멈춰';
    document.body.appendChild(STOP_BTN); // 해당 부모 노드의 마지막 자식으로 노드를 추가한다.
    STOP_BTN.style.fontSize = '2rem';
    STOP_BTN.addEventListener('click', () => {
        clearInterval(FLOW)
        FLOW = null;
    });
    // STOP_BTN.removeEventListener('click', () => setInterval(updateTime, 1000));

    // function removeRestart() {
        
        // RESTART_BTN.removeEventListener('click', () => setInterval(updateTime, 1000));

    // }

    // 재시작 버튼
    const RESTART_BTN = document.createElement('button');
    RESTART_BTN.textContent = '재시작';
    document.body.appendChild(RESTART_BTN);
    RESTART_BTN.style.fontSize = '2rem';
    RESTART_BTN.style.marginLeft = '1rem';
    RESTART_BTN.addEventListener('click', () => {
        if(FLOW === null) {
            FLOW = setInterval(updateTime, 1000);
        }
    });

    // hr선
    const HR = document.createElement('hr');
    document.body.appendChild(HR);

    // 시작 버튼
    const START_BTN = document.createElement('button');
    START_BTN.textContent = '시작';
    document.body.appendChild(START_BTN);
    START_BTN.style.fontSize = '1.5rem';


    // 기록 버튼
    const REC_BTN = document.createElement('button');
    REC_BTN.textContent = '기록';
    document.body.appendChild(REC_BTN);
    REC_BTN.style.fontSize = '1.5rem';
    REC_BTN.style.marginLeft = '1rem';

    // 리셋 버튼
    const RESET_BTN = document.createElement('button');
    RESET_BTN.textContent = '리셋';
    document.body.appendChild(RESET_BTN);
    RESET_BTN.style.fontSize = '1.5rem';
    RESET_BTN.style.marginLeft = '1rem';


})();


// ----------------------------------------------
// 선생님과 같이 만들어 보는 시간

// function leftPadZero(target, length) {
//     return String(target).padStart(length, '0');
// } // 숫자 앞에 0을 붙이기 위함

// function getDate() {
//     const NOW = new Date();
//     let hour = NOW.getHours(); // 시간 획득 (24시 포멧)
//     let minute = NOW.getMinutes(); // 분 획득
//     let second = NOW.getSeconds(); // 초 획득
//     let ampm = hour < 12 ? '오전' : '오후'; // 오전 오후 구분
//     let hour12 = hour > 12 ? hour : hour -12; // 시간 (12시 포멧)

//     let timeFormat = 
//         `${ampm} ${leftPadZero(hour12, 2)}:${leftPadZero(minute, 2)}:${leftPadZero(second, 2)}`;
//         // 두 자리 숫자면 0을 붙이지 않고 한 자리 숫자면 0을 붙인다.
    
//     document.querySelector('#time').textContent = timeFormat;
// }

// (() + {
// getDate();
// let intervalId = null;
// JS에서 setInterval은 거의 사용하지 않는다. 시계같은 것을 보여주는 용도를 제외하면.
// intervalId = setInterval(getDate, 500); // 1000(1초)로 설정한다면 나중에 0.03초씩 밀린 것 때문에 1초가 아닌 2초 후에 갱신될 수 있다.


// 멈춰 버튼
// document.querySelector('#btn-stop').addEventListener('click', () => {
//     clearInterval(intervalId);
//     intervalId = null;
// });

// 재시작 버튼
// document.querySelector('#btn-restart').addEventListener('click', () => {
//     if(intervalId === null) {
//         intervalId = setInterval(getDate, 500);
//     }

//     intervalId = setInterval(getDate, 500);
// });
// })();

// 재시작을 누르고 멈추지 않는다.
// 그 이유는 인터벌이 여러 개가 들어가고 있어서 그렇다.
// 현재 작동하는 인터벌이 있다면 새로운 인터벌을 만들지 않으면 된다.
// intervalId = setInterval(getDate, 500); << 요 처리를 안하면 된다.
