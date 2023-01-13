import { createApp } from 'vue'
import App from '@/App.vue'
import router from '@/router'
import store from '@/store'
import '@/assets/css/main.css'
import '@/assets/css/main.css'
// import '/dist/output.css'
// npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch

createApp(App)
    .use(store)
    .use(router)
    .mount('#app')

