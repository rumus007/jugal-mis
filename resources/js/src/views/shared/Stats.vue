<template>
  <div class="stats-section">
    <div class="loader-wrapper" v-if="isLoading">
      <loader />
    </div>
    <div class="flex justify-space-between" v-else>
      <slot></slot>
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
    isLoading: { type: Boolean, rquired: true },
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
          let genderData = {};
          for (let [key, value] of Object.entries(data.data)) {
            if (typeof value !== "object") {
              formattedData[key] = this.getFormattedCount(value);
            } else {
              formattedData[key] = value;
            }
          }
          this.statData = formattedData;
          //   this.statData = data?.data ?? [];
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