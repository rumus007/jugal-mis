<template>
  <div class="section__map--inner">
    <div class="sidebar">
      <!-- <span>संस्थागत विवरण</span> -->
      <div class="select-all-filter">
        <input
          type="checkbox"
          v-model="allSelected"
          @click="handleSelectAllClick"
        />
        Select All
      </div>
      <div
        class="map-filter"
        v-for="(typeData, index) in categoryList"
        v-bind:key="index"
      >
        <input
          type="checkbox"
          :id="typeData.id"
          :value="typeData.id"
          v-model="selectedCategory"
        />
        <label>{{ typeData.nepali_name }} {{ `(${typeData.total})` }}</label>
        <br />
      </div>
    </div>
  </div>
</template>

<script>
import { filterObject, route } from "../../common/helper.js";
export default {
  name: "FilterByType",
  props: {
    resourceFilter: { type: Array, required: true },
    wardFilter: { type: Array, required: true },
  },
  data: function () {
    return {
      categoryList: [],
      selectedCategory: this.resourceFilter,
      allSelected: true,
    };
  },

  methods: {
    changeMarkerType() {
      if (this.selectedCategory.length !== this.categoryList.length) {
        this.allSelected = false;
      }
      if (this.selectedCategory.length === this.categoryList.length) {
        this.allSelected = true;
      }
      this.$emit("change", this.selectedCategory);
    },
    getTypeList() {
      const targetUrl = `resource/stats`;
      let queryParams = Object.assign({}, { ward: this.wardFilter });

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

      axios.get(targetUrl, { params: formattedParams }).then(({ data }) => {
        this.categoryList = data.data;
        this.allSelected && this.selectAllCategory();
      });
    },

    selectAllCategory() {
      let ids = this.categoryList.map((category) => category.id);
      this.selectedCategory = ids;
    },

    unCheckAllSelected() {
      this.selectedCategory = [];
    },
    handleSelectAllClick() {
      !this.allSelected ? this.selectAllCategory() : this.unCheckAllSelected();
    },
  },

  watch: {
    selectedCategory: {
      handler() {
        this.changeMarkerType();
      },
    },
    wardFilter: {
      handler() {
        this.getTypeList();
      },
    },
  },

  mounted() {
    this.getTypeList();
  },
};
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->

<style scoped lang="scss">
.institution {
  display: flex;
}

.sidebar {
  border-right: 1px solid rgba(114,115,142,0.2);
}
.map-filter, .select-all-filter {
  border-bottom: 1px solid rgba(114,115,142,0.2);
  list-style: none;
  padding: 16px 24px;
}
</style>
