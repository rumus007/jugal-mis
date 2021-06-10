<template>
  <div>
    <table style="width: 100%" v-if="!isColumn">
      <tr>
        <th>क्र.सं</th>
        <th>{{ title ? title : "Category" }}</th>
        <th>जम्मा</th>
      </tr>
      <tr v-for="(tableData, index) in data" :key="index">
        <td v-text="getFormattedCount(index + 1)"></td>
        <td v-text="getFormattedCount(tableData.category)"></td>
        <td v-text="getFormattedCount(tableData.total)"></td>
      </tr>
    </table>
    <table style="width: 100%" v-else>
      <tr>
        <th>क्र.सं</th>
        <th v-text="title ? title : 'Category'"></th>
        <th
          v-for="(colData, index) in data"
          :key="index"
          v-text="colData.name"
        ></th>
      </tr>
      <tr v-for="(colData, index) in categoryData" :key="index">
        <td v-text="getFormattedCount(index + 1)"></td>
        <td v-text="getFormattedCount(colData)"></td>
        <td
          v-for="(realData, indexData) in data"
          :key="indexData"
          v-text="getFormattedCount(realData.data[index])"
        ></td>
      </tr>
    </table>
  </div>
</template>

<script>
import { englishToNepaliNumber } from "nepali-number";
export default {
  name: "Table",
  props: {
    data: { type: Array, required: true },
    title: { type: String },
    isColumn: { type: Boolean },
    categoryData: { type: Array },
  },
  methods: {
    getFormattedCount(count) {
      return englishToNepaliNumber(count);
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
table,
th,
td {
  border-collapse: collapse;
}

th {
  color: var(--neutrals-60);
  font-weight: bold;
}

tr {
  border-bottom: 1px solid #d9dbdd;
}

td {
  color: var(--neutrals-300);
}

th,
td {
  font-size: 14px;
  padding: 8px 16px;
  text-align: left;
}
</style>
