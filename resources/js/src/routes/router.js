import Vue from 'vue';
import Router from 'vue-router';

const Home = () => import('./../views/home/Home.vue');

Vue.use(Router);

const router = new Router({
    mode: 'history',
    routes: [
        {
            path: "/",
            name: "Home",
            component: Home,
        }
    ]
});

export default router;