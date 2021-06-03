<template>
  <!-- <div class="no-data">No data</div> -->
  <div class="no-data">
    <img src="images/no_data.svg" alt="no data found" height="170" width="100%"/>
    <p>कुनै डाटा उपलब्ध छैन</p>
  </div>
</template>

<script>
export default {
  name: "no-data",
};
</script>
<style scoped lang="scss">
  .no-data{
    align-items: center;
    display: flex;
    flex-direction: column;
    height: 90%;
    justify-content: center;
    padding: 10px;
    img {
      margin-bottom: 16px;
    }
  }
</style>