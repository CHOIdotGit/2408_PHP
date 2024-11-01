// Promise 객체

function sleep(flg) {
    return new Promise((resolve) => {
        if(flg) {
            resolve('성공');
        } else {
            PromiseRejectionEvent('실패');
        }
    });
}

sleep(true)
.then(data => console.log(data))
.catch(error => console.log(error))
.finally(console.log('파이널리'));
// resolve는 then으로, reject는 catch로


// setTimeout(() => {
//     console.log('A'); 
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000)
//     }, 2000)
// }, 3000);


// promise 객체 생성
function sleepy(str, ms) {
    return new Promise((resolve) => {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

// 확실히 콜백 지옥보다 보기 편하고 작성도 더 간편한다.
sleepy('A', 3000)
.then(() => sleepy('B', 2000))
.then(() => sleepy('C', 1000));

// A -> C -> B 순서
sleepy('A', 3000)
.then(() => {
    sleepy('B', 2000);
    sleepy('C', 1000);
});

