<template>
<div>
  <h2>विपद पूर्वतयारी</h2>
  <div class="chart-wrapper flex">
    <house-chart
      :showLoader="showEqResistantLoader"
      :data="eqResistantData"
      :title="'भूकम्प प्रतिराेधी घर'"
      :showGraphText="'showEqResistantGraph'"
      :showGraph="showEqResistantGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <house-chart
      :showLoader="showVulnerableLoader"
      :data="vulnerableData"
      :title="'घरलाइ प्राकृतिक प्रकोपको जोखिम र जाेखिमकाे प्रकार'"
      :showGraphText="'showVulnerableGraph'"
      :showGraph="showVulnerableGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <house-chart
      :showLoader="showRiskMitigateLoader"
      :data="riskMitigateData"
      :title="'घर परिवारको जोखिम पारिवारिक योजना'"
      :showGraphText="'showRiskMitigateGraph'"
      :showGraph="showRiskMitigateGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
  </div>
</div>
</template>
<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "HouseDisasterPrepare",
  components: {
    HouseChart: () => import("./HouseChart"),
  },
  data: function () {
    return {
      showEqResistantLoader: false,
      eqResistantData: [],
      showEqResistantGraph: true,
      showRiskMitigateLoader: false,
      riskMitigateData: [],
      showRiskMitigateGraph: true,
      showVulnerableLoader: false,
      vulnerableData: [],
      showVulnerableGraph: true,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },
    getEQResistantData: function () {
      this.showEqResistantLoader = true;
      const targetUrl = `household/earthquake-resistant`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.eqResistantData = data?.data ?? [];
          this.showEqResistantLoader = false;
        })
        .catch(() => {
          this.showEqResistantLoader = false;
        });
    },
    getVulnerableData: function () {
      this.showVulnerableLoader = true;
      const targetUrl = `household/vulnerable-types`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.vulnerableData = data?.data ?? [];
          this.showVulnerableLoader = false;
        })
        .catch(() => {
          this.showVulnerableLoader = false;
        });
    },
    getRiskMitigationData: function () {
      this.showRiskMitigateLoader = true;
      const targetUrl = `household/risk-mitigation`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.riskMitigateData = data?.data ?? [];
          this.showRiskMitigateLoader = false;
        })
        .catch(() => {
          this.showRiskMitigateLoader = false;
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
        this.getEQResistantData();
        this.getVulnerableData();
        this.getRiskMitigationData();
      },
      deep: true,
    },
  },
  mounted() {
    this.getEQResistantData();
    this.getVulnerableData();
    this.getRiskMitigationData();
  },
};
</script>
<style scoped>
</style>