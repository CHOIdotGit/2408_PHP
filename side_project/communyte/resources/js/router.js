import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../views/components/auth/LoginComponent.vue';
import BoardListComponent from '../views/components/board/BoardListComponent.vue';
import UserRegistrationComponent from '../views/components/user/UserRegistrationComponent.vue';

const routes = [
    {
        path: '/',
        redirect: '/login',
    },
    {
        path: '/sign_in',
        component: LoginComponent,
    },
    {
        path: '/board',
        component: BoardListComponent,
    },
    {
        path: '/registration',
        component: UserRegistrationComponent,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;