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
    border-top: 1px solid rgba(51,52,86,0.2);
    padding: 50px 40px;
    width: 100%;
  }
  .nav {
    justify-content: center;
  }
</style>