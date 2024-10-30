const BTN = document.querySelector('.btn');
const BIG_BOX = document.querySelector('.big_box');
const SMALL_BOX = document.querySelector('.small_box');

function heartBeat() {
    alert('두근두근');
}

function gotCaught() {
    alert('들켰다');
    SMALL_BOX.removeEventListener('click', gotCaught);
    SMALL_BOX.addEventListener('click', hide);
    BIG_BOX.removeEventListener('mouseenter', heartBeat);
    BIG_BOX.classList.toggle('hidden'); // hidden은 opacity = 0
    
}

function hide() {
    alert('숨는다');
    SMALL_BOX.removeEventListener('click', hide);
    BIG_BOX.classList.toggle('hidden'); // hidden은 opacity = 0
    randomPosition(); // 랜덤 위치로 이동
    BIG_BOX.addEventListener('mouseenter', heartBeat);
    SMALL_BOX.addEventListener('click', gotCaught);
}

function randomPosition() {
    const x = Math.floor(Math.random() * (window.innerWidth - 200));
    const y = Math.floor(Math.random() * (window.innerHeight - 200));
    BIG_BOX.style.top = `${y}px`;
    BIG_BOX.style.left = `${x}px`;
}

BTN.addEventListener('click', () => {
    alert(`안녕하세요. 
숨어있는 div를 찾아주세요.`);
});

BIG_BOX.addEventListener('mouseenter', heartBeat);

SMALL_BOX.addEventListener('click', gotCaught);

// BIG_BOX.addEventListener('click', hide);



// SMALL_BOX.addEventListener('click', () => {
//     hide();
//     BIG_BOX.classList.toggle('hidden');
// });

// 느낀점 : function을 잘 활용해야 한다.
// 또한, addEventListener는 실행 처리가 아닌 이벤트를 준비하는 개념
// 실제로 동작하는 것은 function으로 정의한 함수이다.