require('./bootstrap');
import { createApp } from 'vue';
import router from './router';
import AppComponent from '../views/components/AppComponent.vue'; // APP 컴포넌트 불러오기
import store from './store'; // Vuex store 불러오기

const app = createApp(AppComponent);
app.use(store); // Vuex store 사용

createApp({
    components: {
        AppComponent,
    }
})
.use(router)
.mount('#app');