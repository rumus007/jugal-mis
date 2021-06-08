<template>
<div>
  <h2>भाैतिक पूर्वाधारकाे अवस्था</h2>
  <div class="chart-wrapper flex">
    <house-chart
      :showLoader="showFacilitiesLoader"
      :data="facilitiesData"
      :title="'परिवारमा उपलब्ध सुविधा'"
      :showGraphText="'showFacilitiesGraph'"
      :showGraph="showFacilitiesGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle:'भूकम्प प्रतिराेधी घर', xAxisTitle:'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
  </div>
</div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "HouseFacilities",
  components: {
    HouseChart: () => import("./HouseChart"),
  },
  data: function () {
    return {
      showFacilitiesLoader: false,
      facilitiesData: [],
      showFacilitiesGraph: true,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getFacilitiesData: function () {
      this.showFacilitiesLoader = true;
      const targetUrl = `household/facilities`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.facilitiesData = data?.data ?? [];
          this.showFacilitiesLoader = false;
        })
        .catch(() => {
          this.showFacilitiesLoader = false;
        });
    },
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getFacilitiesData();
      },
      deep: true,
    },
  },
  mounted() {
    this.getFacilitiesData();
  },
};
</script>

<style scoped>
</style>

