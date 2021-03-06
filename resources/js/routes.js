
import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/Home/index.vue';
import Explore from './components/Explore/Explore.vue';
import Work from './components/Explore/Work.vue';
import ExploreIndex from './components/Explore/index.vue';
import Edit from './components/Explore/Edit.vue';

import Profile from './components/Profile/index.vue';

import signIn from './components/Logging/signIn.vue';
import signUp from './components/Logging/signUp.vue';

import newWork from './components/CreateWork/index.vue'
import editWork from './components/EditWork/index.vue'
import componentTest from './components/ComponentTest/index.vue';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path:"/",
            name: "Home",
            component: Home
        },
        
        /*
        {
            path:"/explore/:id",
            name: "Explore Work",
            component: Work
        },*/
        {
            path:"/explore",
            name: "Explore",
            component: ExploreIndex,
            children:[
                {
                    path: "",
                    name: "Eplore",
                    component: Explore,
                },
                {
                    path: ":id",
                    name: "Eplore Work",
                    component: Work,
                },
                {
                    path: ":id/edit",
                    name: "Edit Work",
                    component: Edit,
                }
            ]
        },
        {
            path:"/profile",
            name: "Profile",
            component: Profile
        },
        {
            path:"/component-tests",
            name: "Test",
            component: componentTest
        },
        {
            path:"/signIn",
            name: "signIn",
            component: signIn
        },
        {
            path:"/signUp",
            name: "signUp",
            component: signUp
        },
        {
            path:"/newWork",
            name: "new work",
            component: newWork
        },
        {
            path:"/works/:id/edit",
            name: "edit",
            component: editWork
        },
    ]

});

export default router;
