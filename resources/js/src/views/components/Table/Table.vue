<template>
  <div>
    <table style="width: 100%">
      <tr>
        <th>SN</th>
        <th>Year</th>
        <th>जम्मा</th>
      </tr>
      <tr v-for="(tableData, index) in data" :key="tableData.index">
        <td>{{ index + 1 }}</td>
        <td>{{ tableData.category }}</td>
        <td>{{ tableData.total }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  name: "Table",
  props: {
    data: { type: Array, required: true },
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
  border-bottom: 1px solid #D9DBDD;
}
th,
td {
  padding: 8px 16px;
  text-align: left;
}
</style>
