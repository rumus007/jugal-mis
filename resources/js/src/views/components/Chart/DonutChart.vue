<template>
  <div>
    <apexchart width="360" :options="chartOptions" :series="series"></apexchart>
  </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";
import {englishToNepaliNumber} from "nepali-number";
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
        dataLabels: {
          enabled: false,
          style: {
            fontSize: "12px",
            fontFamily: "Mukta, sans-serif",
          },
        },
        fill: {
          colors: ['#995BE3', '#46C0B8'],
        },
        legend: {
          position: 'right',
          horizontalAlign: 'center', 
          fontSize: "12px",
          fontFamily: "Noto Sans, sans-serif",
          markers: {
            width: 12,
            height: 12,
            strokeWidth: 0,
            strokeColor: '#fff',
            fillColors: ['#995BE3', '#46C0B8'],
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
