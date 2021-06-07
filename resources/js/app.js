require("./bootstrap");
import Vue from "vue";
import App from "./src/views/App.vue";
import router from "./src/routes/router";
import store from "./src/store/store";
import 'remixicon/fonts/remixicon.css'

const app = new Vue({
    el: "#app",
    router,
    store,
    components: { App },
    mounted() {
        this.enableInterceptor()
    },
    data: {
        isLoading: false,
        axiosInterceptor: null,
    },
    methods: {
        enableInterceptor() {
            this.axiosInterceptor = window.axios.interceptors.request.use((config) => {
                this.changeLoader(true)
                // this.isLoading = true
                return config
            }, (error) => {
                this.changeLoader(false)
                // this.isLoading = false
                return Promise.reject(error)
            })

            window.axios.interceptors.response.use((response) => {
                // this.isLoading = false
                this.changeLoader(false)

                return response
            }, function (error) {
                this.changeLoader(false)
                // this.isLoading = false
                return Promise.reject(error)
            })
        },

        disableInterceptor() {
            window.axios.interceptors.request.eject(this.axiosInterceptor)
        },

        changeLoader(value) {
            this.$store.commit("changeLoader", value);
        }
    },
});
