<template>
  <div class="house-wrapper">
    <!-- <button v-on:click="updateData">Update Data</button> -->
    <TitleBar title="पारिवारिक विवरण" />
    <div class="tabs">
      <tabs :options="{ useUrlFragment: false }">
        <tab name="परिवारकाे संयाेजन">
          <h2>परिवारकाे संयाेजन</h2>
          <family-details />
        </tab>
      </tabs>
    </div>
  </div>
</template>

<script>
import { Tabs, Tab } from "vue-tabs-component";

export default {
  name: "Family",
  components: {
    FamilyDetails: () => import("./FamilyDetails"),
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
