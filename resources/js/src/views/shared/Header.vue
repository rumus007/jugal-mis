<template>
  <div class="header">
    <div>
      <router-link to="/">
        <img :src="logo" alt="" height="50px" />
      </router-link>
    </div>
    <div>
      <router-link to="/house">
        <span>Ghardhuri bibaran</span>
      </router-link>
      <span>Pariparik bibaran</span>
      <span>Population bibaran</span>
      <router-link to="/institution">
        <span>Sanshtagat bibaran</span>
      </router-link>
    </div>
  </div>
</template>

<script>
import logo from "../../../../assets/images/nepal-gov.png";

export default {
  name: "header",
  data: function () {
    return {
      logo: logo,
    };
  },
};
</script>

<style scoped>
.header {
  display: flex;
  justify-content: space-between;
}
</style>
