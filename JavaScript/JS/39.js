// ---------------------------------
// DOM(Document Object Model)

// 요소 선택

// 고유한 ID로 요소를 선택하는 방법
const TITLE = document.getElementById('title');

// 태그명으로 요소를 선택하는 방법(자주 사용하지 않음)
const H1 = document.getElementsByTagName('h1');
TITLE.style.color = 'navy';
H1[1].style.color = 'green';

// 클래스명으로 선택하는 방법(자주 사용하지 않음)
const CLASS_NONE_LI = document.getElementsByClassName('none-li');

// CSS 선택자를 이용해서 요소를 선택하는 방법(일반적으로 쿼리 셀렉터)
const SICK = document.querySelector('#sick');
const NONE_LI = document.querySelector('.none-li'); // 해당하는 요소가 여러개라면 가장 첫번째 것만 가져온다.
const ALL_NONE_LI = document.querySelectorAll('.none-li'); // ('.none-li, #title') << 얘도 적용됨

// 홀 빨 짝 파
const LI = document.querySelectorAll('li');
LI.forEach((element, idx) => {
    if(idx % 2 === 0) {
        element.style.color = 'purple';
    } else {
        element.style.color = 'navy';

    }
});

// -----------------
// 요소 조작

// textContent : 컨텐츠를 획득하거나 변경하는데 사용되는 프로퍼티, 순수한 텍스트 데이터를 전달한다.
TITLE.textContent = '<a>링크</a>';

// innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
TITLE.innerHTML = '<a href="https://www.youtube.com/watch?v=tFYXxoGBLRk">크크크크 어웨이크</a>';

// setAttribute(속성명, 값) : 해당 속성과 값을 요소에 추가하는 메소드
const A_LINK = document.querySelector('#title > a');
A_LINK.setAttribute('href', 'https://www.naver.com');

const INPUT = document.querySelector('#input-1')
INPUT.setAttribute('placeholder', 'どーも、忍者です。');

// removeAttribute(속성명) : 해당 속성 제거하는 메소드
A_LINK.removeAttribute('href');

// 번외
document.querySelector('img').setAttribute('src', '../img/russian blue.webp');


// 요소 외 스타일링

// style : 인라인으로 스타일 추가
TITLE.style.color = 'black'; // 인라인 스타일
TITLE.removeAttribute('style'); // 스타일 삭제

// classList 프로퍼티 : 클래스로 추가 및 삭제하는 
// classList.add(클래스명) : 해당 클래스 추가
TITLE.classList.add('class-1');   
TITLE.classList.add('class-2', 'class-3', 'class-4');

// classList.remove(클래스명) : 해당 클래스 삭제
TITLE.classList.remove('class-3');

// classList.toggle(클래스명) : 해당 클래스를 on/off
TITLE.classList.toggle('toggle');
// setInterval(()=>{TITLE.classList.toggle('toggle')}, 350); << 반짝이 효과

// 무한루프 걸 때 반짝이 효과 줄 수 있는지 - GIF가 아니면 힘들다. 디자이너한테 따로 만들어 달라고 해야할듯

// ---------------------------
// 새로운 요소 생성

// createElement(태그명) : 새로운 요소 생성
const NEW_LI = document.createElement('li');
NEW_LI.textContent = "떡볶이";

// 왜 id일까? class는 뭐가 다를까? 데이터를 받아와야 해서 id를 사용하는것인가?
const FOODS = document.querySelector('#foods');
// 떡볶이도 li태그니까 클래스를 넣고 싶은데 어떻게 해야할까? - 밑에서 해결

// appendChild(노드) : 해당 부모 노드의 마지막 자식으로 노드를 추가한다.
FOODS.appendChild(NEW_LI);
NEW_LI.classList.add('none-li'); // 여기서 해결됨

// removeChild(노드) : 해당 부모 노드의 자식 노드를 삭제
// FOODS.removeChild(NEW_LI);

// 트리구조는 부모 태그가 없어지면 그 하위태그도 같이 없어진다.

// insertBefore(새로운 노드, 기준이 되는 노드) : 해당 부모 노드의 자식인 기준 노드의 앞에 새로운 노드를 추가한다.
// 기준이 되는 부모가 있어야 함
FOODS.insertBefore(NEW_LI, SICK);