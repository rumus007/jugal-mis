<template>
    <nav class="nav">
      <li class="nav__item">
        <router-link class="nav__link" to="/house">घरधुरीकाे विवरण</router-link>
      </li>
      <li class="nav__item">
        <router-link class="nav__link" to="/family">पारिवारिक विवरण</router-link>
      </li>
      <li class="nav__item">
        <router-link class="nav__link" to="/individual">जनसांख्यिकीय विवरण</router-link>
      </li>
      <li class="nav__item">
        <router-link class="nav__link" to="/institution">संस्थागत विवरण</router-link>
      </li>
    </nav>
</template>
<script>
export default {
  name: "Nav",
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
        color: var(--color-link);
      }
    }
  }
  .router-link-active,.router-link-active:hover {
    font-weight: 500;
    color: var(--color-link);
  }
</style>