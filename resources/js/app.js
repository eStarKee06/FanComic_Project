import './bootstrap';
import Vue from "vue"
import Router from "./routes.js"
import App from "./views/App.vue"
import {store} from "./store.js";
import Axios from "axios";

axios.defaults.baseURL="http://localhost:8000";
Vue.prototype.$http = axios;
const app = new Vue({
    el: '#app',
    router: Router,
    store,
    render: h => h(App)
});
export default app;
