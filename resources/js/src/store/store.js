import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        ward: [],
        manPower: [{}],
        isLoading: false,
        isPrinting: false
    },
    getters: {
        ward: state => state.ward,
        manPower: state => state.manPower,
        isLoading: state => state.isLoading,
        isPrinting: state => state.isPrinting
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
        },
        isPrinting({ commit }, payload) {
            commit("changePrinting", payload)
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
        },
        changePrinting(state, payload) {
            state.isPrinting = payload
        }
    },
});

export default store;