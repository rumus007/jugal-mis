
<template>
  <header class="header">
    <div class="logo">
      <router-link to="/" class="logo__link">
        <img :src="logo" alt class="logo__img" width="77" height="65" />
        <span class="logo__text">
          <span>जुगल गाउँपालिका</span>
          <span>
            "माहामारी विरुद्ध सजकता, पुर्वाधार विकास र कृषिमा
            व्यवसायिकता समृद्ध जुगल निर्माणमा हामी सबैको सहभागिता"
          </span>
        </span>
      </router-link>
    </div>
    <Nav/>
  </header>
</template>
<script>
import logo from "../../../../../public/images/nepal-gov.svg";
export default {
  name: "Header",
  components: {
    Nav: () => import("../shared/Nav"),
  },
  data: function () {
    return {
      logo: logo,
    };
  },
};
</script>
<style lang="scss" scoped>
  header {
    align-items: center;
    background-color: var(--color-base);
    display: flex;
    justify-content: space-between;
    padding: 26px 48px;
  }
  .logo {
    width: 474px;
    &__link {
      display: flex;
    }
    &__img {
      margin-right: 16px;
    }
    &__text {
      color: var(--color-primary-light);
      display: flex;
      flex-direction: column;
      font-size: 14px;
      span {
        &:first-child {
          font-size: 16px;
          font-weight: 700;
        }
      }
    }
  }
  .nav {
    display: flex;
    &__item:not(:last-child) {
        margin-right: 40px;
    }
    &__link {
      color: var(--color-primary-light);
      transition: all 0.32s ease-in-out;
      &:hover {
        color: var(--color-primary-dark);
      }
    }
  }
</style>