import axios from "axios";
import router from '../../router';

export default {
    namespaced: true,
    state: ()=> ({
        // 로컬 스토리지는 데이터 바인딩이 안된다.
        authFlg: localStorage.getItem('accessToken') ? true : false,
        userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : {},
    }),
    mutations: {
        setAuthFlg(state, flg) {
            state.authFlg = flg;
        },
        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        },
    },
    actions: {
        // 인증관련
        /**
         * 로그인 처리
         * 
         * @param  {*}  context
         * @param  {*}  userInfo
         */
        login(context, userInfo) {
            // context는 store 전체
            const url = '/api/login';
            const data = JSON.stringify(userInfo);
            const config = {
                headers: {
                    'content-Type': 'application/json'
                }
            }
            
            axios.post(url, data, config)
            .then(response => {
                // console.log(response);
                // 토큰 저장 처리, mutations 호출(context.commit)
                // context.commit('setAccessToken', response.data.accessToken);
                localStorage.setItem('accessToken', response.data.accessToken);
                localStorage.setItem('refreshToken', response.data.refreshToken);
                localStorage.setItem('userInfo', JSON.stringify(response.data.data));
                context.commit('setAuthFlg', true);
                context.commit('setUserInfo', response.data.data);

                // 보드 리스트로 이동
                router.replace('/board');

            })
            .catch(error => {
                let errorMsgList = [];
                const errorData = error.response.data;

                if(error.response.status === 422) {
                    // 유효성 체크 에러
                    if(errorData.data.account) {
                        errorMsgList.push(errorData.data.account[0]);
                    }

                    if(errorData.data.password) {
                        errorMsgList.push(errorData.data.password[0]);
                    }
                } else if(error.response.status === 401) {
                    // 비밀번호 오류
                    errorMsgList.push(errorData.msg);
                    // errorMsgList.push('비밀번호가 올바르지 않습니다.');
                } else {
                    errorMsgList.push('예기치 못한 오류 발생');
                }
                alert(errorMsgList.join('\n'));
            });
        },
        /**
         * 로그아웃 처리
         * 
         * @param  {*}  context
         */
        logout(context) {
            // TODO : 백앤드 처리 추가
            
            // 로컬 스토리지 비우기
            localStorage.clear();

            // state 초기화
            context.commit('setAuthFlg', false);
            context.commit('setUserInfo', {});

            router.replace('/login');
        },

    },
    getters: {

    },
}