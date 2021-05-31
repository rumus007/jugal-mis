<template>
  <div class="chart-wrapper flex">
    <div class="charts">
      <h3>वडागत रुपमा घरकाे संख्या</h3>
      <div class="card chart">
        <div v-if="showHouseCountLoader">
          <loader />
        </div>
        <div v-else>
          <div v-if="houseCountData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showHouseCountGraph')"
                :class="showHouseCountGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showHouseCountGraph')"
                :class="!showHouseCountGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showHouseCountGraph">
              <BarChart :data="houseCountData" :horizontalBar="false" />
            </div>
            <div v-else>
              <Table :data="houseCountData" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="charts">
      <h3>घरकाे स्वामित्व</h3>
      <div class="card chart">
        <div v-if="showOwnerShipLoader">
          <loader />
        </div>
        <div v-else>
          <div v-if="ownershipData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showOwnerShipGraph')"
                :class="showOwnerShipGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showOwnerShipGraph')"
                :class="!showOwnerShipGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showOwnerShipGraph">
              <BarChart :data="ownershipData" :horizontalBar="false" />
            </div>
            <div v-else>
              <Table :data="ownershipData" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="charts">
      <h3>छानाकाे प्रकार</h3>
      <div class="card chart">
        <div v-if="showRoofingLoader">
          <loader />
        </div>
        <div v-else>
          <div v-if="roofingData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showRoofingGraph')"
                :class="showRoofingGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showRoofingGraph')"
                :class="!showRoofingGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showRoofingGraph">
              <BarChart :data="roofingData" :horizontalBar="true" />
              <!-- <DonutChart :data="houseNumberData" /> -->
            </div>
            <div v-else>
              <Table :data="roofingData" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="charts">
      <h3>घरकाेे जग</h3>
      <div class="card chart">
        <div v-if="showFoundationLoader">
          <loader />
        </div>
        <div v-else>
          <div v-if="foundationData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showFoundationGraph')"
                :class="showFoundationGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showFoundationGraph')"
                :class="!showFoundationGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showFoundationGraph">
              <BarChart :data="foundationData" :horizontalBar="true" />
            </div>
            <div v-else>
              <Table :data="foundationData" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="charts">
      <!-- <h3>वडागत रुपमा घरकाे संख्या</h3> -->
      <h3>घर नम्बर भएकाे वा नभएकाे</h3>
      <div class="card chart">
        <div v-if="showHouseNumberLoader">
          <loader />
        </div>
        <div v-else>
          <div v-if="houseNumberData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showHouseNumberGraph')"
                :class="showHouseNumberGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showHouseNumberGraph')"
                :class="!showHouseNumberGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showHouseNumberGraph">
              <DonutChart :data="houseNumberData" />
            </div>
            <div v-else>
              <Table :data="houseNumberData" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="charts">
      <!-- <h3>वडागत रुपमा घरकाे संख्या</h3> -->
      <h3>घरसम्म पुुग्ने बाटाेकाे प्रकार</h3>
      <div class="card chart">
        <div v-if="showRoadToHouseLoader">
          <loader />
        </div>
        <div v-else>
          <div v-if="roadToHouseData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showRoadtoHouseGraph')"
                :class="showRoadtoHouseGraph ? 'active' : ''"
              >
                <img
                  src="images/ic_graph.svg"
                  alt=""
                  width="16"
                  :class="!showRoadtoHouseGraph ? 'active' : ''"
                />
              </button>
              <button
                v-on:click="showTable('showRoadtoHouseGraph')"
                class="table-view"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showRoadtoHouseGraph">
              <BarChart :data="roadToHouseData" :horizontalBar="false" />
            </div>
            <div v-else>
              <Table :data="roadToHouseData" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="charts">
      <!-- <h3>वडागत रुपमा घरकाे संख्या</h3> -->
      <h3>घरसम्म पुग्ने बाटाे</h3>
      <div class="card chart">
        <div v-if="showRoadTypeLoader">
          <loader />
        </div>
        <div v-else>
          <div v-if="roadTypeData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showRoadTypeGraph')"
                :class="showRoadTypeGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showRoadTypeGraph')"
                :class="!showRoadTypeGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showRoadTypeGraph">
              <BarChart :data="roadTypeData" :horizontalBar="true" />
            </div>
            <div v-else>
              <Table :data="roadTypeData" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="charts">
      <h3>काेठाकाे संख्या</h3>
      <div class="card chart">
        <div v-if="showRoomLoader">
          <loader />
        </div>
        <div v-else>
          <div v-if="columnChartData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showRoomGraph')"
                :class="showRoomGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showRoomGraph')"
                :class="!showRoomGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showRoomGraph">
              <ColumnChart :data="roomData" :categoryData="columnCategory" />
            </div>
            <div v-else>
              <Table :data="columnChartData" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="charts">
      <h3>घरनक्सा पास (अभिलेखिकरण)</h3>
      <div class="card chart">
        <div v-if="showHouseListedLoader">
          <loader />
        </div>
        <div v-else>
          <div v-if="houseListedData.length === 0"><no-data /></div>
          <div v-else>
            <div class="view-icons">
              <button
                v-on:click="showGraph('showHouseListedGraph')"
                :class="showHouseListedGraph ? 'active' : ''"
              >
                <img src="images/ic_graph.svg" alt="" width="16" height="16" />
              </button>
              <button
                v-on:click="showTable('showHouseListedGraph')"
                :class="!showHouseListedGraph ? 'active' : ''"
              >
                <img src="images/ic_table.svg" alt="" width="16" height="16" />
              </button>
            </div>
            <div v-if="showHouseListedGraph">
              <DonutChart :data="houseListedData" />
            </div>
            <div v-else>
              <Table :data="houseListedData" />
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
  name: "HouseStatus",
  components: {
    BarChart: () => import("../components/Chart/BarChart"),
    LineChart: () => import("../components/Chart/LineChart"),
    PieChart: () => import("../components/Chart/PieChart"),
    DonutChart: () => import("../components/Chart/DonutChart"),
    ColumnChart: () => import("../components/Chart/ColumnChart"),
    Table: () => import("../components/Table/Table"),
    Loader: () => import("../components/Loader/Loader"),
    NoData: () => import("../components/NoData/NoData"),
  },
  data: function () {
    return {
      showOwnerShipGraph: true,
      ownershipData: [],
      showOwnerShipLoader: false,
      showHouseNumberGraph: true,
      houseNumberData: [],
      showHouseNumberLoader: false,
      showFoundationGraph: true,
      foundationData: [],
      showFoundationLoader: false,
      showRoofingGraph: true,
      roofingData: [],
      showRoofingLoader: false,
      showRoadtoHouseGraph: true,
      roadToHouseData: [],
      showRoadToHouseLoader: false,
      showRoadTypeGraph: true,
      roadTypeData: [],
      showRoadTypeLoader: false,
      roomData: [],
      showRoomGraph: true,
      showRoomLoader: false,
      showHouseListedGraph: true,
      houseListedData: [],
      showHouseListedLoader: false,
      showHouseCountGraph: true,
      houseCountData: [],
      showHouseCountLoader: false,

      showBarChartGraph: true,

      barChartoptions: {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996],
        },
      },
      barChartSeries: [
        {
          name: "bar-chart",
          data: [30, 40, 45, 50, 49, 60],
        },
      ],

      tableBarChartData: [
        { category: 1991, total: 30 },
        { category: 1992, total: 40 },
        { category: 1993, total: 45 },
        { category: 1994, total: 50 },
        { category: 1995, total: 49 },
        { category: 1996, total: 60 },
      ],

      columnChartData: [
        {
          name: "Total rooms",
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
        },
        {
          name: "Rented rooms",
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
        },
      ],

      columnCategory: [],
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },
    getOwnerShipData: function () {
      this.showOwnerShipLoader = true;
      const targetUrl = `household/ownership`;
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
          this.ownershipData = data.data;
          this.showOwnerShipLoader = false;
        })
        .catch(() => {
          this.showOwnerShipLoader = false;
        });
    },
    getHouseNumberData: function () {
      this.showHouseNumberLoader = true;
      const targetUrl = `household/house-number`;
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
          this.houseNumberData = data.data;
          this.showHouseNumberLoader = false;
        })
        .catch(() => {
          this.showHouseNumberLoader = false;
        });
    },
    getFoundationData: function () {
      this.showFoundationLoader = true;
      const targetUrl = `household/foundation`;
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
          this.foundationData = data.data;
          this.showFoundationLoader = false;
        })
        .catch(() => {
          this.showFoundationLoader = false;
        });
    },
    getRoofingData: function () {
      this.showRoofingLoader = true;
      const targetUrl = `household/roofing`;
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
          this.roofingData = data.data;
          this.showRoofingLoader = false;
        })
        .catch(() => {
          this.showRoofingLoader = false;
        });
    },
    getRoadTypeToHouseData: function () {
      this.showRoadToHouseLoader = true;
      const targetUrl = `household/road-type-to-house`;
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
          this.roadToHouseData = data.data;
          this.showRoadToHouseLoader = false;
        })
        .catch(() => {
          this.showRoadToHouseLoader = false;
        });
    },
    getRoadTypeData: function () {
      this.showRoadTypeLoader = true;
      const targetUrl = `household/road-type`;
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
          this.roadTypeData = data.data;
          this.showRoadTypeLoader = false;
        })
        .catch(() => {
          this.showRoadTypeLoader = false;
        });
    },

    getRoomCountData: function () {
      this.showRoomLoader = true;
      const targetUrl = `household/room-count`;
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
          // this.roomData = data.data;
          // let staticData = {
          //   xAxis: ["1", "2", "3", "4", "5", "6", "7"],
          //   total_rooms: [1576, 1949, 2604, 1709, 2172, 998, 1512],
          //   rented_rooms: [51, 1095, 42, 58, 101, 12, 10],
          // };
          this.roomData = [
            { name: "total_rooms", data: data.data.total_rooms },
            { name: "rented_rooms", data: data.data.rented_rooms },
          ];
          this.columnCategory = data.data.xAxis;
          this.showRoomLoader = false;
        })
        .catch(() => {
          this.showRoomLoader = false;
        });
    },

    getHouseListedData: function () {
      this.showHouseListedLoader = true;
      const targetUrl = `household/house-listed`;
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
          this.houseListedData = data.data;
          this.showHouseListedLoader = false;
        })
        .catch(() => {
          this.showHouseListedLoader = false;
        });
    },

    getHouseCountData: function () {
      this.showHouseCountLoader = true;
      const targetUrl = `household/house-count`;
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
          this.houseCountData = data.data;
          this.showHouseCountLoader = false;
        })
        .catch(() => {
          this.showHouseCountLoader = false;
        });
    },
  },
  mounted() {
    this.getOwnerShipData();
    this.getHouseNumberData();
    this.getFoundationData();
    this.getRoofingData();
    this.getRoadTypeToHouseData();
    this.getRoadTypeData();
    this.getRoomCountData();
    this.getHouseListedData();
    this.getHouseCountData();
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getOwnerShipData();
        this.getHouseNumberData();
        this.getFoundationData();
        this.getRoofingData();
        this.getRoadTypeToHouseData();
        this.getRoadTypeData();
        this.getRoomCountData();
        this.getHouseListedData();
        this.getHouseCountData();
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
