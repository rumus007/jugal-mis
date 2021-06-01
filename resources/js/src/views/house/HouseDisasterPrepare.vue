<template>
  <div class="chart-wrapper flex">
    <div class="charts">
      <h3>भूकम्प प्रतिराेधी घर</h3>
      <div class="card chart">
        <button v-on:click="showTable('showPieChartGraph')">Show table</button>
        <button v-on:click="showGraph('showPieChartGraph')">Show graph</button>
        <div v-if="showPieChartGraph">
          <PieChart :series="pieChartSeries" :options="pieChartOptions" />
        </div>
        <div v-else>
          <Table :data="tablePieChartData" />
        </div>
      </div>
    </div>
    <div class="charts">
      <h3>घरलाइ प्राकृतिक प्रकोपको जोखिम र जाेखिमकाे प्रकार</h3>
      <div class="card chart">
        <button v-on:click="showTable('showBarChartGraph')">Show table</button>
        <button v-on:click="showGraph('showBarChartGraph')">Show graph</button>
        <div v-if="showBarChartGraph">
          <BarChart :data="tableBarChartData" />
        </div>
        <div v-else>
          <Table :data="tableBarChartData" />
        </div>
      </div>
    </div>
    <div class="charts">
      <h3>विद्युतकाे प्रमुख इन्धन</h3>
      <div class="card chart">
        <button v-on:click="showTable('showLineChartGraph')">Show table</button>
        <button v-on:click="showGraph('showLineChartGraph')">Show graph</button>
        <div v-if="showLineChartGraph">
          <LineChart :series="lineChartSeries" :options="lineChartOptions" />
        </div>
        <div v-else>
          <Table :data="tableLineChartData" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Tabs, Tab } from "vue-tabs-component";

export default {
  name: "HouseDisasterPrepare",
  components: {
    BarChart: () => import("../components/Chart/BarChart"),
    LineChart: () => import("../components/Chart/LineChart"),
    PieChart: () => import("../components/Chart/PieChart"),
    ColumnChart: () => import("../components/Chart/ColumnChart"),
    Table: () => import("../components/Table/Table"),
    TitleBar: () => import("../shared/TitleBar"),
    Tabs,
    Tab,
    // TabFilter: () => import("../components/TabFilter/TabFilter"),
  },
  props: {
    msg: String,
  },
  data: function () {
    return {
      showBarChartGraph: true,
      showLineChartGraph: true,
      showPieChartGraph: true,
      houseHoldOwnershipData: [],
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

      lineChartOptions: {
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998],
        },
      },

      lineChartSeries: [
        {
          name: "line-chart",
          data: [30, 40, 45, 50, 49, 60, 70, 91],
        },
      ],

      tableLineChartData: [
        { category: 1991, total: 30 },
        { category: 1992, total: 40 },
        { category: 1993, total: 45 },
        { category: 1994, total: 50 },
        { category: 1995, total: 49 },
        { category: 1996, total: 60 },
      ],

      pieChartSeries: [44, 55, 41, 17, 15],

      pieChartOptions: {
        chart: {
          type: "donut",
        },
      },

      tablePieChartData: [
        { category: 1991, total: 30 },
        { category: 1992, total: 40 },
        { category: 1993, total: 45 },
        { category: 1994, total: 50 },
        { category: 1995, total: 49 },
        { category: 1996, total: 60 },
      ],

      columnChartData: [
        {
          name: "Net Profit",
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
        },
        {
          name: "Revenue",
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
        },
        {
          name: "Free Cash Flow",
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
        },
      ],
    };
  },
  methods: {
    updateData: function () {
      this.barChartoptions = {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
        },
      };
    },
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },
    getHouseStatusData: function () {
      const targetUrl = `household/ownership`;
      let queryParams = Object.assign({}, this.filter);
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
        this.houseHoldOwnershipData = data.data;
      });

      // this.filter.resource_type_id.length !== 0
      //   ? axios.get(targetUrl, { params: formattedParams }).then(({ data }) => {
      //       this.mapData = data.data;
      //     })
      //   : (this.mapData = []);
    },
  },
};
</script>

<style scoped>
</style>

