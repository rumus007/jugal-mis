<template>
  <div>
    <apexchart
      width="500"
      type="bar"
      :options="options"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";
export default {
  name: "BarChart",
  props: {
    series: { type: Array, required: true },
    options: { type: Object, required: true },
  },
  components: {
    apexchart: VueApexCharts,
  },
  data:function (){
    return {
      showGraph : true
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
