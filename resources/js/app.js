require("./bootstrap");
import Vue from "vue";
import App from "./src/views/App.vue";
import router from "./src/routes/router";
import store from "./src/store/store";

const app = new Vue({
    el: "#app",
    router,
    store,
    components: { App }
});
