<template>
    <nav class="nav">
      <li class="nav__item">
        <router-link class="nav__link" to="/house">घरधुरीकाे विवरण</router-link>
      </li>
      <li class="nav__item">
        <router-link class="nav__link" to="#">पारिवारिक विवरण</router-link>
      </li>
      <li class="nav__item">
        <router-link class="nav__link" to="#">जनसांख्यिकीय विवरण</router-link>
      </li>
      <li class="nav__item">
        <router-link class="nav__link" to="/institution">संस्थागत विवरण</router-link>
      </li>
    </nav>
</template>
<script>
export default {
  name: "nav",
};
</script>
<style lang="scss" scoped>
  .nav {
    display: flex;
    &__item:not(:last-child) {
        margin-right: 40px;
    }
    &__link {
      transition: all 0.32s ease-in-out;
      &:hover {
        color: var(--color-primary-light);
      }
    }
  }
  .router-link-active,.router-link-active:hover {
    color: var(--color-link);
  }
</style>