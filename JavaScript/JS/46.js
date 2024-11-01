// 콜백 지옥
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

sleepy('A', 3000)
.then(() => sleepy('B', 2000))
.then(() => sleepy('C', 1000))
.catch(() => console.log('error'))
.finally(() => console.log('finally'));
// 에러가 나든 성공을 하던 실행해야 하는 소스코드가 있음

async function test() {
    try {
        await sleepy('A', 3000);
        await sleepy('B', 2000);
        await sleepy('C', 1000);
    } catch (error) {
        console.log('error');
    } finally {
        console.log('finally');
    }
}