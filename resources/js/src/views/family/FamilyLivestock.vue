<template>
  <div class="chart-wrapper flex">
    <family-chart
      :showLoader="showHasLiveStockLoader"
      :data="hasLiveStockData"
      :title="'परिवारहरूसँग पशुधन'"
      :showGraphText="'showHasLiveStockGraph'"
      :showGraph="showHasLiveStockGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <family-chart
      :showLoader="showLiveStockLoader"
      :data="liveStockData"
      :title="'परिवारहरूमा पशुधन'"
      :showGraphText="'showLiveStockGraph'"
      :showGraph="showLiveStockGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <family-chart
      :showLoader="showMilkProdLoader"
      :data="milkProdData"
      :title="'संचयी दुध उत्पादन र राजस्व'"
      :showGraphText="'showMilkProdGraph'"
      :showGraph="showMilkProdGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <family-chart
      :showLoader="showMeatProdLoader"
      :data="meatProdData"
      :title="'संचयी मांस उत्पादन र आय'"
      :showGraphText="'showMeatProdGraph'"
      :showGraph="showMeatProdGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <family-chart
      :showLoader="showBoneProdLoader"
      :data="boneProdData"
      :title="'संचयी हड्डीको छाला उत्पादन र आय'"
      :showGraphText="'showBoneProdGraph'"
      :showGraph="showBoneProdGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <div class="card chart">
      <div v-if="showOtherProdLoader" class="loader-wrapper">
        <loader />
      </div>
      <div v-else>
        <div v-if="otherProdData.length === 0"><no-data /></div>
        <div v-else>
          <h3>अरु उत्पादन</h3>
          <!-- <Table :data="otherProdData" /> -->
          <div class="stats-livestock">
            <ul class="flex">
              <li
                class="stats"
                v-for="(otherProd, index) in otherProdData"
                :key="index"
                :class="[otherProd.type ? otherProd.type : '']"
              >
                <strong v-text="getFormattedCount(otherProd.total)"></strong>
                {{ otherProd.unit }}
                <span>{{ otherProd.category }}</span>
              </li>

              <!-- <li class="stats-sheep">
                  <strong>otherProdData</strong> के. जि
                  <span>भेडाको उल </span>
                </li>
                <li class="stats-egg">
                  <strong>१४४३</strong>ओटा
                  <span>कुखुराको अन्डा</span>
                </li>
                <li class="stats-bee">
                  <strong>६५</strong> के. जि
                  <span>मौरीको मह</span>
                </li>
                <li class="stats-fish">
                  <strong>१४४३</strong>ओटा
                  <span>माछा</span>
                </li>
                <li class="stats-silk">
                  <strong>६५</strong> के. जि
                  <span>रेसम कीराको रेशम</span>
                </li>
                <li class="stats-duck">
                  <strong>१४४३</strong>ओटा
                  <span>हाँस को अन्डा</span>
                </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>

    <family-chart
      :showLoader="showRevenueLoader"
      :data="revenueData"
      :title="'पशुधन राजस्व'"
      :showGraphText="'showRevenueGraph'"
      :showGraph="showRevenueGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
      :class="'chart-full'"
    />

    <!-- <family-chart
      :showLoader="showHasFishBeeSilkLoader"
      :data="hasFishBeeSilkData"
      :title="'माछा रेशम मौरी'"
      :showGraphText="'showHasFishBeeSilkGraph'"
      :showGraph="showHasFishBeeSilkGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    /> -->
  </div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";
import { englishToNepaliNumber } from "nepali-number";

export default {
  name: "FamilyLivestock",
  components: {
    FamilyChart: () => import("./FamilyChart"),
    Loader: () => import("../components/Loader/Loader"),
    NoData: () => import("../components/NoData/NoData"),
    Table: () => import("../components/Table/Table"),
  },
  data: function () {
    return {
      showHasLiveStockGraph: true,
      hasLiveStockData: [],
      showHasLiveStockLoader: false,

      showLiveStockGraph: true,
      liveStockData: [],
      showLiveStockLoader: false,

      showMilkProdGraph: true,
      milkProdData: [],
      showMilkProdLoader: false,

      showMeatProdGraph: true,
      meatProdData: [],
      showMeatProdLoader: false,

      showBoneProdGraph: true,
      boneProdData: [],
      showBoneProdLoader: false,

      showRevenueGraph: true,
      revenueData: [],
      showRevenueLoader: false,

      showHasFishBeeSilkGraph: true,
      hasFishBeeSilkData: [],
      showHasFishBeeSilkLoader: false,

      otherProdData: [],
      showOtherProdLoader: false,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getHasLiveStockData: function () {
      this.showHasLiveStockLoader = true;
      const targetUrl = `family/has-livestocks`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.hasLiveStockData = data?.data ?? [];
          this.showHasLiveStockLoader = false;
        })
        .catch(() => {
          this.showHasLiveStockLoader = false;
        });
    },

    getLiveStockData: function () {
      this.showLiveStockLoader = true;
      const targetUrl = `family/livestock-in-family`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.liveStockData = data?.data ?? [];
          this.showLiveStockLoader = false;
        })
        .catch(() => {
          this.showLiveStockLoader = false;
        });
    },

    getMilkProdData: function () {
      this.showMilkProdLoader = true;
      const targetUrl = `family/milk-production`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.milkProdData = data?.data ?? [];
          this.showMilkProdLoader = false;
        })
        .catch(() => {
          this.showMilkProdLoader = false;
        });
    },

    getMeatProdData: function () {
      this.showMeatProdLoader = true;
      const targetUrl = `family/meat-production`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.meatProdData = data?.data ?? [];
          this.showMeatProdLoader = false;
        })
        .catch(() => {
          this.showMeatProdLoader = false;
        });
    },

    getBoneProdData: function () {
      this.showBoneProdLoader = true;
      const targetUrl = `family/bone-skin-production`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.boneProdData = data?.data ?? [];
          this.showBoneProdLoader = false;
        })
        .catch(() => {
          this.showBoneProdLoader = false;
        });
    },

    getRevenueData: function () {
      this.showRevenueLoader = true;
      const targetUrl = `family/livestock-revenue`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.revenueData = data?.data ?? [];
          this.showRevenueLoader = false;
        })
        .catch(() => {
          this.showRevenueLoader = false;
        });
    },

    getOtherProdData: function () {
      this.showOtherProdLoader = true;
      const targetUrl = `family/other-production`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.otherProdData = data?.data ?? [];
          this.showOtherProdLoader = false;
        })
        .catch(() => {
          this.showOtherProdLoader = false;
        });
    },

    getFishBeeSilkData: function () {
      this.showHasFishBeeSilkLoader = true;
      const targetUrl = `family/has-fish-bee-silkworm`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.hasFishBeeSilkData = data?.data ?? [];
          this.showHasFishBeeSilkLoader = false;
        })
        .catch(() => {
          this.showHasFishBeeSilkLoader = false;
        });
    },

    getFormattedCount(count) {
      return englishToNepaliNumber(count);
    },
  },
  mounted() {
    this.getHasLiveStockData();
    this.getLiveStockData();
    this.getMilkProdData();
    this.getMeatProdData();
    this.getBoneProdData();
    this.getRevenueData();
    this.getFishBeeSilkData();
    this.getOtherProdData();
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getHasLiveStockData();
        this.getLiveStockData();
        this.getMilkProdData();
        this.getMeatProdData();
        this.getBoneProdData();
        this.getRevenueData();
        this.getFishBeeSilkData();
        this.getOtherProdData();
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.stats-livestock ul {
  flex-wrap: wrap;
  justify-content: space-between;
  li {
    color: var(--blue-400);
    font-size: 12px;
    margin-bottom: 48px;
    padding-left: 76px;
    position: relative;
    width: 50%;
    &:before {
      background-color: rgb(249, 223, 204, 0.5);
      background-image: url("../../../../../public/images/ic_sprite.svg");
      background-repeat: no-repeat;
      border-radius: 50%;
      content: "";
      height: 60px;
      left: 0;
      position: absolute;
      top: 0;
      width: 60px;
    }
    strong {
      font-size: 24px;
      padding-right: 4px;
    }
    > span {
      color: var(--color-primary-dark);
      display: block;
      font-size: 16px;
    }
  }
}
.stats {
  &.sheep:before{
    background-position:  -46px 12px;
  }
  &.egg:before {
    background-position:  -127px 12px;
  }
  &.bee:before {
      background-position:  -46px -38px;
  }
  &.fish:before {
      background-position:  -125px -38px;
  }
  &.silk:before {
      background-position:  -47px -91px;
  }
  &.duck:before {
      background-position:  -126px -91px;
  }
}
</style>
