import './bootstrap';
import { createApp } from "vue"
import app from "./layouts/App.vue"
import vuetify from "./vuetify"
import '@mdi/font/css/materialdesignicons.css'
import axios from 'axios'
axios.defaults.baseURL = 'http://127.0.0.1:8000'

createApp(app).use(vuetify).mount("#app")