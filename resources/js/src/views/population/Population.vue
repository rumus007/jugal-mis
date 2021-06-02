<template>
  <div class="house-wrapper">
    <!-- <button v-on:click="updateData">Update Data</button> -->
    <TitleBar title="जनसांख्यिकीय विवरण" />
    <div class="tabs">
      <tabs :options="{ useUrlFragment: false }">
        <tab name="जनसंख्याकाे वितरण">
          <h2>जनसंख्याकाे वितरण</h2>
          <population-distribution />
        </tab>
        <tab name="शैक्षिक स्थिति">
          <h2>शैक्षिक स्थिति</h2>
          <education-status />
        </tab>
        <tab name="राेजगारीकाे अवस्था">
          <h2>राेजगारीकाे अवस्था</h2>
          <employment-status />
        </tab>
        <tab name="सेवा तथा सुविधाहरुकाे प्रयाेगकाे अवस्था">
          <h2>सेवा तथा सुविधाहरुकाे प्रयाेगकाे अवस्था</h2>
          <service-usage-status />
        </tab>
      </tabs>
    </div>
  </div>
</template>

<script>
import { Tabs, Tab } from "vue-tabs-component";
export default {
  name: "Population",
  components: {
    PopulationDistribution: () => import("./PopulationDistribution"),
    EducationStatus: () => import("./EducationStatus"),
    EmploymentStatus: () => import("./EmploymentStatus"),
    ServiceUsageStatus: () => import("./ServiceUsageStatus"),
    TitleBar: () => import("../shared/TitleBar"),
    Tabs,
    Tab,
    // TabFilter: () => import("../components/TabFilter/TabFilter"),
  },
  methods: {
    updateData: function () {
      this.barChartoptions = {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
        },
      };
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
