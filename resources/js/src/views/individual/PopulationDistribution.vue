<template>
  <div class="chart-wrapper flex">
    <individual-chart
      :showLoader="showGenderLoader"
      :data="byGenderData"
      :title="'लिंगका आधारमा जनसंख्याकाे वितरण'"
      :showGraphText="'showGenderGraph'"
      :showGraph="showGenderGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <individual-chart
      :showLoader="showAgeGroupLoader"
      :data="byAgeGroupData"
      :title="'उमेर समूहका आधारमा जनसंख्याकाे वितरण'"
      :showGraphText="'showAgeGroupGraph'"
      :showGraph="showAgeGroupGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <individual-chart
      :showLoader="showEthnicityLoader"
      :data="byEthnicityData"
      :title="'जातिका आधारमा जनसंख्याकाे वितरण'"
      :showGraphText="'showEthnicityGraph'"
      :showGraph="showEthnicityGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <individual-chart
      :showLoader="showReligionLoader"
      :data="byReligionData"
      :title="'धर्मका आधारमा जनसंख्याकाे वितरण'"
      :showGraphText="'showReligionGraph'"
      :showGraph="showReligionGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <individual-chart
      :showLoader="showMotherTongueLoader"
      :data="byMotherTongueData"
      :title="'मातृभाषाका आधारमा जनसंख्याकाे वितरण'"
      :showGraphText="'showMotherTongueGraph'"
      :showGraph="showMotherTongueGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <individual-chart
      :showLoader="showMaritalLoader"
      :data="byMaritalData"
      :title="'वैवाहिक अवस्थाका आधारमा जनसंख्याकाे वितरण'"
      :showGraphText="'showMaritalStatusGraph'"
      :showGraph="showMaritalStatusGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <!-- <individual-chart
      :showLoader="showBearChildLoader"
      :data="byBearChildData"
      :title="'बच्चा भएका आधारमा जनसंख्याकाे वितरण'"
      :showGraphText="'showBearChildGraph'"
      :showGraph="showBearChildGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    /> -->

    <individual-chart
      :showLoader="showDisabilityLoader"
      :data="byDisabilityData"
      :title="'अपांगताका आधारमा जनसंख्याकाे वितरण'"
      :showGraphText="'showDisabilityGraph'"
      :showGraph="showDisabilityGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <individual-chart
      :showLoader="showDisabilityTypeLoader"
      :data="disabilityTypeData"
      :title="'अपांगताका types'"
      :showGraphText="'showDisabilityTypeGraph'"
      :showGraph="showDisabilityTypeGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <individual-chart
      :showLoader="showDisabilityIdLoader"
      :data="byDisabilityIdData"
      :title="'अपांगता परिचयपत्रका आधारमा जनसंख्याकाे वितरण'"
      :showGraphText="'showDisabilityIdGraph'"
      :showGraph="showDisabilityIdGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <individual-chart
      :showLoader="showTechHumanSrcLoader"
      :data="byTechHumanSrcData"
      :title="'विशेष प्राविधिक सीपयुक्त मानवश्राेत'"
      :showGraphText="'showTechHumanSrcGraph'"
      :showGraph="showTechHumanSrcGraph"
     :chartDetail="{ type: 'Bar', horizontalBar: false }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <individual-chart
      :showLoader="showDomicileLoader"
      :data="byDomicileData"
      :title="'बसाेबासकाे प्रकृति'"
      :showGraphText="'showDomicileGraph'"
      :showGraph="showDomicileGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <individual-chart
      :showLoader="showMobileHolderLoader"
      :data="byMobileHolderData"
      :title="'माेबाईल फाेन बाेक्ने जनसंख्या'"
      :showGraphText="'showMobileHolderGraph'"
      :showGraph="showMobileHolderGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <individual-chart
      :showLoader="showMobileTelecomLoader"
      :data="byMobileTelecomData"
      :title="'माेबाईल फाेन सेवाप्रदायकहरु'"
      :showGraphText="'showMobileTelecomGraph'"
      :showGraph="showMobileTelecomGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
  </div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "PopulationDistribution",
  components: {
    IndividualChart: () => import("./IndividualChart"),
  },
  data: function () {
    return {
      showAgeGroupGraph: true,
      byAgeGroupData: [],
      showAgeGroupLoader: false,

      showMaritalStatusGraph: true,
      byMaritalData: [],
      showMaritalLoader: false,

      showEthnicityGraph: true,
      byEthnicityData: [],
      showEthnicityLoader: false,

      showReligionGraph: true,
      byReligionData: [],
      showHouseListedLoader: false,

      showMotherTongueGraph: true,
      byMotherTongueData: [],
      showMotherTongueLoader: false,

      showGenderGraph: true,
      byGenderData: [],
      showGenderLoader: false,

      showBearChildGraph: true,
      byBearChildData: [],
      showBearChildLoader: false,

      showDisabilityGraph: true,
      byDisabilityData: [],
      showDisabilityLoader: false,

      showDomicileGraph: true,
      byDomicileData: [],
      showDomicileLoader: false,

      showDisabilityIdGraph: true,
      byDisabilityIdData: [],
      showDisabilityIdLoader: false,

      showTechHumanSrcGraph: true,
      byTechHumanSrcData: [],
      showTechHumanSrcLoader: false,

      showMobileHolderGraph: true,
      byMobileHolderData: [],
      showMobileHolderLoader: false,

      showDisabilityTypeGraph: true,
      disabilityTypeData: [],
      showDisabilityTypeLoader: false,

      showMobileTelecomGraph: true,
      byMobileTelecomData: [],
      showMobileTelecomLoader: false,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },

    getAgeGroupData: function () {
      this.showAgeGroupLoader = true;
      const targetUrl = `individual/population-by-age-group`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.byAgeGroupData = data?.data ?? [];
          this.showAgeGroupLoader = false;
        })
        .catch(() => {
          this.showAgeGroupLoader = false;
        });
    },

    getMaritalData: function () {
      this.showMaritalLoader = true;
      const targetUrl = `individual/population-by-marital-status`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.byMaritalData = data?.data ?? [];
          this.showMaritalLoader = false;
        })
        .catch(() => {
          this.showMaritalLoader = false;
        });
    },

    getEthnicityData: function () {
      this.showEthnicityLoader = true;
      const targetUrl = `individual/population-by-ethnicity`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.byEthnicityData = data?.data ?? [];
          this.showEthnicityLoader = false;
        })
        .catch(() => {
          this.showEthnicityLoader = false;
        });
    },

    getReligionData: function () {
      this.showReligionLoader = true;
      const targetUrl = `individual/population-by-religion`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.byReligionData = data?.data ?? [];
          this.showReligionLoader = false;
        })
        .catch(() => {
          this.showReligionLoader = false;
        });
    },

    getMotherTongueData: function () {
      this.showMotherTongueLoader = true;
      const targetUrl = `individual/population-by-mother-tongue`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.byMotherTongueData = data?.data ?? [];
          this.showMotherTongueLoader = false;
        })
        .catch(() => {
          this.showMotherTongueLoader = false;
        });
    },

    getGenderData: function () {
      this.showGenderLoader = true;
      const targetUrl = `individual/population-by-gender`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.byGenderData = data?.data ?? [];
          this.showGenderLoader = false;
        })
        .catch(() => {
          this.showGenderLoader = false;
        });
    },

    getDomicileData: function () {
      this.showDomicileLoader = true;
      const targetUrl = `individual/domicile-status`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);

      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.byDomicileData = data?.data ?? [];
          this.showDomicileLoader = false;
        })
        .catch(() => {
          this.showDomicileLoader = false;
        });
    },

    getBearChildData: function () {
      this.showBearChildLoader = true;
      const targetUrl = `individual/population-by-gender`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.byBearChildData = data?.data ?? [];
          this.showBearChildLoader = false;
        })
        .catch(() => {
          this.showBearChildLoader = false;
        });
    },

    getDisabilityData: function () {
      this.showDisabilityLoader = true;
      const targetUrl = `individual/population-by-disability`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this.byDisabilityData = data?.data ?? [];
          this.showDisabilityLoader = false;
        })
        .catch(() => {
          this.showDisabilityLoader = false;
        });
    },

    getFromApi: function (loader, stateData, url) {
      this[loader] = true;
      const targetUrl = `individual/${url}`;
      let queryParams = { ward: this.ward };
      queryParams = filterObject(queryParams);
      let formattedParams = formatRouteUrl(queryParams);
      axios
        .get(targetUrl, { params: formattedParams })
        .then(({ data }) => {
          this[stateData] = data?.data ?? [];
          this[loader] = false;
        })
        .catch(() => {
          this[loader] = false;
        });
    },
  },
  mounted() {
    this.getAgeGroupData();
    this.getMaritalData();
    this.getEthnicityData();
    this.getReligionData();
    this.getMotherTongueData();
    this.getGenderData();
    this.getDomicileData();
    // this.getBearChildData();
    this.getDisabilityData();
    this.getFromApi(
      "showDisabilityIdLoader",
      "byDisabilityIdData",
      "disability-id"
    );
    this.getFromApi(
      "showTechHumanSrcLoader",
      "byTechHumanSrcData",
      "training-type"
    );
    this.getFromApi(
      "showMobileHolderLoader",
      "byMobileHolderData",
      "has-mobile"
    );
    this.getFromApi(
      "showDisabilityTypeLoader",
      "disabilityTypeData",
      "disability-types"
    );
    this.getFromApi(
      "showMobileTelecomLoader",
      "byMobileTelecomData",
      "mobile-telecom"
    );
  },
  computed: {
    ward() {
      return this.$store.getters.ward;
    },
  },
  watch: {
    ward: {
      handler() {
        this.getAgeGroupData();
        this.getMaritalData();
        this.getEthnicityData();
        this.getReligionData();
        this.getMotherTongueData();
        this.getGenderData();
        this.getDomicileData();
        // this.getBearChildData();
        this.getDisabilityData();
        this.getFromApi(
          "showDisabilityIdLoader",
          "byDisabilityIdData",
          "disability-id"
        );
        this.getFromApi(
          "showTechHumanSrcLoader",
          "byTechHumanSrcData",
          "training-type"
        );
        this.getFromApi(
          "showMobileHolderLoader",
          "byMobileHolderData",
          "has-mobile"
        );
        this.getFromApi(
          "showDisabilityTypeLoader",
          "disabilityTypeData",
          "disability-types"
        );
        this.getFromApi(
          "showMobileTelecomLoader",
          "byMobileTelecomData",
          "has-mobile"
        );
      },
      deep: true,
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
