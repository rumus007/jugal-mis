<template>
  <div class="house-wrapper">
    <TitleBar title="पारिवारिक विवरण" @changePrint="changePrintMode" />
    <div class="main-content" id="main">     
      <Stats :url="'family/summary-stats'"/>
      <div class="tabs">
        <tabs :options="{ useUrlFragment: false }" @changed="familyTabChange" cache-lifetime="0">
          <tab name="परिवारकाे संयाेजन">
            <!-- <h2  v-if="!this.$store.getters.isLoading">परिवारकाे संयाेजन</h2> -->
            <family-details v-if="selectedTab === 'परिवारकाे संयाेजन'"  />
          </tab>
          <tab name="कृषि">
            <!-- <h2  v-if="!this.$store.getters.isLoading">परिवारले कृषि कार्यका लागि जग्गा प्रयोग</h2> -->
            <family-agriculture
              v-if="selectedTab === 'कृषि'"
            />
          </tab>
          <tab name="पशुपालन">
            <!-- <h2  v-if="!this.$store.getters.isLoading">पशुपालन</h2> -->
            <family-livestock v-if="selectedTab === 'पशुपालन'" />
          </tab>
        </tabs>
      </div>
    </div>
  </div>
</template>

<script>
import { Tabs, Tab } from "vue-tabs-component";

export default {
  name: "Family",
  components: {
    FamilyDetails: () => import("./FamilyDetails"),
    FamilyAgriculture: () => import("./FamilyAgriculture"),
    FamilyLivestock: () => import("./FamilyLivestock"),
    TitleBar: () => import("../shared/TitleBar"),
    Stats: () => import("./FamilyStats"),
    Tabs,
    Tab,
    // TabFilter: () => import("../components/TabFilter/TabFilter"),
  },
  data() {
    return {
      selectedTab: "परिवारकाे संयाेजन",
    };
  },
  methods: {
    familyTabChange(selectedTab) {
      this.selectedTab = selectedTab.tab.name;
      this.$store.commit("changeLoader", true);
      window.scrollTo(0,0);
    },
  },
  // mounted(){
  //  this.selectedTab = "परिवारकाे संयाेजन"
  // }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
