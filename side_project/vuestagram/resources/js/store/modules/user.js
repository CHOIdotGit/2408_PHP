import axios from "../../axios";
import router from '../../router';

export default {
    namespaced: true,
    state: ()=> ({
        // 로컬 스토리지는 데이터 바인딩이 안된다.
        // authFlg을 활용해 로그인한 유저인지 아닌지 판별하고 있음
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
        setUserInfoBoardsCount(state) {
            state.userInfo.boards_count++;
            localStorage.setItem('userInfo', JSON.stringify(state.userInfo));
        }
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
            // const config = {
            //     headers: {
            //         'Content-Type': 'application/json'
            //     }
            // }
            
            // axios.post(url, data, config)
            axios.post(url, data)
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
                router.replace('/boards');

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
            // 서버와 통신
            const url = '/api/logout';
            const config = {
                headers: {
                    // 'Bearer ' 토큰 - 파라미터가 아닌 header에 담는다
                    'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                }
            }

            axios.post(url, null, config)
            .then(response => {
                alert('로그아웃 완료');
            })
            .catch(error => {
                alert('문제가 발생하여 로그아웃 처리');
            })
            .finally(() => {
                // 로컬 스토리지 비우기
                localStorage.clear();
    
                // state 초기화
                context.commit('setAuthFlg', false);
                context.commit('setUserInfo', {});
    
                router.replace('/login');
            });
        },

        /**
         * 회원가입 처리
         * 
         * @param  {*}  context
         * @param  {*}  userInfo
         */
        registration(context, userInfo) {
            const url = '/api/registration';
            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };

            //  form data 셋팅
            const formData = new FormData();
            formData.append('account', userInfo.account);
            formData.append('password', userInfo.password);
            formData.append('password_chk', userInfo.password_chk);
            formData.append('name', userInfo.name);
            formData.append('gender', userInfo.gender);
            formData.append('profile', userInfo.profile);

            // 서버에 요청 보내기
            axios.post(url, formData, config)
            .then(response => {
                alert('회원가입 성공\n가입한 계정으로 로그인해 주세요.');
                router.replace('/login');
            })
            .catch(error => {
                alert('회원가입 실패');
            });
        },
        /**
         * 토큰 만료-유효성 체크 후 처리 속행 - 액션 메소드
         * 
         * @param  {*}  context
         * @param  {callback} callbackProcess 
         */
        chkTokenAndContinueProcess(context, callbackProcess) {
            const payload = localStorage.getItem('accessToken').split('.')[1];
            const base64 = payload.replace(/-/g, '+').replace(/_/g, '/');
            const objectPayload = JSON.parse(window.atob(base64));
            const now = new Date();

            // 현재 시간과 만료 시간 비교하기
            if((objectPayload.exp * 1000) > now.getTime()) {
                // 토큰 유효
                console.log('토큰 유효');
                callbackProcess();
            } else {
                // 토큰 만료
                console.log('토큰 만료');
                context.dispatch('reissueAccessToken', callbackProcess);
            }
            // console.log(objectPayload.exp * 1000 <= now.getTime());
            // console.log(objectPayload.exp, ceil(now.getTime() / 1000));
            
        },
        /**
         * 토큰 재발급 처리
         * 
         * @param  {*}  context
         * @param  {callback} callbackProcess 
         */
        reissueAccessToken(context, callbackProcess) {
            console.log('토큰 재발급 처리');
            
            const url = '/api/reissue';
            const config = {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('refreshToken'),
                }
            }

            axios.post(url, null, config)
            .then(response => {
                // 토큰  셋팅
                localStorage.setItem('accessToken', response.data.accessToken);
                localStorage.setItem('refreshToken', response.data.refreshToken);
                
                // 후속 처리 진행
                callbackProcess();
            })
            .catch(error => {
                console.error(error);
            })
        }
    },
    getters: {

    },
}