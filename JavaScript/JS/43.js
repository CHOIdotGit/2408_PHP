const BTN_CALL = document.querySelector('#btn_call');
BTN_CALL.addEventListener('click', getList);

function getList() {
    const URL = document.querySelector('#url').value;
    console.log(URL);

    // GET. axios는 비동기인데 그 안에 get, then, catch를 사용하면 동기가 된다? / 기본적으로 Promise 객체로 진행?
    axios.get(URL)
    .then(response => {
        response.data.forEach(item => {
            // console.log(response); // 여기서 문제가 생기면 catch로 간다. ???rk response라는 변수 안에 자동으로 담기게 된다. 그래서 값을 가지고 있다.
            const NEW = document.createElement('img')
            NEW.setAttribute('src', item.download_url);
            NEW.style.width = '200px';
            NEW.style.height = '200px';

            document.querySelector('.container').appendChild(NEW);
        });
    }) 
    .catch(error => {
        console.log(error);
    });
    // '.'으로 연결하는 것을 체이닝(Chaining) 메소드라고 함
}

