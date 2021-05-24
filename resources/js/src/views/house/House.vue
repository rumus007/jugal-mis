<template>
  <div>
    <div>
      <button v-on:click="showTable('showBarChartGraph')">Show table</button>
      <button v-on:click="showGraph('showBarChartGraph')">Show graph</button>
      <div v-if="showBarChartGraph">
        <BarChart :series="barChartSeries" :options="barChartoptions" />
      </div>
      <div v-else>
        <Table :data="tableBarChartData" />
      </div>
    </div>
    <div>
      <button v-on:click="showTable('showLineChartGraph')">Show table</button>
      <button v-on:click="showGraph('showLineChartGraph')">Show graph</button>
      <div v-if="showLineChartGraph">
        <LineChart :series="lineChartSeries" :options="lineChartOptions" />
      </div>
      <div v-else>
        <Table :data="tableLineChartData" />
      </div>
    </div>

    <div>
      <button v-on:click="showTable('showPieChartGraph')">Show table</button>
      <button v-on:click="showGraph('showPieChartGraph')">Show graph</button>
      <div v-if="showPieChartGraph">
        <PieChart :series="pieChartSeries" :options="pieChartOptions" />
      </div>
      <div v-else>
        <Table :data="tablePieChartData" />
      </div>
    </div>
    <button v-on:click="updateData">Update Data</button>
  </div>
</template>

<script>

export default {
  name: "Ghar",
  components:{
        BarChart: () => import("../components/Chart/BarChart"),
        LineChart: () => import("../components/Chart/LineChart"),
        PieChart: () => import("../components/Chart/PieChart"),
        Table: () => import("../components/Table/Table"),
    },
  props: {
    msg: String,
  },
  data: function () {
    return {
      showBarChartGraph: true,
      showLineChartGraph: true,
      showPieChartGraph: true,
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
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
