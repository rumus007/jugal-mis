<template>
  <div class="chart-wrapper flex">
      <div class="card chart" :class="!showFacilitiesGraph ? 'card-table' : ''">
        <div v-if="showFacilitiesData" class="loader-wrapper">
          <loader />
        </div>
        <div v-else>
          <div v-if="facilitiesData.length === 0"><no-data /></div>
          <div v-else>
            <div class="chart-title flex">
              <h3>भूकम्प प्रतिराेधी घर</h3>
              <div class="view-icons">
                <button
                  v-on:click="showGraph('showFacilitiesGraph')"
                  :class="showFacilitiesGraph ? 'active' : ''"
                >
                  <img src="images/ic_graph.svg" alt="" width="16" height="16" />
                </button>
                <button
                  v-on:click="showTable('showFacilitiesGraph')"
                  :class="!showFacilitiesGraph ? 'active' : ''"
                >
                  <img src="images/ic_table.svg" alt="" width="16" height="16" />
                </button>
              </div>              
            </div>
            <div v-if="showFacilitiesGraph">
              <BarChart :data="facilitiesData" :horizontalBar="true" />
            </div>
            <simplebar v-else data-simplebar-auto-hide="false" class="chart-table">
              <Table :data="facilitiesData" />
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
  name: "HouseFacilities",
  components: {
    BarChart: () => import("../components/Chart/BarChart"),
    Loader: () => import("../components/Loader/Loader"),
    NoData: () => import("../components/NoData/NoData"),
    simplebar
  },
  data: function () {
    return {
      showFacilitiesData: false,
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
      this.showFacilitiesData = true;
      const targetUrl = `household/facilities`;
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
          this.facilitiesData = data?.data ?? [];
          this.showFacilitiesData = false;
        })
        .catch(() => {
          this.showFacilitiesData = false;
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

