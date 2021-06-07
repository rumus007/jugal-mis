<template>
  <div class="title-bar flex"  @scroll="handleScroll()">
    <h1>{{ title }}</h1>
    <div class="ward-options">
      <multiselect
        v-model="ward"
        :options="wardList"
        :multiple="true"
        :searchable="false"
        selectedLabel=""
        selectLabel=""
        deselectLabel=""
        placeholder="वार्ड छनौट गर्नुहोस्"
        @input="scroll('main')"
      ></multiselect>
      <!-- <v-select :options="wardOptions" placeholder="वार्ड छनौट गर्नुहोस्"/> -->
      <a href="#" class="download-pdf">
        <svg
          width="14"
          height="15"
          viewBox="0 0 14 15"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M0 13.4211H14V15H0V13.4211ZM7.77778 8.82L12.4997 4.02632L13.5994 5.14263L7 11.8421L0.400556 5.14342L1.50033 4.02632L6.22222 8.81842V0H7.77778V8.82Z"
            fill="#fff"
          />
        </svg>
        डाउनलोड गर्नुहोस्
      </a>
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
export default {
  name: "TitleBar",
  props: ["title"],
  components: {
    Multiselect,
  },
  data: function () {
    return {
      wardList: [1, 2, 3, 4, 5, 6, 7],
      selectedWard: "",
      isFixed: "",
    };
  },
  computed: {
    ward: {
      get() {
        return this.$store.getters.ward;
      },
      set(value) {
        this.$store.commit("changeWard", value);
      },
    },
  },
  methods: {
    selectWard: function () {},
     scroll(id) {
      document.getElementById(id).scrollIntoView({
        behavior: "smooth",
      });
    },
    handleScroll (event) {
      let TitleBar = document.querySelector(".title-bar");
      let Main = document.querySelector(".main-content");
      let Tabs = document.querySelector(".tabs");
      if (window.scrollY > 92 && !TitleBar.className.includes('fixed')) {
      TitleBar.classList.add('fixed'); 
      Main.classList.add('main-scroll'); 
      } else if (window.scrollY < 92) {
         TitleBar.classList.remove('fixed'); 
         Main.classList.remove('main-scroll'); 
      }
      if (window.scrollY > 194 && !Tabs.className.includes('fixed')) {
      Tabs.classList.add('fixed'); 
      } else if (window.scrollY < 194) {
         Tabs.classList.remove('fixed'); 
      }
    }
  },
    created () {
      window.addEventListener('scroll', this.handleScroll);

    },
    destroyed () {
      window.removeEventListener('scroll', this.handleScroll);
    } 
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped lang="scss">
.title-bar {
  align-items: center;
  background-color: #028eff;
  justify-content: space-between;
  padding: 16px 48px;
 
  &.fixed {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 10;
  }

  h1 {
    color: var(--color-base);
  }
}

  .ward-options {
    align-items: center;
    display: flex;
  }
  
  .multiselect {
    height: 42px;
    min-width: 169px;
    width: auto;
  }

.download-pdf {
  color: var(--color-base);
  margin-left: 24px;
  svg {
    float: left;
    margin-right: 8px;
    margin-top: 5px;
  }
}
</style>