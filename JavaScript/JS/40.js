// ---------------
// event

// 인라인 방식 - html코드와 js코드가 너무 혼잡하게 섞이게 되는 단점을 가짐

// 동일한 이벤트를 여러번 사용 할 수 없다.
// HTML문서에 JavaScript가 혼재되므로 관리상의 문제가 발생
// 매우 간단한 처리에서만 간혹 사용

// 함수 선언식
function inlineEventBtn() {
    alert('다른 버튼을 눌러주세요');
}

// // 함수 표현식
// const inlineEventBtn = () => {

// }

function changeColor() {
    const colorChange = document.querySelector('h1');
    // colorChange.style.color = 'red';
    colorChange.classList.add('title-click');
}
// const colorChange = document.querySelector('.title');
// 한칸 위와 같이 전역으로 선언하는 방법은 굉장히 좋지 않다. 
// 계속해서 메모리에 저장되어 있는 상태로 있기 때문
// 또한, html은 아직 만들어지지도 않았는데 JS를 먼저 불러왔기에 적용 할 수 없다.
// -> 돔 구조가 완성되지 않은 상태
// 만약 함수 밖에서 선언할 경우 html에서 js를 불러올 때 defer를 적용해야 한다.
// 또는, defer를 불러오지 않았다면 js 호출을 body의 제일 밑으로 보내면 된다.


// addEventListener()
const BTN_LISTENER = document.querySelector('#btn1');
BTN_LISTENER.addEventListener('click', () => {
    alert('이벤트 리스너 실행');
});
// const BTN_LISTENER = document.querySelector('#btn1');
// BTN_LISTENER.addEventListener('click', callAlert);

// removeEventListener()
// 추가했던 이벤트를 제거 - 문제점 :
BTN_LISTENER.removeEventListener('click', callAlert);

function callAlert() {
    alert('이벤트 리스너 실행');
}

const BTN_TOGGLE = document.querySelector('#btn_toggle');
BTN_TOGGLE.addEventListener('click', () => {
    const colorChange = document.querySelector('h1');
    colorChange.classList.toggle('title-click');
});


// const TEST = document.querySelector('h2');
// TEST.addEventListener('click', function test() {
//     alert('테스트용');
//     TEST.removeEventListener('click', test);
// });

// 다른 방법
const H2 = document.querySelector('h2');
H2.addEventListener('click', testYong);
function testYong() {
    alert('테스트용');
    // TEST.removeEventListener('click', testYong);
}

// const TITLE = document.querySelector('h1')
// TITLE.addEventListener('mouseenter', () => {
//     H2.removeEventListener('click', testYong);
// });
const TITLE = document.querySelector('h1')
TITLE.addEventListener('mouseenter', () => {
    H2.removeEventListener('click', testYong);
}
    ,{ once: true } // 일회용 / option : once가 true일 경우 한 번만 실행
);


// 이벤트 객체
const H3 = document.querySelector('h3');
H3.addEventListener('mouseup', (e) => {
    // console.log(e);
    e.target.style.color = 'white';
    e.target.style.background = 'red';
})
H3.addEventListener('mousedown', (e) => {
    // console.log(e);
    e.target.style.color = 'white';
    e.target.style.background = 'blue';
})
H3.addEventListener('mouseenter', (e) => {
    // console.log(e);
    e.target.style.color = 'white';
    e.target.style.background = 'purple';
})
H3.addEventListener('mouseleave', (e) => {
    // console.log(e);
    e.target.style.color = 'white';
    e.target.style.background = 'orange';
})

// 모달
const BTN_MODAL = document.querySelector('#btn_modal');
BTN_MODAL.addEventListener('click', () => {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.remove('display-none');
})

const MODAL_CLOSE = document.querySelector('#modal_close');
MODAL_CLOSE.addEventListener('click', () => {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.add('display-none');
})

// 팝업
const NAVER = document.querySelector('#naver');
NAVER.addEventListener('click', () => {
    open('https://www.naver.com', '', 'width=500, height=500');
    // 가운데 빈 문자열에 _blank를 넣어 새 탭에서 열 수 있다.
});
NAVER.addEventListener('mouseenter', (e) => {
    // console.log(e);
    e.target.style.cursor = 'pointer';
});
// NAVER.addEventListener('click', () => {
//     open('https://www.naver.com', '_blank', 'top=0 width=500 height=500');
//     open('https://www.google.com', '_blank', 'top=200 left=500 width=500 height=500');
//     open('https://www.daum.net', '_blank', 'top=500 left=1000 width=500 height=500');
//     // 가운데 빈 문자열에 _blank를 넣어 새 탭에서 열 수 있다.
// });