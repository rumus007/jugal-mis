<template>
<div> 
  <h2>घरकाे अवस्था</h2>
  <div class="chart-wrapper flex">
    <house-chart
      :showLoader="showHouseCountLoader"
      :data="houseCountData"
      :title="'वडागत रुपमा घरकाे संख्या'"
      :showGraphText="'showHouseCountGraph'"
      :showGraph="showHouseCountGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle: 'वडागत रुपमा घरकाे संख्या', xAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <house-chart
      :showLoader="showOwnerShipLoader"
      :data="ownershipData"
      :title="'घरकाे स्वामित्व'"
      :showGraphText="'showOwnerShipGraph'"
      :showGraph="showOwnerShipGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle: 'घरकाे स्वामित्व', xAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <house-chart
      :showLoader="showRoofingLoader"
      :data="roofingData"
      :title="'छानाकाे प्रकार'"
      :showGraphText="'showRoofingGraph'"
      :showGraph="showRoofingGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle: 'छानाकाे प्रकार', yAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <house-chart
      :showLoader="showFoundationLoader"
      :data="foundationData"
      :title="'घरकाेे जग'"
      :showGraphText="'showFoundationGraph'"
      :showGraph="showFoundationGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle: 'घरकाेे जग', yAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <house-chart
      :showLoader="showRoomLoader"
      :data="roomData"
      :title="'काेठाकाे संख्या'"
      :showGraphText="'showRoomGraph'"
      :showGraph="showRoomGraph"
      :chartDetail="{
        type: 'Column',
        columnCategory: roomColumnCategory,
        columnTitle: 'वार्ड नं',
        xAxisTitle:'काेठाकाे संख्या', 
        yAxisTitle:'जम्मा'
      }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showFullChartClass="true"
    />
    
    <house-chart
      :showLoader="showRoadTypeLoader"
      :data="roadTypeData"
      :title="'घरसम्म पुग्ने बाटाेकाे प्रकृति'"
      :showGraphText="'showRoadTypeGraph'"
      :showGraph="showRoadTypeGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle: 'घरसम्म पुग्ने बाटाेकाे प्रकृति', yAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <house-chart
      :showLoader="showRoadToHouseLoader"
      :data="roadToHouseData"
      :title="'घरसम्म पुुग्ने बाटाेकाे प्रकार'"
      :showGraphText="'showRoadtoHouseGraph'"
      :showGraph="showRoadtoHouseGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle: 'घरसम्म पुुग्ने बाटाेकाे प्रकार', xAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <house-chart
      :showLoader="showHouseNumberLoader"
      :data="houseNumberData"
      :title="'घर नम्बर भएकाे वा नभएकाे'"
      :showGraphText="'showHouseNumberGraph'"
      :showGraph="showHouseNumberGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <house-chart
      :showLoader="showHouseListedLoader"
      :data="houseListedData"
      :title="'घरनक्सा पास (अभिलेखिकरण)'"
      :showGraphText="'showHouseListedGraph'"
      :showGraph="showHouseListedGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
  </div>
</div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";
import simplebar from "simplebar-vue";
import "simplebar/dist/simplebar.min.css";

export default {
  name: "HouseStatus",
  components: {
    HouseChart: () => import("./HouseChart"),
    ColumnChart: () => import("../components/Chart/ColumnChart"),
    Table: () => import("../components/Table/Table"),
    Loader: () => import("../components/Loader/Loader"),
    NoData: () => import("../components/NoData/NoData"),
    simplebar,
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
      roomColumnCategory: [],
      showHouseListedGraph: true,
      houseListedData: [],
      showHouseListedLoader: false,
      showHouseCountGraph: true,
      houseCountData: [],
      showHouseCountLoader: false,
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
      let formattedParams = formatRouteUrl(queryParams);

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
      let formattedParams = formatRouteUrl(queryParams);

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
      let formattedParams = formatRouteUrl(queryParams);

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
      let formattedParams = formatRouteUrl(queryParams);

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
      let formattedParams = formatRouteUrl(queryParams);

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
      let formattedParams = formatRouteUrl(queryParams);

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
      let formattedParams = formatRouteUrl(queryParams);

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
            { name: "काेठाकाे संख्या", data: data.data.total_rooms },
            { name: "भाडाकाे काेठाकाे संख्या", data: data.data.rented_rooms },
          ];
          this.roomColumnCategory = data.data.xAxis;
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
      let formattedParams = formatRouteUrl(queryParams);

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
      let formattedParams = formatRouteUrl(queryParams);

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
