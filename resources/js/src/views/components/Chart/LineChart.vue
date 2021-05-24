 <template>
  <div>
    <apexchart
      width="500"
      type="line"
      :options="options"
      :series="series"
    ></apexchart>
  </div>
</template>


<script>
import VueApexCharts from "vue-apexcharts";
export default {
  name: "LineChart",
  props: {
    series: { type: Array, required: true },
    options: { type: Object, required: true },
  },
  components: {
    apexchart: VueApexCharts,
  },
};
</script>

<style scoped>
</style>