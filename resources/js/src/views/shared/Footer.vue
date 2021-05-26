<template>
  <footer class="footer">
    <ul class="footer-nav flex">
       <li class="footer-nav__item">
        <router-link class="footer-nav__link" to="/house">घरधुरीकाे विवरण</router-link>
      </li>
      <li class="footer-nav__item">
        <router-link class="footer-nav__link" to="#">पारिवारिक विवरण</router-link>
      </li>
      <li class="footer-nav__item">
        <router-link class="footer-nav__link" to="#">जनसांख्यिकीय विवरण</router-link>
      </li>
      <li class="footer-nav__item">
        <router-link class="footer-nav__link" to="/institution">संस्थागत विवरण</router-link>
      </li>
    </ul>
  </footer>
</template>
<script>
export default {
  name: "Footer",
};
</script>
<style lang="scss" scoped>
  .footer {
    background-color: #fff;
    border-top: 1px solid rgba(51,52,86,0.2);
    padding: 24px 40px;
    width: 100%;
  }
  .footer-nav {
    justify-content: center;
    &__item {
      &:not(:last-child) {
        margin-right: 40px;
      }
    }
    &__link {
      transition: all 0.32s ease-in-out;
      &:hover {
        color: var(--primary-b1);
      }
    }
  }
</style>