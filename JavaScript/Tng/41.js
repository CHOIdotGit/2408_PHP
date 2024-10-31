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


