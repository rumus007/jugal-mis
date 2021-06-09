<template>
  <div>
    <h2>घरकाे फाेहरमैला व्यवस्थापन</h2>
    <div class="chart-wrapper flex">
      <house-chart
        :showLoader="showWateMgmtLoader"
        :data="wasteMgmtData"
        :title="'घरबाट निस्कने फाेहाेरकाे व्यवस्थापन'"
        :showGraphText="'showWasteMgmtGraph'"
        :showGraph="showWasteMgmtGraph"
        :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle:'घरबाट निस्कने फाेहाेरकाे व्यवस्थापन', yAxisTitle:'जम्मा' }"
        @graphFunction="showGraph"
        @tableFunction="showTable"
      />
    </div>
  </div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "HouseWasteMgmt",
  components: {
    HouseChart: () => import("./HouseChart"),
  },
  data: function () {
    return {
      showWateMgmtLoader: false,
      wasteMgmtData: [],
      showWasteMgmtGraph: true,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getVulnerableData: function () {
      this.showWateMgmtLoader = true;
      const targetUrl = `household/waste-mgmt`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.wasteMgmtData = data?.data ?? [];
          this.showWateMgmtLoader = false;
        })
        .catch(() => {
          this.showWateMgmtLoader = false;
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
        this.getVulnerableData();
      },
      deep: true,
    },
  },
  mounted() {
    this.getVulnerableData();
  },
};
</script>

<style scoped>
</style>

