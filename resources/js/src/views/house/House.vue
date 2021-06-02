<template>
  <div class="house-wrapper">
    <!-- <button v-on:click="updateData">Update Data</button> -->
    <TitleBar title="घरधुरीकाे विवरण" />
    <div class="tabs">
      <tabs :options="{ useUrlFragment: false }">
        <tab name="घरकाे अवस्था">
          <h2>घरकाे अवस्था</h2>
          <house-status />
        </tab>
        <tab name="उपयाेग्य बस्तु">
          <h2>उपयाेग्य बस्तु</h2>
          <house-items />
        </tab>
        <tab name="विपद पूर्वतयारी">
          <h2>विपद पूर्वतयारी</h2>
          <house-disaster-prepare />
        </tab>
        <tab name="भाैतिक पूर्वाधारकाे अवस्था">
          <h2>भाैतिक पूर्वाधारकाे अवस्था</h2>
          <house-facilities />
        </tab>
        <tab name="शाैचालयकाे अवस्था">
          <h2>शाैचालयकाे अवस्था</h2>
          <house-toilet />
        </tab>
        <tab name="घरकाे फाेहरमैला व्यवस्थापन">
          <h2>घरकाे फाेहरमैला व्यवस्थापन</h2>
          <house-waste-mgmt />
        </tab>
      </tabs>
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
    Tabs,
    Tab,
    // TabFilter: () => import("../components/TabFilter/TabFilter"),
  },
  props: {
    msg: String,
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
