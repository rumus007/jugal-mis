import Vue from 'vue';
import Router from 'vue-router';

const Home = () => import('./../views/home/Home.vue');
const Institution = () => import('./../views/institution/Institution.vue');
const House = () => import('./../views/house/House.vue');
const Family = () => import('./../views/family/Family.vue');

Vue.use(Router);

const router = new Router({
    mode: 'history',
    routes: [
        {
            path: "/",
            name: "Home",
            component: Home,
        },
        {
            path: "/institution",
            name: "Institution",
            component: Institution,
        },
        {
            path: "/house",
            name: "House",
            component: House,
        },
        {
            path: "/family",
            name: "Family",
            component: Family,
        },

    ]
});

export default router;