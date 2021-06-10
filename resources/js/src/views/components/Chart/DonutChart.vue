<template>
  <div>
    <apexchart height="260" :options="chartOptions" :series="series"></apexchart>
  </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";
import { englishToNepaliNumber } from "nepali-number";
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
      // console.log([...this.stats])
      return [...this.stats];
    },

    chartOptions() {
      return {
        chart: {
          type: "donut",
          toolbar: {
            show: true,
          },
        },
        labels: [...this.categories],
        dataLabels: {
          enabled: true,
          style: {
            // colors: ["#666E76"],
          },
          formatter: function (value, { seriesIndex, w }) {
            // this return percentage if you need it
            // let newVal = Math.round(value * 100) / 100 + '%';
            // return englishToNepaliNumber(newVal);

            return englishToNepaliNumber(w.config.series[seriesIndex]);
          },
        },
        fill: {
          colors: this.getColorOptions,
        },
        legend: {
          position: "right",
          horizontalAlign: "center",
          fontSize: "12px",
          fontFamily: "Noto Sans, sans-serif",
          markers: {
            width: 12,
            height: 12,
            strokeWidth: 0,
            strokeColor: "#fff",
            fillColors: this.getColorOptions,
            radius: 2,
          },
        },
        tooltip: {
          enabled: true,
          marker: {
            show: true,
          },
          x: {
            show: false,
            formatter: function (value) {
              return englishToNepaliNumber(value);
            },
          },
          y: {
            formatter: function (value) {
              return englishToNepaliNumber(value);
            },
            title: {
              formatter: (seriesName) => "",
            },
          },
        },
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
    getColorOptions() {
      return [...this.categories].length === 2
        ? ["#995BE3", "#46C0B8"]
        : ["#995BE3", "#46C0B8", "#F97D21"];
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
