<template>
<div>
  <h2>राेजगारीकाे अवस्था</h2>
  <div class="chart-wrapper flex">
    <individual-chart
      :showLoader="showEmploymentStatsLoader"
      :data="employmentStatsData"
      :title="'राेजगारीकाे अवस्था'"
      :tableTitle="'राेजगारीकाे अवस्था'"
      :showGraphText="'showEmploymentStatsGraph'"
      :showGraph="showEmploymentStatsGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle: 'राेजगारीकाे अवस्था', yAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showFullChartClass= "true"
      :showVerticalChartClass= "true"
    />

    <!-- <div class="card chart">
      <div v-if="showPrivateBusinessLoader" class="loader-wrapper">
        <loader />
      </div>
      <div v-else>
        <div v-if="privateBusinessData.length === 0"><no-data /></div>
        <div v-else>
          <h3>व्यवसायमा संलग्न जनसंख्या</h3>
          <Table :data="privateBusinessData" />
        </div>
      </div>
    </div> -->

    <individual-chart
      :showLoader="showForeignEmploymentLoader"
      :data="foreignEmploymentData"
      :title="'वैदेशिक राेजगारीकाे अवस्था'"
      :tableTitle="'वैदेशिक राेजगारीकाे अवस्था'"
      :showGraphText="'foreignEmploymentGraph'"
      :showGraph="foreignEmploymentGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle: 'वैदेशिक राेजगारीकाे अवस्था', yAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showFullChartClass= "true"
      :showVerticalChartClass= "true"
    />
  </div>
  </div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "EmploymentStatus",
  components: {
    IndividualChart: () => import("./IndividualChart"),
    Loader: () => import("../components/Loader/Loader"),
    NoData: () => import("../components/NoData/NoData"),
    Table: () => import("../components/Table/Table"),
  },
  data: function () {
    return {
      foreignEmploymentGraph: true,
      foreignEmploymentData: [],
      showForeignEmploymentLoader: false,

      privateBusinessData: [],
      showPrivateBusinessLoader: false,

      showEmploymentStatsGraph: true,
      employmentStatsData: [],
      showEmploymentStatsLoader: false,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getFromApi: function (loader, stateData, url) {
      this[loader] = true;
      const targetUrl = `individual/${url}`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this[stateData] = data?.data ?? [];
          this[loader] = false;
        })
        .catch(() => {
          this[loader] = false;
        });
    },
  },
  mounted() {
    this.getFromApi(
      "showEmploymentStatsLoader",
      "employmentStatsData",
      "employment-status"
    );
    this.getFromApi(
      "showForeignEmploymentLoader",
      "foreignEmploymentData",
      "foreign-employment"
    );
    this.getFromApi(
      "showHouseListedLoader",
      "privateBusinessData",
      "private-business"
    );
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getFromApi(
          "showEmploymentStatsLoader",
          "employmentStatsData",
          "employment-status"
        );

        this.getFromApi(
          "showHouseListedLoader",
          "privateBusinessData",
          "private-business"
        );

        this.getFromApi(
          "showHouseListedLoader",
          "privateBusinessData",
          "private-business"
        );
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
