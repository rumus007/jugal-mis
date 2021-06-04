<template>
  <footer class="footer">
    <Nav/>
  </footer>
</template>
<script>
export default {
  name: "Footer",
  components: {
    Nav: () => import("../shared/Nav"),
  }
};
</script>
<style lang="scss" scoped>
  .footer {
    background-color: var(--color-base);
    padding: 50px 40px;
    width: 100%;
    position: absolute;
    bottom: 0;
  }
  .nav {
    justify-content: center;
  }
</style>