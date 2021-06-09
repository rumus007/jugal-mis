<template>
<div>
  <h2>शाैचालयकाे अवस्था</h2>
  <div class="chart-wrapper flex">
    <house-chart
      :showLoader="showToiletAvailableStatusLoader"
      :data="toiletAvailableStatusData"
      :title="'शाैचालयकाे अवस्था'"
      :showGraphText="'showToiletAvailableGraph'"
      :showGraph="showToiletAvailableGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <house-chart
      :showLoader="showToiletTypeLoader"
      :data="toiletTypeData"
      :title="'शाैचालयकाे प्रकार'"
      :showGraphText="'showToiletTypeGraph'"
      :showGraph="showToiletTypeGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle:'शाैचालयकाे प्रकार', yAxisTitle:'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
  </div>
</div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "HouseToilet",
  components: {
    HouseChart: () => import("./HouseChart"),
  },
  data: function () {
    return {
      showToiletAvailableStatusLoader: false,
      toiletAvailableStatusData: [],
      showToiletAvailableGraph: true,

      showToiletTypeLoader: false,
      toiletTypeData: [],
      showToiletTypeGraph: true,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getToiletAvailableStatus: function () {
      this.showToiletAvailableStatusLoader = true;
      const targetUrl = `household/toilet-availability`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.toiletAvailableStatusData = data?.data ?? [];
          this.showToiletAvailableStatusLoader = false;
        })
        .catch(() => {
          this.showToiletAvailableStatusLoader = false;
        });
    },

    getToiletType: function () {
      this.showToiletTypeLoader = true;
      const targetUrl = `household/toilet-types`;
      let queryParams = { ward: this.ward };
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.toiletTypeData = data?.data ?? [];
          this.showToiletTypeLoader = false;
        })
        .catch(() => {
          this.showToiletTypeLoader = false;
        });
    },
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getToiletAvailableStatus();
        this.getToiletType();
      },
      deep: true,
    },
  },
  mounted() {
    this.getToiletAvailableStatus();
    this.getToiletType();
  },
};
</script>

<style scoped>
</style>

