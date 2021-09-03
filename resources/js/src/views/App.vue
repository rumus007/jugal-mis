<template>
  <div class="main-container">
    <Header></Header>
    <GlobalLoader :is-visible="this.$store.getters.isLoading || this.$store.getters.isPrinting"></GlobalLoader>
    <router-view></router-view>
    <!-- <Footer></Footer> -->
  </div>
</template>

<script>
export default {
  components: {
    Header: () => import("./shared/Header.vue"),
    // Footer: () => import("./shared/Footer.vue"),
    GlobalLoader : () => import("./components/Loader/GlobalLoader.vue")
  },
  created() {
    // axios.defaults.headers['Access-Control-Allow-Origin'] = `*`
    // axios.defaults.baseURL = process.env.MIX_API_BASE_URL;
  },
};
</script>

<style scoped>
</style>