import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        ward: [],
        manPower: [{}],
        isLoading: false,
        isPrinting: false,
        ageRange: { min: 0, max: 100 }
    },
    getters: {
        ward: state => state.ward,
        manPower: state => state.manPower,
        isLoading: state => state.isLoading,
        isPrinting: state => state.isPrinting,
        ageRange: state => state.ageRange
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
        },
        ageRange({ commit }, payload) {
            commit("changeAgeRange", payload)

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
        },
        changeAgeRange(state, payload) {
            console.log(payload)
            state.ageRange = payload
        }
    },
});

export default store;