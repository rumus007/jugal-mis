<template>
<div><h2>शैक्षिक स्थिति</h2>
  <div class="chart-wrapper flex">
    <individual-chart
      :showLoader="showEducationStatusLoader"
      :data="educationStatusData"
      :title="'शैक्षिक अवस्था'"
      :tableTitle="'शैक्षिक अवस्था'"
      :showGraphText="'showEducationStatusGraph'"
      :showGraph="showEducationStatusGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showDonutChartClass= "true"
    />
    <individual-chart
      :showLoader="showByEducationLoader"
      :data="byEducationData"
      :title="'शैैक्षिक तह'"
      :tableTitle="'शैैक्षिक तह'"
      :showGraphText="'showByEducationGraph'"
      :showGraph="showByEducationGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, yAxisTitle: 'शैैक्षिक तह', xAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showVerticalChartClass= "true"
    />
  </div>
</div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "EducationStatus",
  components: {
    IndividualChart: () => import("./IndividualChart"),
  },
  data: function () {
    return {
      showEducationStatusGraph: true,
      educationStatusData: [],
      showEducationStatusLoader: false,

      showByEducationGraph: true,
      byEducationData: [],
      showByEducationLoader: false,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getEducationStatusData: function () {
      this.showEducationStatusLoader = true;
      const targetUrl = `individual/population-by-literacy`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.educationStatusData = data.data;
          this.showEducationStatusLoader = false;
        })
        .catch(() => {
          this.showEducationStatusLoader = false;
        });
    },

    getEducationLevelData: function () {
      this.showByEducationLoader = true;
      const targetUrl = `individual/education-level`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.byEducationData = data?.data ?? [];
          this.showByEducationLoader = false;
        })
        .catch(() => {
          this.showByEducationLoader = false;
        });
    },
  },
  mounted() {
    this.getEducationLevelData();
    this.getEducationStatusData();
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getEducationLevelData();
        this.getEducationStatusData();
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
