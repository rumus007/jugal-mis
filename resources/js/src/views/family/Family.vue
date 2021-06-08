<template>
  <div class="house-wrapper">
    <TitleBar title="पारिवारिक विवरण" />
    <div class="main-content" id="main">     
      <Stats/>
      <div class="tabs">
        <tabs :options="{ useUrlFragment: false }" @changed="familyTabChange">
          <tab name="परिवारकाे संयाेजन">
            <!-- <h2  v-if="!this.$store.getters.isLoading">परिवारकाे संयाेजन</h2> -->
            <family-details v-if="selectedTab === 'परिवारकाे संयाेजन'" />
          </tab>
          <tab name="परिवारले कृषि कार्यका लागि जग्गा प्रयोग">
            <!-- <h2  v-if="!this.$store.getters.isLoading">परिवारले कृषि कार्यका लागि जग्गा प्रयोग</h2> -->
            <family-agriculture
              v-if="selectedTab === 'परिवारले कृषि कार्यका लागि जग्गा प्रयोग'"
            />
          </tab>
          <tab name="पशुधन">
            <!-- <h2  v-if="!this.$store.getters.isLoading">पशुधन</h2> -->
            <family-livestock v-if="selectedTab === 'पशुधन'" />
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
    Stats: () => import("../shared/Stats"),
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
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
