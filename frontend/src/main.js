import {
    createApp
} from 'vue'
import App from './App.vue'
import './App.css'
import router from './router'

createApp(App).use(router).mount('#app')