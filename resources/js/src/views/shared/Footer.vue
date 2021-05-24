<template>
  <footer class="main-footer">
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
  </footer>
</template>

<script>
export default {
  name: "Footer",
};
</script>
<style scoped>
.main-footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: white;
  color: black;
  text-align: center;
}
</style>