<template>
  <div>
    <table style="width: 100%">
      <tr>
        <th>SN</th>
        <th>Year</th>
        <th>Total</th>
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
  border: 1px solid black;
  border-collapse: collapse;
}
th,
td {
  padding: 15px;
  text-align: left;
}
</style>
