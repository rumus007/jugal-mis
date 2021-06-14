<template>
  <div class="stats-section">
    <div class="loader-wrapper" v-if="statLoader">
      <loader />
    </div>
    <div class="flex justify-space-between" v-else>
      <div class="stats stats-family">
        <strong v-text="statData.total_family ? statData.total_family : '-'"></strong>
        <span>कुल परिवार</span>
      </div>
      <div class="stats stats-female">
        <strong
          v-text="
            statData.househead_gender_female
              ? statData.househead_gender_female
              : '-'
          "
        ></strong>
        <span>कुल महिला</span>
      </div>
      <div class="stats stats-male">
        <strong
          v-text="
            statData.househead_gender_male
              ? statData.househead_gender_male
              : '-'
          "
        ></strong>
        <span>कुल पुरुष</span>
      </div>
      <div class="stats stats-third-gender">
        <strong
          v-text="
            statData.househead_gender_other
              ? statData.househead_gender_other
              : '-'
          "
        ></strong>
        <span>कुल तेश्रो लिङ्गी</span>
      </div>
    </div>
  </div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";
import { englishToNepaliNumber } from "nepali-number";

export default {
  name: "Stats",
  components: {
    Loader: () => import("../components/Loader/Loader.vue"),
  },
  props: {
    url: { type: String, rquired: true },
  },
  data() {
    return {
      statData: {},
      statLoader: false,
    };
  },
  methods: {
    getFromApi: function () {
      this.statLoader = true;
      //   const targetUrl = `individual/${url}`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(this.url, { params: formattedParams })
        .then(({ data }) => {
          let formattedData = {};
          for (let [key, value] of Object.entries(data.data)) {
            formattedData[key] = this.getFormattedCount(value);
          }        
          
          this.statData = Object.keys(formattedData).length > 0 ? formattedData : [] ;;
          this.statLoader = false;
        })
        .catch(() => {
          this.statLoader = false;
        });
    },
    getFormattedCount: function (count) {
      return englishToNepaliNumber(count);
    },
  },
  mounted() {
    this.getFromApi();
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getFromApi();
      },
      deep: true,
    },
  },
};
</script>
// <style scoped lang="scss">
// .stats {
//   color: var(--color-primary-dark);
//   padding-left: 68px;
//   position: relative;
//   &:before {
//     background-color: rgba(168, 216, 255, 0.5);
//     background-image: url("../../../../../public/images/ic_sprite.svg");
//     background-repeat: no-repeat;
//     border-radius: 50%;
//     content: "";
//     height: 52px;
//     left: 0;
//     position: absolute;
//     top: 2px;
//     width: 52px;
//   }
//   &-section {
//     background: var(--color-base);
//     box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
//     border-bottom-left-radius: 8px;
//     border-bottom-right-radius: 8px;
//     justify-content: space-between;
//     padding: 24px 48px;
//     position: relative;
//   }

//   strong {
//     display: block;
//     font-size: 20px;
//   }

//   &-population::before {
//     background-position: 16px 16px;
//   }

//   &-family::before {
//     background-position: 15px -29px;
//   }

//   &-female::before {
//     background-position: 15px -77px;
//   }

//   &-male::before {
//     background-position: 14px -171px;
//   }

//   &-third-gender::before {
//     background-position: 12px -173px;
//   }
// }
//
</style>