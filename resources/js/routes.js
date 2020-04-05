
import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/Home/index.vue';
import Explore from './components/Explore/index.vue';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path:"/",
            name: "Home",
            component: Home
        },
        {
            path:"/explore",
            name: "Explore",
            component: Explore
        }
    ]

});

export default router;
