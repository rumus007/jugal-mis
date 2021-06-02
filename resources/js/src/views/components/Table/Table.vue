<template>
  <div>
    <table style="width: 100%">
      <tr>
        <th>SN</th>
        <th>{{ tableHeader ? tableHeader : 'Category'}}</th>
        <th>जम्मा</th>
      </tr>
      <tr v-for="(tableData, index) in data" :key="tableData.index">
        <td>{{ index + 1 }}</td>
        <td>{{ tableData.category }}</td>
        <td v-text="getFormattedCount(tableData.total)"></td>
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
    tableHeader: { type: String },
  },
  methods: {
    getFormattedCount(count) {
      return englishToNepaliNumber(count);
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
table,
th,
td {
  border-collapse: collapse;
}
tr {
  border-bottom: 1px solid #d9dbdd;
}
th,
td {
  padding: 8px 16px;
  text-align: left;
}
</style>
