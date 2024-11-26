import { createWebHistory, createRouter } from 'vue-router'
import LoginComponent from '../views/components/auth/LoginComponent.vue'
import BoardListComponent from '../views/components/board/BoardListComponent.vue';
import BoardCreateComponent from '../views/components/board/BoardCreateComponent.vue';
import UserRegistrationComponent from '../views/components/user/UserRegistrationComponent.vue';
import NotFoundComponent from '../views/components/NotFoundComponent.vue';
import { useStore } from 'vuex';

const chkAuth = (to, from, next) => {
    // to - 이동할 path, from - 라우터에 오기 전의 경로 정보 
    // next - 라우터를 끝내고서 후속처리에 필요한 정보
    // store에 접근
    const store = useStore();
    // 로그인 여부 플래그
    const authFlg = store.state.user.authFlg;
    // 비 로그인 시 접근 가능 페이지 플래그
    const noAuthPassFlg = (to.path === '/' || to.path === '/login' || to.path === '/registration');

    if(authFlg && noAuthPassFlg) {
        // 인증된 유저가 비인증으로 이동할 수 있는 페이지에 접근할 경우 board로 이동
        next('/boards');
    } else if(!authFlg && !noAuthPassFlg) {
        // 인증이 안된 유저가 비인증으로 접근할 수 없는 페이지에 접근할 경우 login으로 이동
        next('/login');
    } else {
        // 그 외는 접근 허용
        // next의 파라미터에 아무런 값을 주지 않으면 가고자 했던 페이지로 이동시켜줌
        next();
    }
}

const routes = [
    {
        path: '/',
        redirect: '/login',
        beforeEnter: chkAuth,
    },
    {
        path: '/login',
        component: LoginComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/boards',
        component: BoardListComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/boards/create',
        component: BoardCreateComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/registration',
        component: UserRegistrationComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/:catchAll(.*)',
        component: NotFoundComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;