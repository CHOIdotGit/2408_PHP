// -------------------------------------------------------
// 선생님 방식

// 1번 '버튼' 클릭 시 아래 문구 alert로 출력
// '안녕하세요.\n숨어있는 div를 찾아주세요.'
(()=>{
    const BTN_INFO = document.querySelector('#btn-info');
    BTN_INFO.addEventListener('click', () => {
        alert('안녕하세요.\n숨어있는 div를 찾아주세요.');
    });
    
    // 함수 실행하고 끝났기 때문에 f12 콘솔에서 BTN_INFO를 찾을 수 없다.
    
    // 2번 숨어있는 큰 div에 마우스가 진입하면 아래 문구 alert 출력
    // '두근두근'
    const CONTAINER = document.querySelector('.container');
    CONTAINER.addEventListener('mouseenter', dokidoki);

    // 3번 숨어있는 2개의 div중 크기가 작은 div를 마우스로 클릭하면 
    // 아래 문구 alert 출력
    // '들켰다'
    const BOX = document.querySelector('.box');
    BOX.addEventListener('click', busted);

    
})();

// 두근두근 함수
function dokidoki() {
    alert('두근두근');
}

// 들켰다 함수
function busted() {
    alert('들켰다');
    const CONTAINER = document.querySelector('.container');
    const BOX = document.querySelector('.box');
    
    BOX.removeEventListener('click', busted); // 들켰다 이벤트 제거
   
    // 5번 모습이 드러난 div를 다시 클릭하면 아래 문구를
    // alert로 출력 및 사라지고 alert로 출력 된 문구가 삭제된다.
    // '숨는다'
    BOX.addEventListener('click', hide); // 숨는다 이벤트 추가
    BOX.classList.add('busted'); // 배경색 부여
    
    // 4번 들킨 후 모습이 드러나며, div에 마우스가 진입해도 
    // 두근두근이 출력 되지 않는다.
    CONTAINER.removeEventListener('mouseenter', dokidoki); // 기존 두근두근 이벤트 제거
}

// 숨는다 함수
function hide() {
    alert('숨는다');
    const CONTAINER = document.querySelector('.container');
    const BOX = document.querySelector('.box');

    BOX.classList.remove('busted'); // 배경색 제거(들켰다)
    BOX.addEventListener('click', busted); // 들켰다 이벤트 추가
    BOX.removeEventListener('click', hide); // 숨는다 이벤트 제거
    
    // 6번 다시 숨은 div에 마우스가 진입하면 아래 문구
    // alert로 출력
    // '두근두근'
    CONTAINER.addEventListener('mouseenter', dokidoki); // 두근두근 이벤트 추가
    
    // 보너스 문제 
    // 다시 숨을 때 랜덤 위치로 이동
    // window.innerWidth : 웹 브라우저의 현재 너비를 가져온다
    const RANDOM_X = Math.round(Math.random() * (window.innerWidth - CONTAINER.offsetWidth));
    const RANDOM_Y = Math.round(Math.random() * (window.innerHeight - CONTAINER.offsetWidth));
    CONTAINER.style.top = RANDOM_Y + 'px';
    CONTAINER.style.left = RANDOM_X + 'px';
}

