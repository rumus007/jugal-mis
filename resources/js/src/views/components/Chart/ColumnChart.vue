<template>
  <div>
    <apexchart
      type="bar"
      height="350"
      :options="chartOptions"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";
export default {
  name: "ColumnChart",
  props: {
    data: { type: Array, required: true },
    categoryData: { type: Array, required: true },
  },
  components: {
    apexchart: VueApexCharts,
  },
  computed: {
    categories() {
      return this.categoryData
    },
    stats() {
      return this.data;
    },
    series() {
      return this.stats;
    },

    chartOptions() {
      return {
        chart: {
          type: "bar",
          height: 350,
          zoom: false,
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: "55%",
            endingShape: "rounded",
          },
        },
        dataLabels: {
          enabled: false,
        },
        xaxis: {
          categories: [...this.categories],
        },
        // // stroke: {
        // //   show: true,
        // //   width: 2,
        // //   colors: ["transparent"],
        // // },
        // // yaxis: {
        // //   title: {
        // //     text: "$ (thousands)",
        // //   },
        // // },
        // fill: {
        //   opacity: 1,
        // },
        // tooltip: {
        //   y: {
        //     formatter: function (val) {
        //       return "$ " + val + " thousands";
        //     },
        //   },
        // },
      };
    },
  },
  data: function () {
    return {
      showGraph: true,
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
