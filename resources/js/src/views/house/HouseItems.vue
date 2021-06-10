<template>
<div>
  <h2>उपयाेग्य बस्तु</h2>
  <div class="chart-wrapper flex">
    <house-chart
      :showLoader="showDrinkWaterSrcLoader"
      :data="drinkWaterSrcData"
      :title="'परिवारका लागि खानेपानीकाे स्राेत'"
      :showGraphText="'showDrinkWaterSrcGraph'"
      :showGraph="showDrinkWaterSrcGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle:'परिवारका लागि खानेपानीकाे स्राेत', yAxisTitle:'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showVerticalChartClass="true"
    />

    <house-chart
      :showLoader="showCookFuelLoader"
      :data="cookFuelData"
      :title="'खाना पकाउने मुख्य इन्धन'"
      :showGraphText="'showCookFuelGraph'"
      :showGraph="showCookFuelGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle:'खाना पकाउने मुख्य इन्धन', yAxisTitle:'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showVerticalChartClass="true"
    />

    <house-chart
      :showLoader="showElectricitySrcLoader"
      :data="electrictySrcData"
      :title="'विद्युतकाे प्रमुख इन्धन'"
      :showGraphText="'showElectricitySrcGraph'"
      :showGraph="showElectricitySrcGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle:'विद्युतकाे प्रमुख इन्धन', xAxisTitle:'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <house-chart
      :showLoader="showAlternativeSrcLoader"
      :data="alternativeSrcData"
      :title="'बैकल्पिक इन्धनकाे प्रयाेग'"
      :showGraphText="'showAlternativeSrcGraph'"
      :showGraph="showAlternativeSrcGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle:'बैकल्पिक इन्धनकाे प्रयाेग', yAxisTitle:'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showVerticalChartClass="true"
    />

    <house-chart
      :showLoader="showTimeForHealthCare"
      :data="timeForHealthCareData"
      :title="'आधारभुत स्वास्थ्य सेवाका लागि जाँदा लाग्ने समय'"
      :showGraphText="'showTimeForHealthCareGraph'"
      :showGraph="showTimeForHealthCareGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle:'आधारभुत स्वास्थ्य सेवाका लागि जाँदा लाग्ने समय', yAxisTitle:'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showVerticalChartClass="true"
    />

    <house-chart
      :showLoader="showTimeForWaterFetchLoader"
      :data="timeForWaterFetchData"
      :title="'खानेपानी लिनका लागि जाँदा लाग्ने समय'"
      :showGraphText="'showTimeForWaterFetchGraph'"
      :showGraph="showTimeForWaterFetchGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle:'खानेपानी लिनका लागि जाँदा लाग्ने समय', yAxisTitle:'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showVerticalChartClass="true"
    />

    <house-chart
      :showLoader="showNewBornLocationLoader"
      :data="newBornLocationData"
      :title="'शिशुकाे जन्म भएकाे स्थान'"
      :showGraphText="'showNewBornLocationGraph'"
      :showGraph="showNewBornLocationGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle:'शिशुकाे जन्म भएकाे स्थान', xAxisTitle:'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
  </div>
</div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";
export default {
  name: "HouseItems",
  components: {
    HouseChart: () => import("./HouseChart"),
  },
  data: function () {
    return {
      showDrinkWaterSrcGraph: true,
      drinkWaterSrcData: [],
      showDrinkWaterSrcLoader: false,
      showTimeForHealthCareGraph: true,
      timeForHealthCareData: [],
      showTimeForHealthCare: false,
      showAlternativeSrcGraph: true,
      alternativeSrcData: [],
      showAlternativeSrcLoader: false,
      showElectricitySrcGraph: true,
      electrictySrcData: [],
      showElectricitySrcLoader: false,
      showTimeForWaterFetchGraph: true,
      timeForWaterFetchData: [],
      showTimeForWaterFetchLoader: false,
      showCookFuelGraph: true,
      cookFuelData: [],
      showCookFuelLoader: false,
      showNewBornLocationGraph: true,
      newBornLocationData: [],
      showNewBornLocationLoader: false,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },
    getSourceDrinkWaterData: function () {
      this.showDrinkWaterSrcLoader = true;
      const targetUrl = `household/source-drinking-water`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.drinkWaterSrcData = data?.data ?? [];
          this.showDrinkWaterSrcLoader = false;
        })
        .catch(() => {
          this.showDrinkWaterSrcLoader = false;
        });
    },
    getTimeForHealthCareData: function () {
      this.showTimeForHealthCare = true;
      const targetUrl = `household/distance-basic-healthcare`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.timeForHealthCareData = data?.data ?? [];
          this.showTimeForHealthCare = false;
        })
        .catch(() => {
          this.showTimeForHealthCare = false;
        });
    },
    getFoundationData: function () {
      this.showAlternativeSrcLoader = true;
      const targetUrl = `household/source-alternate-energy`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.alternativeSrcData = data?.data ?? [];
          this.showAlternativeSrcLoader = false;
        })
        .catch(() => {
          this.showAlternativeSrcLoader = false;
        });
    },
    getElectricitySrcData: function () {
      this.showElectricitySrcLoader = true;
      const targetUrl = `household/source-electricity`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.electrictySrcData = data?.data ?? [];
          this.showElectricitySrcLoader = false;
        })
        .catch(() => {
          this.showElectricitySrcLoader = false;
        });
    },
    getTimeForWaterFetchData: function () {
      this.showTimeForWaterFetchLoader = true;
      const targetUrl = `household/distance-fetch-water`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.timeForWaterFetchData = data?.data ?? [];
          this.showTimeForWaterFetchLoader = false;
        })
        .catch(() => {
          this.showTimeForWaterFetchLoader = false;
        });
    },

    getCookFuelData: function () {
      this.showCookFuelLoader = true;
      const targetUrl = `household/source-fuel`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.cookFuelData = data?.data ?? [];
          this.showCookFuelLoader = false;
        })
        .catch(() => {
          this.showCookFuelLoader = false;
        });
    },

    getNewBornLocationData: function () {
      this.showNewBornLocationLoader = true;
      const targetUrl = `household/newborn-birthplace`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.newBornLocationData = data?.data ?? [];
          this.showNewBornLocationLoader = false;
        })
        .catch(() => {
          this.showNewBornLocationLoader = false;
        });
    },
  },
  mounted() {
    this.getSourceDrinkWaterData();
    this.getTimeForHealthCareData();
    this.getFoundationData();
    this.getElectricitySrcData();
    this.getTimeForWaterFetchData();
    this.getCookFuelData();
    this.getNewBornLocationData();
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getSourceDrinkWaterData();
        this.getTimeForHealthCareData();
        this.getFoundationData();
        this.getElectricitySrcData();
        this.getTimeForWaterFetchData();
        this.getCookFuelData();
        this.getNewBornLocationData();
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
