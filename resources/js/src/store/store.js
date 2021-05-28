import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        ward: []
    },
    getters: {
        ward: state => state.ward,
    },
    actions: {
        ward({ commit }, payload) {
            commit("changeWard", payload);
        },
    },
    mutations: {
        changeWard(state, payload) {
            state.ward = payload;
        },
    }
});

export default store;