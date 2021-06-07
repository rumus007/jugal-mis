import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        ward: [],
        manPower: [{}],
        isLoading: false,
    },
    getters: {
        ward: state => state.ward,
        manPower: state => state.manPower,
        isLoading: state => state.isLoading
    },
    actions: {
        ward({ commit }, payload) {
            commit("changeWard", payload);
        },
        manPower({ commit }, payload) {
            commit("changeManPower", payload);
        },
        isLoading({ commit }, payload) {
            commit("changeLoader", payload)
        }
    },
    mutations: {
        changeWard(state, payload) {
            state.ward = payload;
        },
        changeManPower(state, payload) {
            state.manPower = [...state.manPower, payload];
        },
        changeLoader(state, payload) {
            state.isLoading = payload
        }
    },
});

export default store;