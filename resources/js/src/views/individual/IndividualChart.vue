<template>
  <div
    class="card chart"
    :class="{ 'chart-full': showFullChartClass, 'card-table': !showGraph , 'chart-vertical': showVerticalChartClass, 'chart-donut': showDonutChartClass}"
  >
    <div v-if="showLoader" class="loader-wrapper">
      <loader />
    </div>
    <div v-else>
      <div v-if="data.length === 0">
        <no-data />
      </div>
      <div v-else>
        <div class="chart-title flex">
          <h3>{{ title }}</h3>
          <div class="view-icons">
            <button v-on:click="changeGraphDisplay()" :class="showGraph ? 'active' : ''">
              <img src="images/ic_graph.svg" alt width="16" :class="!showGraph ? 'active' : ''" />
            </button>
            <button
              v-on:click="changeTableDisplay()"
              :class="!showGraph ? 'active' : ''"
              class="table-view"
            >
              <img src="images/ic_table.svg" alt="" width="16" height="16" />
            </button>
          </div>
        </div>
        <div v-if="showGraph">
          <BarChart
            :xAxisTitle="chartDetail.xAxisTitle"
            :yAxisTitle="chartDetail.yAxisTitle"
            :data="data"
            :horizontalBar="chartDetail.horizontalBar"
            v-if="chartDetail.type === 'Bar'"
          />
          <DonutChart :data="data" v-if="chartDetail.type === 'Donut'" />
          <ColumnChart
            :data="data"
            :categoryData="chartDetail.columnCategory"
            v-if="chartDetail.type === 'Column'"
          />
        </div>
        <simplebar data-simplebar-auto-hide="false" v-else class="chart-table">
          <Table
            :data="data"
            :title="chartDetail.columnTitle ? chartDetail.columnTitle : title" 
            :isColumn="chartDetail.type === 'Column' ? true : false"
          />
        </simplebar>
      </div>
    </div>
  </div>
</template>

<script>
import simplebar from "simplebar-vue";
import "simplebar/dist/simplebar.min.css";
export default {
  name: "Individual",
  components: {
    BarChart: () => import("../components/Chart/BarChart"),
    DonutChart: () => import("../components/Chart/DonutChart"),
    ColumnChart: () => import("../components/Chart/ColumnChart"),
    Table: () => import("../components/Table/Table"),
    Loader: () => import("../components/Loader/Loader"),
    NoData: () => import("../components/NoData/NoData"),
    simplebar,
  },
  props: {
    showLoader: { type: Boolean, required: true },
    data: { type: Array, required: true },
    title: { type: String, required: true },
    showGraph: { type: Boolean, required: true },
    showGraphText: { type: String, required: true },
    chartDetail: { type: Object, required: true },
    showFullChartClass: { type: Boolean },
    showVerticalChartClass: { type: Boolean },
    showDonutChartClass: {type: Boolean},
  },
  methods: {
    changeGraphDisplay() {
      this.$emit("graphFunction", this.showGraphText);
    },
    changeTableDisplay() {
      this.$emit("tableFunction", this.showGraphText);
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
