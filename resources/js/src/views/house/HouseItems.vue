<template>
  <div class="chart-wrapper flex">
      <div class="card chart">
        <div v-if="showDrinkWaterSrcLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="drinkWaterSrcData.length === 0"><no-data /></div>
          <div v-else>
            <div class="chart-title flex">
              <h3>परिवारका लागि खानेपानीकाे स्राेत</h3>
              <div class="view-icons">
                <button
                  v-on:click="showGraph('showDrinkWaterSrcGraph')"
                  :class="showDrinkWaterSrcGraph ? 'active' : ''"
                >
                  <img src="images/ic_graph.svg" alt="" width="16" height="16" />
                </button>
                <button
                  v-on:click="showTable('showDrinkWaterSrcGraph')"
                  :class="!showDrinkWaterSrcGraph ? 'active' : ''"
                >
                  <img src="images/ic_table.svg" alt="" width="16" height="16" />
                </button>
              </div>
            </div>
            <div v-if="showDrinkWaterSrcGraph">
              <BarChart :data="drinkWaterSrcData" :horizontalBar="false" />
            </div>
            <simplebar v-else data-simplebar-auto-hide="false" class="chart-table">
              <Table :data="drinkWaterSrcData" />
            </simplebar>
          </div>
        </div>
      </div>
      <div class="card chart">
        <div v-if="false" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="cookFuelData.length === 0"><no-data /></div>
          <div v-else>
            <div class="chart-title flex">
              <h3>खाना पकाउने मुख्य इन्धन</h3>
              <div class="view-icons">
                <button
                  v-on:click="showGraph('showCookFuelGraph')"
                  :class="showCookFuelGraph ? 'active' : ''"
                >
                  <img src="images/ic_graph.svg" alt="" width="16" height="16" />
                </button>
                <button
                  v-on:click="showTable('showCookFuelGraph')"
                  :class="!showCookFuelGraph ? 'active' : ''"
                >
                  <img src="images/ic_table.svg" alt="" width="16" height="16" />
                </button>
              </div>
            </div>
            <div v-if="showCookFuelGraph">
              <BarChart :data="cookFuelData" :horizontalBar="false" />
            </div>
            <simplebar v-else data-simplebar-auto-hide="false" class="chart-table">
              <Table :data="cookFuelData" />
            </simplebar>
          </div>
        </div>
      </div>
      <div class="card chart">
        <div v-if="showElectricitySrcLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="electrictySrcData.length === 0"><no-data /></div>
          <div v-else>
            <div class="chart-title">
              <h3>विद्युतकाे प्रमुख इन्धन</h3>
              <div class="view-icons">
                <button
                  v-on:click="showGraph('showElectricitySrcGraph')"
                  :class="showElectricitySrcGraph ? 'active' : ''"
                >
                  <img src="images/ic_graph.svg" alt="" width="16" height="16" />
                </button>
                <button
                  v-on:click="showTable('showElectricitySrcGraph')"
                  :class="!showElectricitySrcGraph ? 'active' : ''"
                >
                  <img src="images/ic_table.svg" alt="" width="16" height="16" />
                </button>
              </div>
            </div>
            <div v-if="showElectricitySrcGraph">
              <BarChart :data="electrictySrcData" :horizontalBar="true" />
            </div>
            <simplebar v-else data-simplebar-auto-hide="false" class="chart-table">
              <Table :data="electrictySrcData" />
            </simplebar>
          </div>
        </div>
      </div>
      <div class="card chart">
        <div v-if="showAlternativeSrcLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="alternativeSrcData.length === 0"><no-data /></div>
          <div v-else>
            <div class="chart-title flex">
              <h3>बैकल्पिक इन्धनकाे प्रयाेग</h3>
              <div class="view-icons">
                <button
                  v-on:click="showGraph('showAlternativeSrcGraph')"
                  :class="showAlternativeSrcGraph ? 'active' : ''"
                >
                  <img src="images/ic_graph.svg" alt="" width="16" height="16" />
                </button>
                <button
                  v-on:click="showTable('showAlternativeSrcGraph')"
                  :class="!showAlternativeSrcGraph ? 'active' : ''"
                >
                  <img src="images/ic_table.svg" alt="" width="16" height="16" />
                </button>
              </div>
            </div>
            <div v-if="showAlternativeSrcGraph">
              <BarChart :data="alternativeSrcData" :horizontalBar="false" />
            </div>
            <simplebar v-else data-simplebar-auto-hide="false" class="chart-table">
              <Table :data="alternativeSrcData" />
            </simplebar>
          </div>
        </div>
      </div>
      <div class="card chart">
        <div v-if="showTimeForHealthCare" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="timeForHealthCareData.length === 0"><no-data /></div>
          <div v-else>
            <div class="chart-title flex">
              <h3>आधारभुत स्वास्थ्य सेवाका लागि जाँदा लाग्ने समय</h3>
              <div class="view-icons">
                <button
                  v-on:click="showGraph('showTimeForHealthCareGraph')"
                  :class="showTimeForHealthCareGraph ? 'active' : ''"
                >
                  <img src="images/ic_graph.svg" alt="" width="16" height="16" />
                </button>
                <button
                  v-on:click="showTable('showTimeForHealthCareGraph')"
                  :class="!showTimeForHealthCareGraph ? 'active' : ''"
                >
                  <img src="images/ic_table.svg" alt="" width="16" height="16" />
                </button>
              </div>
            </div>
            <div v-if="showTimeForHealthCareGraph">
              <BarChart :data="timeForHealthCareData" :horizontalBar="false" />
            </div>
            <simplebar v-else data-simplebar-auto-hide="false" class="chart-table">
              <Table :data="timeForHealthCareData" />
            </simplebar>
          </div>
        </div>
      </div>
      <div class="card chart">
        <div v-if="showTimeForWaterFetchLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="timeForWaterFetchData.length === 0"><no-data /></div>
          <div v-else>
            <div class="chart-title flex">
              <h3>खानेपानी लिनका लागि जाँदा लाग्ने समय</h3>
              <div class="view-icons">
                <button
                  v-on:click="showGraph('showTimeForWaterFetchGraph')"
                  :class="showTimeForWaterFetchGraph ? 'active' : ''"
                >
                  <img
                    src="images/ic_graph.svg"
                    alt=""
                    width="16"
                    :class="!showTimeForWaterFetchGraph ? 'active' : ''"
                  />
                </button>
                <button
                  v-on:click="showTable('showTimeForWaterFetchGraph')"
                  class="table-view"
                >
                  <img src="images/ic_table.svg" alt="" width="16" height="16" />
                </button>
              </div>
            </div>
            <div v-if="showTimeForWaterFetchGraph">
              <BarChart :data="timeForWaterFetchData" :horizontalBar="false" />
            </div>
            <simplebar v-else data-simplebar-auto-hide="false" class="chart-table">
              <Table :data="timeForWaterFetchData" />
            </simplebar>
          </div>
        </div>
      </div>
      <div class="card chart">
        <div v-if="showNewBornLocationLoader" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="newBornLocationData.length === 0"><no-data /></div>
          <div v-else>
            <div class="chart-title flex">
              <h3>शिशुकाे जन्म भएकाे स्थान</h3>
                <div class="view-icons">
                <button
                  v-on:click="showGraph('showNewBornLocationGraph')"
                  :class="showNewBornLocationGraph ? 'active' : ''"
                >
                  <img src="images/ic_graph.svg" alt="" width="16" height="16" />
                </button>
                <button
                  v-on:click="showTable('showNewBornLocationGraph')"
                  :class="!showNewBornLocationGraph ? 'active' : ''"
                >
                  <img src="images/ic_table.svg" alt="" width="16" height="16" />
                </button>
              </div>
            </div>
           
            <div v-if="showNewBornLocationGraph">
              <BarChart :data="newBornLocationData" :horizontalBar="true" />
            </div>
            <simplebar v-else data-simplebar-auto-hide="false" class="chart-table">
              <Table :data="newBornLocationData" />
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
  name: "HouseItems",
  components: {
    BarChart: () => import("../components/Chart/BarChart"),
    Table: () => import("../components/Table/Table"),
    Loader: () => import("../components/Loader/Loader"),
    NoData: () => import("../components/NoData/NoData"),
    simplebar
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
