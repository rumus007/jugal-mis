<template>
  <div>
    <apexchart width="400" :options="chartOptions" :series="series"></apexchart>
  </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";
export default {
  name: "DonutChart",
  props: {
    data: { type: Array, required: true },
  },
  components: {
    apexchart: VueApexCharts,
  },

  computed: {
    categories() {
      return this.data.map((pieChartData) => pieChartData.category);
    },
    stats() {
      return this.data.map((pieChartData) => pieChartData.total);
    },
    series() {
      return [...this.stats];
    },

    chartOptions() {
      return {
        chart: {
          type: "donut",
        },
        labels: [...this.categories],
        // dataLabels: {
        //   enabled: false,
        //   style: {
        //     fontSize: "12px",
        //     fontFamily: "Mukta, sans-serif",
        //   },
        // },
        // fill: {
        //   colors: ["#35cec8", "#eee"],
        // },
        // legend: {
        //   show: false,
        // },
        // tooltip: {
        //   enabled: true,
        // },
        // states: {
        //   hover: {
        //     filter: {
        //       type: "none",
        //     },
        //   },
        // },

        // responsive: [
        //   {
        //     breakpoint: 480,
        //     options: {
        //       chart: {
        //         width: 200,
        //       },
        //       legend: {
        //         position: "bottom",
        //       },
        //     },
        //   },
        // ],
      };
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
