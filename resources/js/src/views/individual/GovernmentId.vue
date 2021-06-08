<template>
<div><h2>नागरिकतासहितका परिचयपत्र</h2>
  <div class="chart-wrapper flex">
    <individual-chart
      :showLoader="showGovIdLoader"
      :data="govIdData"
      :title="'नागरिकतासहितका परिचयपत्र'"
      :showGraphText="'showGovIdGraph'"
      :showGraph="showGovIdGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle: 'बच्चालाई खाेपकाे अवस्था', yAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
  </div>
  </div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "GovernmentId",
  components: {
    IndividualChart: () => import("./IndividualChart"),
  },
  data: function () {
    return {
      showGovIdGraph: true,
      govIdData: [],
      showGovIdLoader: false,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getFromApi: function (loader, stateData, url) {
      this[loader] = true;
      const targetUrl = `individual/${url}`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this[stateData] = data.data;
          this[loader] = false;
        })
        .catch(() => {
          this[loader] = false;
        });
    },

  },
  mounted() {
    this.getFromApi("showGovIdLoader", "govIdData", "government-id");
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getFromApi("showGovIdLoader", "govIdData", "government-id");
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
