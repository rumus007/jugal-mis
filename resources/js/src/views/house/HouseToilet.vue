<template>
  <div class="chart-wrapper flex">
    <div class="charts">
      <h3>शाैचालयकाे अवस्था</h3>
      <div class="card chart">
        <div v-if="showToiletAvailableStatusLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="toiletAvailableStatusData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showToiletAvailableGraph')"
                :class="showToiletAvailableGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showToiletAvailableGraph')"
                :class="!showToiletAvailableGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showToiletAvailableGraph">
              <DonutChart :data="toiletAvailableStatusData" />
            </div>
            <div v-else>
              <Table :data="toiletAvailableStatusData" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="charts">
      <h3>शाैचालयकाे प्रकार</h3>
      <div class="card chart">
        <div v-if="showToiletTypeLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="toiletTypeData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showToiletTypeGraph')"
                :class="showToiletTypeGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showToiletTypeGraph')"
                :class="!showToiletTypeGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showToiletTypeGraph">
              <BarChart :data="toiletTypeData" :horizontalBar="false" />
            </div>
            <div v-else>
              <Table :data="toiletTypeData" />
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
  name: "HouseToilet",
  components: {
    BarChart: () => import("../components/Chart/BarChart"),
    DonutChart: () => import("../components/Chart/DonutChart"),
    Table: () => import("../components/Table/Table"),
    TitleBar: () => import("../shared/TitleBar"),
    Loader: () => import("../components/Loader/Loader"),
    NoData: () => import("../components/NoData/NoData"),
  },
  data: function () {
    return {
      showToiletAvailableStatusLoader: false,
      toiletAvailableStatusData: [],
      showToiletAvailableGraph: true,

      showToiletTypeLoader: false,
      toiletTypeData: [],
      showToiletTypeGraph: true,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getToiletAvailableStatus: function () {
      this.showToiletAvailableStatusLoader = true;
      const targetUrl = `household/toilet-availability`;
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
          this.toiletAvailableStatusData = data?.data ?? [];
          this.showToiletAvailableStatusLoader = false;
        })
        .catch(() => {
          this.showToiletAvailableStatusLoader = false;
        });
    },

    getToiletType: function () {
      this.showToiletTypeLoader = true;
      const targetUrl = `household/toilet-types`;
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
          this.toiletTypeData = data?.data ?? [];
          this.showToiletTypeLoader = false;
        })
        .catch(() => {
          this.showToiletTypeLoader = false;
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
        this.getToiletAvailableStatus();
        this.getToiletType();
      },
      deep: true,
    },
  },
  mounted() {
    this.getToiletAvailableStatus();
    this.getToiletType();
  },
};
</script>

<style scoped>
</style>

