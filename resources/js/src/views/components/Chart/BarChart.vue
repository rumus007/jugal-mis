<template>
  <div>
    <apexchart
      width="450"
      type="bar"
      :options="chartOptions"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";
import {englishToNepaliNumber} from "nepali-number";
export default {
  name: "BarChart",
  props: {
    data: { type: Array, required: true },
    horizontalBar : {type: Boolean, required: true}
    // options: { type: Object, required: true },
  },
  components: {
    apexchart: VueApexCharts,
  },
  computed: {
    categories() {
      return this.data.map((barChartData) => barChartData.category);
    },
    stats() {
      return this.data.map((barChartData) => barChartData.total);
    },
    series() {
      return [
        {
          data: [...this.stats],
        },
      ];
    },

    chartOptions() {
      return {
        chart: {
          type: "bar",
        },
        colors: "#028EFF",
        plotOptions: {
            bar: {
                horizontal: this.horizontalBar,
            }
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
          axisTicks: {
            show: false,
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
        //  todo add local check
        tooltip: {
          style: {
            fontSize: "12px",
            fontFamily: "Noto Sans, sans-serif",
          },
          x: {
            show: false,
          },
          y: {
            formatter: function (value) {
              return englishToNepaliNumber(value)
            },
            title: {
              formatter: (seriesName) => "",
            },
          },
          marker: {
            show: false,
          },
        },
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
