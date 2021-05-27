<template>
  <div>
    <Header></Header>
    <router-view></router-view>
    <Footer></Footer>
  </div>
</template>

<script>
export default {
  components: {
    Header: () => import("./shared/Header.vue"),
    Footer: () => import("./shared/Footer.vue"),
  },
  created() {
    // axios.defaults.headers['Access-Control-Allow-Origin'] = `*`
    // axios.defaults.baseURL = process.env.MIX_API_BASE_URL;
  },
};
</script>

<style scoped>
</style>