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
import { englishToNepaliNumber } from "nepali-number";
export default {
  name: "BarChart",
  props: {
    data: { type: Array, required: true },
    horizontalBar: { type: Boolean, required: true },
    // options: { type: Object, required: true },
  },
  components: {
    apexchart: VueApexCharts,
  },
  computed: {
    categories() {
      // return this.data.map((barChartData) => barChartData.category);
      return this.data.map((barChartData) => {
        let categoryData = barChartData.category.split(" ");
        return categoryData.length > 1 ? categoryData : barChartData.category;
      });
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
          },
        },
        dataLabels: {
          enabled: false,
        },
        xaxis: {
          categories: [...this.categories],
          labels: {
            show: true,
            rotate: 0,
            trim: true,
            maxHeight: 59,
            style: {
              fontSize: "12px",
              fontFamily: "Noto Sans, sans-serif",
            },
            formatter: function (value) {
              // let formattedMultiline =
              //   typeof value === "object" ? [...value] : value;
              // if (typeof value === "object" && value.length > 3) {
              //   formattedMultiline[2] = value[2] + "...";
              // }
              if (typeof value === "number") {
                return englishToNepaliNumber(value);
              }
              return value;
            },
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
              if (typeof value === "number") {
                return englishToNepaliNumber(value);
              }
              return value;
            },
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
              return englishToNepaliNumber(value);
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
