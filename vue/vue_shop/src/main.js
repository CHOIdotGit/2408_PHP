import { createApp } from 'vue'
import App from './App.vue'
import store from './store/store' // Vuex 저장소 import

createApp(App) // << 얘가 최초 시작점이 된다 그래서 App.vue가 최상위 부모가 된다
.use(store) // Vuex 저장소 사용
.mount('#app')
