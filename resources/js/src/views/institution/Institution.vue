<template>
  <div class="institution-wrapper">
    <TitleBar title="संस्थागत विवरण" />
    <div class="institution">
      <FilterByType
        :resourceFilter="filter.resource_type_id"
        :wardFilter="filter.wardList"
        @change="handleResourceFilter"
      />
      <Map :mapData="mapData"></Map>
    </div>
  </div>
</template>

<script>
import { filterObject, route } from "../../common/helper.js";
export default {
  name: "Institution",
  components: {
    Map: () => import("../components/Map/Map.vue"),
    FilterByType: () => import("./FilterInstitutionByType.vue"),
    TitleBar: () => import("../shared/TitleBar"),
  },
  data: function () {
    return {
      filter: {
        resource_type_id: [],
      },
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

<style scoped>
.institution {
  display: flex;
}
.map-filter {
  list-style: none;
}
</style>
