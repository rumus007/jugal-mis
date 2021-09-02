<template>
<div><h2>व्यवसायिक तालिम प्राप्त जनशक्ति</h2>
  <div class="chart-wrapper flex">
    <individual-chart
      :showLoader="showManpowerTypeLoader"
      :data="manpowerTypeData"
      :title="'व्यवसायिक तालिम प्राप्त जनशक्ति प्रकार'"
      :tableTitle="'व्यवसायिक तालिम प्राप्त जनशक्ति प्रकार'"
      :showGraphText="'showManpowerTypeGraph'"
      :showGraph="showManpowerTypeGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle: 'व्यवसायिक तालिम प्राप्त जनशक्ति प्रकार', yAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showFullChartClass= "true"
      :showVerticalChartClass= "true"
    />
    <individual-chart
      :showLoader="showTrainingTakenLoader"
      :data="trainingTakenData"
      :title="'व्यवसायिक तालिम प्राप्त जनशक्ति लिएको'"
      :tableTitle="'व्यवसायिक तालिम प्राप्त जनशक्ति लिएको'"
      :showGraphText="'showTrainingTaken'"
      :showGraph="showTrainingTaken"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showDonutChartClass= "true"
    />
  </div>
  </div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "Manpower",
  components: {
    IndividualChart: () => import("./IndividualChart"),
  },
  data: function () {
    return {
      showManpowerTypeGraph: true,
      manpowerTypeData: [],
      showManpowerTypeLoader: false,

      showTrainingTaken: true,
      trainingTakenData: [],
      showTrainingTakenLoader: false,
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
      let queryParams = { ward: this.ward, minage: this.ageRange.minValue , maxage: this.ageRange.maxValue};
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this[stateData] = data?.data ?? [];
          this[loader] = false;
        })
        .catch(() => {
          this[loader] = false;
        });
    },
  },
  mounted() {
    this.getFromApi(
      "showManpowerTypeLoader",
      "manpowerTypeData",
      "training-type"
    );
    this.getFromApi(
      "showTrainingTakenLoader",
      "trainingTakenData",
      "training-taken"
    );
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
     ageRange() {
      return this.$store.getters.ageRange;
    },

  },
  watch: {
    ward: {
      handler() {
        this.getFromApi(
          "showManpowerTypeLoader",
          "manpowerTypeData",
          "training-type"
        );
        this.getFromApi(
          "showTrainingTakenLoader",
          "trainingTakenData",
          "training-taken"
        );
      },
      deep: true,
    },
     ageRange: {
      handler() {
        this.getFromApi(
          "showManpowerTypeLoader",
          "manpowerTypeData",
          "training-type"
        );
        this.getFromApi(
          "showTrainingTakenLoader",
          "trainingTakenData",
          "training-taken"
        );
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
