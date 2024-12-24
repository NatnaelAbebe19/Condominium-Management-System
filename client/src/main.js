import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import Uploader from 'vue-media-upload';
import App from './App.vue'
import router from './router'

const app = createApp(App)
app.component('Uploader', Uploader);
app.use(createPinia())
app.use(router)

app.mount('#app')
