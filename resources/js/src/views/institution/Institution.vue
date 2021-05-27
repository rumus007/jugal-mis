<template>
  <div>
    <div>
      <multiselect
        v-model="filter.ward"
        :options="wardList"
        :multiple="true"
      ></multiselect>
    </div>
    <div class="institution">
      <FilterByType
        :resourceFilter="filter.resource_type_id"
        :wardFilter="filter.ward"
        @change="handleResourceFilter"
      />
      <Map :mapData="mapData"></Map>
    </div>
  </div>
</template>

<script>
import { filterObject, route } from "../../common/helper.js";
import Multiselect from "vue-multiselect";
export default {
  name: "Institution",
  components: {
    Map: () => import("../components/Map/Map.vue"),
    FilterByType: () => import("./FilterInstitutionByType.vue"),
    Multiselect,
  },
  data: function () {
    return {
      filter: {
        ward: [],
        resource_type_id: [],
      },
      wardList: [1, 2, 3, 4, 5, 6, 7],
      selectedWard: "",
      mapData: [],
      resourceTypeList: [],
    };
  },
  // watcher needs to be used as depending upon this we need to send filtered data to map component
  watch: {
    filter: {
      handler() {
        this.getMapData();
      },
      deep: true,
    },
  },
  methods: {
    getMapData: function () {
      const targetUrl = `resource/mapdata`;
      let queryParams = Object.assign({}, this.filter);
      queryParams = filterObject(queryParams);
      let formattedParams = {};
      Object.keys(queryParams).map((data) => {
        if (queryParams[data].length > 0) {
          formattedParams = {
            ...formattedParams,
            [data]: `${queryParams[data].join(",")}`,
          };
        }
      });

      this.filter.resource_type_id.length !== 0
        ? axios.get(targetUrl, { params: formattedParams }).then(({ data }) => {
            this.mapData = data.data;
          })
        : (this.mapData = []);
    },

    handleResourceFilter: function (selectedFilter) {
      this.filter.resource_type_id = selectedFilter;
    },
  },
};
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
.institution {
  display: flex;
}
.map-filter {
  list-style: none;
}
</style>
