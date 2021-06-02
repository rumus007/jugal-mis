<template>
  <div class="chart-wrapper flex">
    <div class="charts">
      <h3>घरकाेे जग</h3>
      <div class="card chart">
        <div class="view-icons">
          <button
            v-on:click="showGraph('showFoundationGraph')"
            :class="showFoundationGraph ? 'active' : ''"
          >
            <img src="images/ic_graph.svg" alt="" width="16" height="16" />
          </button>
          <button
            v-on:click="showTable('showFoundationGraph')"
            :class="!showFoundationGraph ? 'active' : ''"
          >
            <img src="images/ic_table.svg" alt="" width="16" height="16" />
          </button>
        </div>
        <div v-if="showFoundationGraph">
          <BarChart :data="foundationData" />
        </div>
        <div v-else>
          <Table :data="foundationData" />
        </div>
      </div>
    </div>
    <div class="charts">
      <!-- <h3>वडागत रुपमा घरकाे संख्या</h3> -->
      <h3>घरको number</h3>
      <div class="card chart">
        <div class="view-icons">
          <button
            v-on:click="showGraph('showHouseNumberGraph')"
            :class="showHouseNumberGraph ? 'active' : ''"
          >
            <img src="images/ic_graph.svg" alt="" width="16" height="16" />
          </button>
          <button
            v-on:click="showTable('showHouseNumberGraph')"
            :class="!showHouseNumberGraph ? 'active' : ''"
          >
            <img src="images/ic_table.svg" alt="" width="16" height="16" />
          </button>
        </div>
        <div v-if="showHouseNumberGraph">
          <DonutChart :data="houseNumberData" />
        </div>
        <div v-else>
          <Table :data="houseNumberData" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { filterObject } from "../../common/helper.js";

export default {
  name: "PopulationDistribution",
  components: {
    BarChart: () => import("../components/Chart/BarChart"),
    LineChart: () => import("../components/Chart/LineChart"),
    PieChart: () => import("../components/Chart/PieChart"),
    DonutChart: () => import("../components/Chart/DonutChart"),
    Table: () => import("../components/Table/Table"),
  },
  data: function () {
    return {
      showOwnerShipGraph: true,
      ownershipData: [],
      showHouseNumberGraph: true,
      houseNumberData: [],
      showFoundationGraph: true,
      foundationData: [],
      showRoofingGraph: true,
      roofingData: [],
      showRoadtoHouseGraph: true,
      roadToHouseData: [],
      showRoadTypeGraph: true,
      roadTypeData: [],

      showBarChartGraph: true,

      barChartoptions: {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996],
        },
      },
      barChartSeries: [
        {
          name: "bar-chart",
          data: [30, 40, 45, 50, 49, 60],
        },
      ],

      tableBarChartData: [
        { category: 1991, total: 30 },
        { category: 1992, total: 40 },
        { category: 1993, total: 45 },
        { category: 1994, total: 50 },
        { category: 1995, total: 49 },
        { category: 1996, total: 60 },
      ],
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },
    getOwnerShipData: function () {
      const targetUrl = `household/ownership`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = {};
      Object.keys(queryParams).map((data) => {
        if (queryParams[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${queryParams[data].join(",")}`,
          };
        }
      });
      axios.get(targetUrl, { params: formattedParams }).then(({ data }) => {
        this.ownershipData = data.data;
      });
    },
    getHouseNumberData: function () {
      const targetUrl = `household/house-number`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = {};
      Object.keys(queryParams).map((data) => {
        if (queryParams[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${queryParams[data].join(",")}`,
          };
        }
      });

      axios.get(targetUrl, { params: formattedParams }).then(({ data }) => {
        this.houseNumberData = data.data;
      });
    },
    getFoundationData: function () {
      const targetUrl = `household/foundation`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = {};
      Object.keys(queryParams).map((data) => {
        if (queryParams[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${queryParams[data].join(",")}`,
          };
        }
      });

      axios.get(targetUrl, { params: formattedParams }).then(({ data }) => {
        this.foundationData = data.data;
      });
    },
    getRoofingData: function () {
      const targetUrl = `household/roofing`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = {};
      Object.keys(queryParams).map((data) => {
        if (queryParams[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${queryParams[data].join(",")}`,
          };
        }
      });

      axios.get(targetUrl, { params: formattedParams }).then(({ data }) => {
        this.roofingData = data.data;
      });
    },
    getRoadTypeToHouseData: function () {
      const targetUrl = `household/road-type-to-house`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = {};
      Object.keys(queryParams).map((data) => {
        if (queryParams[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${queryParams[data].join(",")}`,
          };
        }
      });

      axios.get(targetUrl, { params: formattedParams }).then(({ data }) => {
        this.roadToHouseData = data.data;
      });
    },
    getRoadTypeData: function () {
      const targetUrl = `household/road-type`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = {};
      Object.keys(queryParams).map((data) => {
        if (queryParams[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${queryParams[data].join(",")}`,
          };
        }
      });

      axios.get(targetUrl, { params: formattedParams }).then(({ data }) => {
        this.roadTypeData = data.data;
      });
    },
  },
  mounted() {
    this.getOwnerShipData();
    this.getHouseNumberData();
    this.getFoundationData();
    this.getRoofingData();
    this.getRoadTypeToHouseData();
    this.getRoadTypeData();
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getOwnerShipData();
        this.getHouseNumberData();
        this.getFoundationData();
        this.getRoofingData();
        this.getRoadTypeToHouseData();
        this.getRoadTypeData();
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
