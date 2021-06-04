<template>
  <div class="chart-wrapper flex">
      <div class="card chart" :class="!showWasteMgmtGraph ? 'card-table' : ''">
        <div v-if="showWateMgmtLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="wasteMgmtData.length === 0"><no-data /></div>
          <div v-else>
            <div class="chart-title flex">
              <h3>घरबाट निस्कने फाेहाेरकाे व्यवस्थापन</h3>
              <div class="view-icons">
                <button
                  v-on:click="showGraph('showWasteMgmtGraph')"
                  :class="showWasteMgmtGraph ? 'active' : ''"
                >
                  <img src="images/ic_graph.svg" alt="" width="16" height="16" />
                </button>
                <button
                  v-on:click="showTable('showWasteMgmtGraph')"
                  :class="!showWasteMgmtGraph ? 'active' : ''"
                >
                  <img src="images/ic_table.svg" alt="" width="16" height="16" />
                </button>
              </div>
            </div>
            <div v-if="showWasteMgmtGraph">
              <BarChart :data="wasteMgmtData" :horizontalBar="false" />
            </div>
            <simplebar v-else data-simplebar-auto-hide="false" class="chart-table">
              <Table :data="wasteMgmtData" />
            </simplebar>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import { filterObject } from "../../common/helper.js";
import simplebar from 'simplebar-vue';
import 'simplebar/dist/simplebar.min.css';

export default {
  name: "HouseWasteMgmt",
  components: {
    BarChart: () => import("../components/Chart/BarChart"),
    DonutChart: () => import("../components/Chart/DonutChart"),
    Table: () => import("../components/Table/Table"),
    TitleBar: () => import("../shared/TitleBar"),
    Loader: () => import("../components/Loader/Loader"),
    NoData: () => import("../components/NoData/NoData"),
    simplebar
  },
  data: function () {
    return {
      showWateMgmtLoader: false,
      wasteMgmtData: [],
      showWasteMgmtGraph: true,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getVulnerableData: function () {
      this.showWateMgmtLoader = true;
      const targetUrl = `household/waste-mgmt`;
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
          this.wasteMgmtData = data?.data ?? [];
          this.showWateMgmtLoader = false;
        })
        .catch(() => {
          this.showWateMgmtLoader = false;
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
        this.getVulnerableData();
      },
      deep: true,
    },
  },
  mounted() {
    this.getVulnerableData();
  },
};
</script>

<style scoped>
</style>

