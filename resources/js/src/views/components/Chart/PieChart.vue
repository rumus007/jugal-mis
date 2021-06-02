<template>
<div>
  <apexchart width="400" type="donut" :options="chartOptions" :series="series" ></apexchart>
</div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";
export default {
  name: 'PieChart',
  props: {
    series: {type: Array, required: true},
    options: {type: Object, required: true},
  },
  components:{
    apexchart: VueApexCharts
  },
  chartOptions() {
     return {
        colors: ['#995BE3', '#46C0B8'],
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
