<template>
  <div class="chart-wrapper flex">
    <div class="charts">
      <h3>भूकम्प प्रतिराेधी घर</h3>
      <div class="card chart">
        <div v-if="showEqResistantLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="eqResistantData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showEqResistantGraph')"
                :class="showEqResistantGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showEqResistantGraph')"
                :class="!showEqResistantGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showEqResistantGraph">
              <DonutChart :data="eqResistantData" />
            </div>
            <div v-else>
              <Table :data="eqResistantData" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="charts">
      <h3>घरलाइ प्राकृतिक प्रकोपको जोखिम र जाेखिमकाे प्रकार</h3>
      <div class="card chart">
        <div v-if="showVulnerableLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="vulnerableData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showVulnerableGraph')"
                :class="showVulnerableGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showVulnerableGraph')"
                :class="!showVulnerableGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showVulnerableGraph">
              <BarChart :data="vulnerableData" :horizontalBar="false" />
            </div>
            <div v-else>
              <Table :data="vulnerableData" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="charts">
      <h3>घर परिवारको जोखिम पारिवारिक योजना</h3>
      <div class="card chart">
        <div v-if="showRiskMitigateLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="riskMitigateData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showRiskMitigateGraph')"
                :class="showRiskMitigateGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showRiskMitigateGraph')"
                :class="!showRiskMitigateGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showRiskMitigateGraph">
              <DonutChart :data="riskMitigateData" />
            </div>
            <div v-else>
              <Table :data="riskMitigateData" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { filterObject } from "../../common/helper.js";

export default {
  name: "HouseDisasterPrepare",
  components: {
    BarChart: () => import("../components/Chart/BarChart"),
    DonutChart: () => import("../components/Chart/DonutChart"),
    Table: () => import("../components/Table/Table"),
    Loader: () => import("../components/Loader/Loader"),
    NoData: () => import("../components/NoData/NoData"),
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
      let formattedParams = {};
      Object.keys(queryParams).map((data) => {
        if (queryParams[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${queryParams[data].join(",")}`,
          };
        }
      });
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
      let formattedParams = {};
      Object.keys(queryParams).map((data) => {
        if (queryParams[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${queryParams[data].join(",")}`,
          };
        }
      });
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
      let formattedParams = {};
      Object.keys(queryParams).map((data) => {
        if (queryParams[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${queryParams[data].join(",")}`,
          };
        }
      });
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

