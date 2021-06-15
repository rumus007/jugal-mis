<template>
  <footer class="footer">
    <div class="footer__info">
      <ul>
        <li>
          <strong>नाेटः</strong> यसमा उल्लेख भएका आँकडा गाउँपालिकाद्वारा वि.सं. २०७७ मा सञ्चालित घरधुरी एवं संस्थागत सर्वेक्षणबाट प्राप्त भएका नतिजाका आधारमा प्रस्तुत गरिएकाे हाे।
        </li>
        <li> जुगल गाउँपालिकाकाे
        <a class="footer__info-link" href="https://susasan.org/" target="_blank">शुसासन</a> परियाेजना एवं
        <a class="footer__info-link" href="https://younginnovations.com.np/" target="_blank">YoungInnovations</a> सँगकाे सहकार्य।
      </li>
    </ul>
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
  padding: 32px 48px;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: var(--neutrals-0);

  &__info {
    color: rgba(255,255,255,0.8);
    font-size: 14px;
    width: 40%;
    li {
      list-style: disc;

      &:not(:last-child) {
        margin-bottom: 10px;
      }
    }
    &-link {
      color: var(--color-base);
      font-weight: 600;
      &:hover {
        text-decoration: underline;
      }
    }
  }
}
</style>