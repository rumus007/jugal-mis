<template>
<div>
  <apexchart width="500" type="donut" :options="options" :series="series" ></apexchart>
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
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
