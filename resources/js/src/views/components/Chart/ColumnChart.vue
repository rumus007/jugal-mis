<template>
  <div>
    <apexchart
      type="bar"
      height="300"
      :options="chartOptions"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";
import {englishToNepaliNumber} from "nepali-number"
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
        colors: ['#995BE3', '#46C0B8'],
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
          labels: {
            style: {
              fontSize: "12px",
              fontFamily: "Noto Sans, sans-serif",
            },
            formatter: function (value) {
                  return englishToNepaliNumber(value) ;
            }
          },
        },
        yaxis: {
          labels: {
            style: {
              fontSize: "12px",
              fontFamily: "Noto Sans, sans-serif",
            },
            formatter: function (value) {
                  return englishToNepaliNumber(value) ;
            }
          },
        },
        tooltip: {
          enabled: true,
           x: {
              show: false,
              formatter: function (value) {
                return englishToNepaliNumber(value) ;
            }
          },
          y: {
              formatter: function (value) {
                return englishToNepaliNumber(value) ;
            },
              title: {
                  formatter: (seriesName) => '',
              },
          }
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
