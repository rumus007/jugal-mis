<template>
  <div>
    <div class="title-bar flex" @scroll="handleScroll()">
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
          @input="mainScroll()"
        ></multiselect>
        <!-- <v-select :options="wardOptions" placeholder="वार्ड छनौट गर्नुहोस्"/> -->
        <button class="download-pdf" @click="download">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="18"
            height="18"
          >
            <path fill="none" d="M0 0h24v24H0z" />
            <path
              d="M6 19H3a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-3v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm0-2v-1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1h2V9H4v8h2zM8 4v3h8V4H8zm0 13v3h8v-3H8zm-3-7h3v2H5v-2z"
              fill="rgba(255,255,255,1)"
            />
          </svg>
          प्रिन्ट गर्नुहोस्
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";

import _ from "lodash";
export default {
  name: "TitleBar",
  props: ["title"],
  components: {
    Multiselect,

    // Slider3: () => import("../individual/MultiRange.vue"),
  },
  data: function () {
    return {
      wardList: ['१', '२', '३', '४', '५', '६', '७'],
      selectedWard: "",
      isFixed: "",
      // testAgeRange: { min: 10, max: 100 },
      // barMinValue: 0,
      // barMaxValue: 100,
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
    // ageRange: {
    //   get() {
    //     return this.$store.getters.ageRange;
    //   },
    //   set: _.debounce(function (value) {
    //     this.$store.commit("changeAgeRange", value);
    //   }, 1000),
    // },
    // currentRouteName() {
    //   return this.$route.name;
    // },
  },
  methods: {
    selectWard: function () {},
    scroll(id) {
      document.getElementById(id).scrollIntoView({
        behavior: "smooth",
      });
    },
    handleScroll(event) {
      let TitleBar = document.querySelector(".title-bar");
      let Main = document.querySelector(".main-content");
      let offsetHeight = document.querySelector("header").offsetHeight;
      if (
        window.scrollY > offsetHeight &&
        !TitleBar.className.includes("fixed")
      ) {
        TitleBar.classList.add("fixed");
        Main.classList.add("main-scroll");
      } else if (window.scrollY < offsetHeight) {
        TitleBar.classList.remove("fixed");
        Main.classList.remove("main-scroll");
      }
    },
    mainScroll(event) {
      window.scrollTo({
        top: 92,
        behavior: "smooth",
      });
    },
    download(){
      this.$store.commit("changePrinting", true);

      setTimeout(() => {
        window.print();
      }, 4000);

       window.onafterprint = () => {
          this.$store.commit("changePrinting", false);
        }
    },
  },
  created() {
    window.addEventListener("scroll", this.handleScroll);
  },
  destroyed() {
    window.removeEventListener("scroll", this.handleScroll);
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped lang="scss">
.title-bar {
  align-items: center;
  background-color: #028eff;
  box-shadow: 0px 4px 15px rgb(0 0 0 / 10%);
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
  margin-left: 24px;
}

.multiselect {
  height: 42px;
  min-width: 169px;
  width: auto;
}

.download-pdf {
  background-color: transparent;
  color: var(--color-base);
  cursor: pointer;
  margin-left: 24px;
  svg {
    float: left;
    margin-right: 8px;
  }
}
</style>