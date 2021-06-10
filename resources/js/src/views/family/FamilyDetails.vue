<template>            
<div>
  <h2>परिवारकाे संयाेजन</h2>
  <div class="chart-wrapper flex">
    <family-chart
      :showLoader="showMemberCountLoader"
      :data="memberCountData"
      :title="'परिवार संख्या'"
      :showGraphText="'showMemberCountGraph'"
      :showGraph="showMemberCountGraph"
      :chartDetail="{ 
        type: 'Bar', 
        horizontalBar: false, 
        xAxisTitle: 'परिवार संख्या', 
        yAxisTitle: 'जम्मा' 
      }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showVerticalChartClass="true"
    />
    <family-chart
      :showLoader="showHouseCountLoader"
      :data="houseCountData"
      :title="'परिवारकाे घरकाे संख्या'"
      :showGraphText="'showHouseCountGraph'"
      :showGraph="showHouseCountGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle: 'परिवारकाे घरकाे संख्या', xAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <family-chart
      :showLoader="showSrcIncomeLoader"
      :data="srcIncomeData"
      :title="'परिवारकाे आम्दानीकाे मूख्य स्राेत'"
      :showGraphText="'showSrcIncomeGraph'"
      :showGraph="showSrcIncomeGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false, xAxisTitle: 'परिवारकाे आम्दानीकाे मूख्य स्राेत', yAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showVerticalChartClass="true"
    />
    <family-chart
      :showLoader="showSubsistenceIncomeLoader"
      :data="subsistenceIncomeData"
      :title="'आफ्नो उत्पादन/आम्दानीले तपाईको परिवारलाई कति महिना खान पुग्छ'"
      :showGraphText="'showSubsistenceIncomeGraph'"
      :showGraph="showSubsistenceIncomeGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle: 'महिना', xAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <family-chart
      :showLoader="showAvgIncomeExpenseLoader"
      :data="avgIncomeExpenseData"
      :title="'परिवारकाे औसत आम्दानी'"
      :showGraphText="'showAvgIncomeExpenseSavingGraph'"
      :showGraph="showAvgIncomeExpenseSavingGraph"
      :chartDetail="{
        type: 'Column',
        columnCategory: avgIncomeExpenseColumnCategory,
        columnTitle: 'औसत आम्दानी',
        xAxisTitle: 'परिवारकाे औसत आम्दानी', yAxisTitle: 'जम्मा'
      }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :showFullChartClass="true"
      :class="'chart-legend'"
    />
  </div>
  </div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "FamilyDetails",
  components: {
    FamilyChart: () => import("./FamilyChart"),
  },
  data: function () {
    return {
      showMemberCountGraph: true,
      memberCountData: [],
      showMemberCountLoader: false,

      showPermanentResidentGraph: true,
      permanentResidentData: [],
      showPermanentResidentLoader: false,

      showHouseCountGraph: true,
      houseCountData: [],
      showHouseCountLoader: false,

      showSrcIncomeGraph: true,
      srcIncomeData: [],
      showSrcIncomeLoader: false,

      showAvgIncomeExpenseSavingGraph: true,
      avgIncomeExpenseData: [],
      avgIncomeExpenseColumnCategory: [],
      showAvgIncomeExpenseLoader: false,

      showSubsistenceIncomeGraph: true,
      subsistenceIncomeData: [],
      showSubsistenceIncomeLoader: false,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getMembersCountData: function () {
      this.showMemberCountLoader = true;
      const targetUrl = `family/house-count`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.memberCountData = data.data;
          this.showMemberCountLoader = false;
        })
        .catch(() => {
          this.showMemberCountLoader = false;
        });
    },

    getPermanentResidentData: function () {
      this.showPermanentResidentLoader = true;
      const targetUrl = `family/house-count`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.permanentResidentData = data.data;
          this.showPermanentResidentLoader = false;
        })
        .catch(() => {
          this.showPermanentResidentLoader = false;
        });
    },

    getHouseCount: function () {
      this.showHouseCountLoader = true;
      const targetUrl = `family/house-count`;
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

    getSrcIncomeData: function () {
      this.showSrcIncomeLoader = true;
      const targetUrl = `family/source-income`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.srcIncomeData = data.data;
          this.showSrcIncomeLoader = false;
        })
        .catch(() => {
          this.showSrcIncomeLoader = false;
        });
    },

    getAvgIncomeExpenseData: function () {
      this.showAvgIncomeExpenseLoader = true;
      const targetUrl = `family/avg-income-expenses-saving`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.avgIncomeExpenseData = [
            { name: "खर्च", data: data?.data?.expediture ?? [] },
            { name: "आय", data: data?.data?.income ?? [] },
            { name: "बचत", data: data?.data?.saving ?? [] },
          ];
          this.avgIncomeExpenseColumnCategory = data.data.xAxis;
          this.showAvgIncomeExpenseLoader = false;
        })
        .catch(() => {
          this.showAvgIncomeExpenseLoader = false;
        });
    },

    getSubsistenceIincomeData: function () {
      this.showSubsistenceIncomeLoader = true;
      const targetUrl = `family/subsistence-income`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.subsistenceIncomeData = data.data;
          this.showSubsistenceIncomeLoader = false;
        })
        .catch(() => {
          this.showSubsistenceIncomeLoader = false;
        });
    },
  },
  mounted() {
    this.getMembersCountData();
    this.getPermanentResidentData();
    this.getHouseCount();
    this.getSrcIncomeData();
    this.getAvgIncomeExpenseData();
    this.getSubsistenceIincomeData();
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getMembersCountData();
        this.getPermanentResidentData();
        this.getHouseCount();
        this.getSrcIncomeData();
        this.getAvgIncomeExpenseData();
        this.getSubsistenceIincomeData();
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
