export default {
    namespaced: true, // 모듈화 된 store의 namespace 활성화
    state: () => ({
        // 여러가지 데이터가 저장되는 영역 - 키(count)와 값(0)을 세팅 -> 객체
        count: 0,
        products: [
            {productName: '바지', productPrice: 38000, productContent: '매우 아름다운 바지'},
            {productName: '티셔츠', productPrice: 25000, productContent: '매우 아름다운 티셔츠'},
            {productName: '양말', productPrice: 39900, productContent: '매우 비싼 양말'},
            {productName: '아우터', productPrice: 69900, productContent: '쌀쌀한 바람을 막아주는 아우터'},
        ],
        detailProduct: {productName: '', productPrice: 0, productContent: ''},
            
    }),
    mutations: {
        // state의 데이터를 수정할 수 있는 함수를 정의하는 영역
        addCount(state) {
            state.count++;
        },
        disCount(state) {
            state.count--;
        },
        setDetailProduct(state, item) {
            state.detailProduct = item;
        }
    },
    actions: {
        // 비동기성 비즈니스 로직 함수를 정의하는 영역


    },
    getters: {
        // state의 데이터를 추가 처리를 하여 획득하기 위한 함수들을 정의하는 영역

    },
}