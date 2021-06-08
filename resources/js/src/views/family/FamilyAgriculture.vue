<template>
<div>
  <h2>परिवारले कृषि कार्यका लागि जग्गा प्रयोग</h2>
  <div class="chart-wrapper flex">
    <family-chart
      :showLoader="showLandInAgriLoader"
      :data="landInAgriData"
      :title="'परिवारले कृषि कार्यका लागि भूमि  प्रयोग'"
      :showGraphText="'showLandInAgriGraph'"
      :showGraph="showLandInAgriGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <family-chart
      :showLoader="showAgriLandTitleLoader"
      :data="agriLandTitleData"
      :title="'कृषिमा प्रयोग भइरहेको भूमि'"
      :showGraphText="'showAgriLandTitleGraph'"
      :showGraph="showAgriLandTitleGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <family-chart
      :showLoader="showBankLoader"
      :data="bankData"
      :title="'कम्तिमा परिवारका एक सदस्यको बैंक खाताको उपलब्धता'"
      :showGraphText="'showBankGraph'"
      :showGraph="showBankGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <family-chart
      :showLoader="showAgriProdLoader"
      :data="agriProdData"
      :title="'कृषि उत्पादनहरूको बिक्रीको प्रकृति'"
      :showGraphText="'showAgriProdGraph'"
      :showGraph="showAgriProdGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
  </div>
</div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "FamilyAgriculture",
  components: {
    FamilyChart: () => import("./FamilyChart"),
  },
  data: function () {
    return {
      showLandInAgriGraph: true,
      landInAgriData: [],
      showLandInAgriLoader: false,

      showAgriLandTitleGraph: true,
      agriLandTitleData: [],
      showAgriLandTitleLoader: false,

      showBankGraph: true,
      bankData: [],
      showBankLoader: false,

      showAgriProdGraph: true,
      agriProdData: [],
      showAgriProdLoader: false,

      showLiveStockGraph: true,
      liveStockData: [],
      showLiveStockLoader: false,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getLandInAgriData: function () {
      this.showLandInAgriLoader = true;
      const targetUrl = `family/land-in-agriculture`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.landInAgriData = data.data;
          this.showLandInAgriLoader = false;
        })
        .catch(() => {
          this.showLandInAgriLoader = false;
        });
    },

    getHasLiveStockData: function () {
      this.showLiveStockLoader = true;
      const targetUrl = `family/has-livestocks`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.liveStockData = data.data;
          this.showLiveStockLoader = false;
        })
        .catch(() => {
          this.showLiveStockLoader = false;
        });
    },

    getAgriLandTitleData: function () {
      this.showAgriLandTitleLoader = true;
      const targetUrl = `family/land-title-agriculture`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.agriLandTitleData = data.data;
          this.showAgriLandTitleLoader = false;
        })
        .catch(() => {
          this.showAgriLandTitleLoader = false;
        });
    },

    getBankData: function () {
      this.showBankLoader = true;
      const targetUrl = `family/banking-details`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.bankData = data.data;
          this.showBankLoader = false;
        })
        .catch(() => {
          this.showBankLoader = false;
        });
    },

    getAgriProductsData: function () {
      this.showAgriProdLoader = true;
      const targetUrl = `family/agricultural-products`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.agriProdData = data.data;
          this.showAgriProdLoader = false;
        })
        .catch(() => {
          this.showAgriProdLoader = false;
        });
    },

    getLiveStockInFamData: function () {
      this.showLiveStockLoader = true;
      const targetUrl = `family/livestock-in-family`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.liveStockData = data.data;
          this.showLiveStockLoader = false;
        })
        .catch(() => {
          this.showLiveStockLoader = false;
        });
    },

    getFishBeeSilkData: function () {
      this.showLiveStockLoader = true;
      const targetUrl = `family/has-fish-bee-silkworm`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.liveStockData = data.data;
          this.showLiveStockLoader = false;
        })
        .catch(() => {
          this.showLiveStockLoader = false;
        });
    },
  },
  mounted() {
    this.getLandInAgriData();
    this.getAgriLandTitleData();
    this.getBankData();
    this.getAgriProductsData();
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getLandInAgriData();
        this.getAgriLandTitleData();
        this.getBankData();
        this.getAgriProductsData();
  
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
