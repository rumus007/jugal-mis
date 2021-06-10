<template>
  <div class="house-wrapper">
    <!-- <button v-on:click="updateData">Update Data</button> -->
    <TitleBar title="जनसांख्यिकीय विवरण" />
    <div class="main-content" id="main">
      <Stats />
      <div class="tabs">
        <tabs
          :options="{ useUrlFragment: false }"
          @changed="individualTabChange"
          cache-lifetime="0"
        >
          <tab name="जनसंख्याकाे वितरण">
            <!-- <h2 v-if="!this.$store.getters.isLoading">जनसंख्याकाे वितरण</h2> -->
            <population-distribution
              v-if="selectedTab === 'जनसंख्याकाे वितरण'"
            />
          </tab>
          <tab name="शैक्षिक स्थिति">
            <!-- <h2 v-if="!this.$store.getters.isLoading">शैक्षिक स्थिति</h2> -->
            <education-status v-if="selectedTab === 'शैक्षिक स्थिति'" />
          </tab>
          <tab name="राेजगारीकाे अवस्था">
            <!-- <h2 v-if="!this.$store.getters.isLoading">राेजगारीकाे अवस्था</h2> -->
            <employment-status v-if="selectedTab === 'राेजगारीकाे अवस्था'" />
          </tab>
          <tab name="सेवा तथा सुविधाहरुकाे प्रयाेगकाे अवस्था">
            <!-- <h2 v-if="!this.$store.getters.isLoading">
              सेवा तथा सुविधाहरुकाे प्रयाेगकाे अवस्था
            </h2> -->
            <service-usage-status
              v-if="selectedTab === 'सेवा तथा सुविधाहरुकाे प्रयाेगकाे अवस्था'"
            />
          </tab>
          <tab name="नागरिकतासहितका परिचयपत्र">
            <!-- <h2 v-if="!this.$store.getters.isLoading">
              नागरिकतासहितका परिचयपत्र
            </h2> -->
            <government-id v-if="selectedTab === 'नागरिकतासहितका परिचयपत्र'" />
          </tab>
          <tab name="व्यवसायिक तालिम प्राप्त जनशक्ति">
            <!-- <h2 v-if="!this.$store.getters.isLoading">
              व्यवसायिक तालिम प्राप्त जनशक्ति
            </h2> -->
            <manpower
              v-if="selectedTab === 'व्यवसायिक तालिम प्राप्त जनशक्ति'"
            />
          </tab>
        </tabs>
      </div>
    </div>
  </div>
</template>

<script>
import { Tabs, Tab } from "vue-tabs-component";
export default {
  name: "Individual",
  components: {
    PopulationDistribution: () => import("./PopulationDistribution"),
    EducationStatus: () => import("./EducationStatus"),
    EmploymentStatus: () => import("./EmploymentStatus"),
    ServiceUsageStatus: () => import("./ServiceUsageStatus"),
    GovernmentId: () => import("./GovernmentId"),
    Manpower: () => import("./Manpower"),
    TitleBar: () => import("../shared/TitleBar"),
    Stats: () => import("../shared/Stats"),
    Tabs,
    Tab,
    // TabFilter: () => import("../components/TabFilter/TabFilter"),
  },
  data() {
    return {
      selectedTab: "जनसंख्याकाे वितरण",
    };
  },
  methods: {
    individualTabChange(selectedTab) {
      this.selectedTab = selectedTab.tab.name;
      this.$store.commit("changeLoader", true);
      window.scrollTo(0,0);
    },
  },
  // mounted(){
  //  this.selectedTab = "जनसंख्याकाे वितरण"
  // }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
