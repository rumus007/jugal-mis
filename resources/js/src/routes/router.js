import Vue from 'vue';
import Router from 'vue-router';
import store from "../store/store";

const Home = () => import('./../views/home/Home.vue');
const Institution = () => import('./../views/institution/Institution.vue');
const House = () => import('./../views/house/House.vue');
const Family = () => import('./../views/family/Family.vue');
const Individual = () => import('./../views/individual/Individual.vue');

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
        {
            path: "/individual",
            name: "Individual",
            component: Individual,
        },

    ]
});

router.beforeEach((to, from, next) => {
    store.commit("changeLoader", true)
    next();
})

export default router;