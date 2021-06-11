<template>
  <footer class="footer">
    <div class="footer__info">
      जुगल गाउँपालिकाकाे
      <a class="footer__info-link" href="https://susasan.org/" target="_blank">शुसासन</a> परियाेजना एवं
      <a class="footer__info-link" href="https://younginnovations.com.np/" target="_blank">YoungInnovations</a> सँगकाे सहकार्य।
    </div>
    <Nav />
  </footer>
</template>
<script>
export default {
  name: "Footer",
  components: {
    Nav: () => import("../shared/Nav"),
  },
};
</script>
<style lang="scss" scoped>
.footer {
  background-color: var(--blue-600);
  padding: 50px 48px;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: var(--neutrals-0);

  &__info-link {
    font-weight: bold;
  }
}
</style>