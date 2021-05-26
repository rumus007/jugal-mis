<template>
  <div class="header">
    <div class="header__left">
      <router-link to="/" class="logo">
        <img :src="logo" alt class="logo__img" />
        <span class="logo__text">
          <span>जुगल गाउँपालिका</span>
          <span>
            "माहामारी विरुद्ध सजकता, पुर्वाधार विकास र कृषिमा
            व्यवसायिकता समृद्ध जुगल निर्माणमा हामी सबैको सहभागिता"
          </span>
        </span>
      </router-link>
    </div>
    <ul class="header__right header-nav">
      <li class="header-nav__item">
        <router-link class="header-nav__link" to="/house">घरधुरीकाे विवरण</router-link>
      </li>
      <li class="header-nav__item">
        <router-link class="header-nav__link" to="#">पारिवारिक विवरण</router-link>
      </li>
      <li class="header-nav__item">
        <router-link class="header-nav__link" to="#">जनसांख्यिकीय विवरण</router-link>
      </li>
      <li class="header-nav__item">
        <router-link class="header-nav__link" to="/institution">संस्थागत विवरण</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import logo from "../../../../../public/images/nepal-gov.svg";

export default {
  name: "Header",
  data: function () {
    return {
      logo: logo,
    };
  },
};
</script>

<style lang="scss" scoped>
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 26px 40px;

  &__left {
    width: 474px;
  }
}

.logo {
  display: flex;

  &__img {
    margin-right: 16px;
  }

  &__text {
    display: flex;
    flex-direction: column;
    span {
      &:first-child {
        font-weight: 700;
      }
    }
  }
}

.header-nav {
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
