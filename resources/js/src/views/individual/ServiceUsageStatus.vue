<template>
<div>
  <h2>सेवा तथा सुविधाहरुकाे प्रयाेगकाे अवस्था</h2>
  <div class="chart-wrapper flex">
    <individual-chart
      :showLoader="showVaccineLoder"
      :data="vaccineData"
      :title="'बच्चालाई खाेपकाे अवस्था'"
      :showGraphText="'showVaccineGraph'"
      :showGraph="showVaccineGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle: 'बच्चालाई खाेपकाे अवस्था', xAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
    <individual-chart
      :showLoader="showProlongDiseaseLoader"
      :data="prolongDiseaseData"
      :title="'दीर्घराेगबाट पीडित जनसंख्या'"
      :showGraphText="'showProlongDiseaseGraph'"
      :showGraph="showProlongDiseaseGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle: 'दीर्घराेगबाट पीडित जनसंख्या', xAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <individual-chart
      :showLoader="showCommonDiseaseLoader"
      :data="commonDiseaseData"
      :title="'राेगबाट पीडित जनसंख्या'"
      :showGraphText="'showCommonDiseaseGraph'"
      :showGraph="showCommonDiseaseGraph"
      :chartDetail="{ type: 'Bar', horizontalBar: true, yAxisTitle: 'राेगबाट पीडित जनसंख्या', xAxisTitle: 'जम्मा' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />

    <individual-chart
      :showLoader="showCitizenshipLoader"
      :data="citizenshipData"
      :title="'नागरिकताकाे अवस्था'"
      :showGraphText="'showCitizenshipGraph'"
      :showGraph="showCitizenshipGraph"
      :chartDetail="{ type: 'Donut' }"
      @graphFunction="showGraph"
      @tableFunction="showTable"
    />
  </div>
  </div>
</template>

<script>
import { filterObject, formatRouteUrl } from "../../common/helper.js";

export default {
  name: "ServiceUsageStatus",
  components: {
    IndividualChart: () => import("./IndividualChart"),
  },
  data: function () {
    return {
      showProlongDiseaseGraph: true,
      prolongDiseaseData: [],
      showProlongDiseaseLoader: false,

      showCommonDiseaseGraph: true,
      commonDiseaseData: [],
      showCommonDiseaseLoader: false,

      showCitizenshipGraph: true,
      citizenshipData: [],
      showCitizenshipLoader: false,

      showVaccineGraph: true,
      vaccineData: [],
      showVaccineLoder: false,
    };
  },
  methods: {
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
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
    this.getFromApi(
      "showVaccineLoder",
      "vaccineData",
      "vaccination-immunization"
    );
    this.getFromApi(
      "showProlongDiseaseLoader",
      "prolongDiseaseData",
      "prolonged-diseases"
    );
    this.getFromApi(
      "showCommmonDiseaseLoader",
      "commonDiseaseData",
      "common-diseases"
    );
    this.getFromApi(
      "showCitizenshipLoader",
      "citizenshipData",
      "citizenship-status"
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
        this.getFromApi(
          "showVaccineLoder",
          "vaccineData",
          "vaccination-immunization"
        );

        this.getFromApi(
          "showProlongDiseaseLoader",
          "prolongDiseaseData",
          "prolonged-diseases"
        );

        this.getFromApi(
          "showCommmonDiseaseLoader",
          "commonDiseaseData",
          "common-diseases"
        );
        this.getFromApi(
          "showCitizenshipLoader",
          "citizenshipData",
          "citizenship-status"
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
