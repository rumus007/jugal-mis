<template>
  <footer class="footer">
    <!-- <div>
      <router-link to="/house">
        <span>Ghardhuri bibaran</span>
      </router-link>
      <span>Pariparik bibaran</span>
      <span>Population bibaran</span>
      <router-link to="/institution">
        <span>Sanshtagat bibaran</span>
      </router-link>
    </div> -->

    <ul class="footer-nav">
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
  width: 100%;
  padding: 40px;
  display: flex;
  justify-content: center;
  position: absolute;
  bottom: 0;
}

.footer-nav {
  margin: 0 auto;
  display: flex;

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