<template>
  <div class="house-wrapper">
    <!-- <button v-on:click="updateData">Update Data</button> -->
    <TitleBar title="घरधुरीकाे विवरण" />
    <div class="main-content" id="main">     
        <Stats/>
      <div class="tabs">
        <tabs :options="{ useUrlFragment: false }" @changed="houseTabChange">
          <tab name="घरकाे अवस्था">
            <h2>घरकाे अवस्था</h2>
            <house-status v-if="selectedTab === 'घरकाे अवस्था'" />
          </tab>
          <tab name="उपयाेग्य बस्तु">
            <h2>उपयाेग्य बस्तु</h2>
            <house-items v-if="selectedTab === 'उपयाेग्य बस्तु'" />
          </tab>
          <tab name="विपद पूर्वतयारी">
            <h2>विपद पूर्वतयारी</h2>
            <house-disaster-prepare v-if="selectedTab === 'विपद पूर्वतयारी'" />
          </tab>
          <tab name="भाैतिक पूर्वाधारकाे अवस्था">
            <h2>भाैतिक पूर्वाधारकाे अवस्था</h2>
            <house-facilities
              v-if="selectedTab === 'भाैतिक पूर्वाधारकाे अवस्था'"
            />
          </tab>
          <tab name="शाैचालयकाे अवस्था">
            <h2>शाैचालयकाे अवस्था</h2>
            <house-toilet v-if="selectedTab === 'शाैचालयकाे अवस्था'" />
          </tab>
          <tab name="घरकाे फाेहरमैला व्यवस्थापन">
            <h2>घरकाे फाेहरमैला व्यवस्थापन</h2>
            <house-waste-mgmt
              v-if="selectedTab === 'घरकाे फाेहरमैला व्यवस्थापन'"
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
  name: "Ghar",
  components: {
    HouseStatus: () => import("./HouseStatus"),
    HouseItems: () => import("./HouseItems"),
    HouseDisasterPrepare: () => import("./HouseDisasterPrepare"),
    HouseFacilities: () => import("./HouseFacilities"),
    HouseToilet: () => import("./HouseToilet"),
    HouseWasteMgmt: () => import("./HouseWasteMgmt"),
    TitleBar: () => import("../shared/TitleBar"),
    Stats: () => import("../shared/Stats"),
    Tabs,
    Tab,
    // TabFilter: () => import("../components/TabFilter/TabFilter"),
  },
  props: {
    msg: String,
  },
  data() {
    return {
      selectedTab: "घरकाे अवस्था",
    };
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

    houseTabChange(selectedTab) {
      this.selectedTab = selectedTab.tab.name;
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>
