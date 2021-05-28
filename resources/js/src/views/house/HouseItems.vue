<template>
  <div class="chart-wrapper flex">
    <div class="chart-wrapper flex">
      <div class="charts">
        <h3>परिवारका लागि खानेपानीकाे स्राेत</h3>
        <div class="chart">
          <button v-on:click="showTable('showLineChartGraph')">
            Show table
          </button>
          <button v-on:click="showGraph('showLineChartGraph')">
            Show graph
          </button>
          <div v-if="showLineChartGraph">
            <LineChart :series="lineChartSeries" :options="lineChartOptions" />
          </div>
          <div v-else>
            <Table :data="tableLineChartData" />
          </div>
        </div>
      </div>
      <div class="charts">
        <h3>खाना पकाउने मुख्य इन्धन</h3>
        <div class="chart">
          <button v-on:click="showTable('showBarChartGraph')">
            Show table
          </button>
          <button v-on:click="showGraph('showBarChartGraph')">
            Show graph
          </button>
          <div v-if="showBarChartGraph">
            <BarChart :data="barChartSeries" />
          </div>
          <div v-else>
            <Table :data="barChartSeries" />
          </div>
        </div>
      </div>
      <div class="charts">
        <h3>विद्युतकाे प्रमुख इन्धन</h3>
        <div class="chart">
          <button v-on:click="showTable('showLineChartGraph')">
            Show table
          </button>
          <button v-on:click="showGraph('showLineChartGraph')">
            Show graph
          </button>
          <div v-if="showLineChartGraph">
            <LineChart :series="lineChartSeries" :options="lineChartOptions" />
          </div>
          <div v-else>
            <Table :data="tableLineChartData" />
          </div>
        </div>
      </div>
      <div class="charts">
        <h3>बैकल्पिक इन्धनकाे प्रयाेग</h3>
        <div class="chart">
          <button v-on:click="showTable('showBarChartGraph')">
            Show table
          </button>
          <button v-on:click="showGraph('showBarChartGraph')">
            Show graph
          </button>
          <div v-if="showBarChartGraph">
            <BarChart :data="barChartSeries" />
          </div>
          <div v-else>
            <Table :data="barChartSeries" />
          </div>
        </div>
      </div>
      <div class="charts">
        <h3>आधारभुत स्वास्थ्य सेवाका लागि जाँदा लाग्ने समय</h3>
        <div class="chart">
          <button v-on:click="showTable('showLineChartGraph')">
            Show table
          </button>
          <button v-on:click="showGraph('showLineChartGraph')">
            Show graph
          </button>
          <div v-if="showLineChartGraph">
            <LineChart :series="lineChartSeries" :options="lineChartOptions" />
          </div>
          <div v-else>
            <Table :data="tableLineChartData" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Tabs, Tab } from "vue-tabs-component";

export default {
  name: "HouseItems",
  components: {
    BarChart: () => import("../components/Chart/BarChart"),
    LineChart: () => import("../components/Chart/LineChart"),
    PieChart: () => import("../components/Chart/PieChart"),
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
        { category: "निजी/आफ्नै", total: 50 },
        { category: "आफ्न्त", total: 30 },
        { category: "भाडामा", total: 70 },
        { category: "संस्थागत", total: 100 },
        { category: "अन्य", total: 1200 },
      ],

      tableBarChartData: [
        { category: "निजी/आफ्नै", total: 50 },
        { category: "आफ्न्त", total: 30 },
        { category: "भाडामा", total: 70 },
        { category: "संस्थागत", total: 100 },
        { category: "अन्य", total: 1200 },
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

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.charts {
  width: 48%;
}

.chart {
  background: #f5f5f7;
  border-radius: 8px;
  height: 370px;
  margin-bottom: 40px;
  padding: 24px;
  &-wrapper {
    flex-wrap: wrap;
    justify-content: space-between;
  }
  button {
    margin-bottom: 24px;
  }
}
</style>
