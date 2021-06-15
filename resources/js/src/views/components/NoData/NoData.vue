<template>
  <!-- <div class="no-data">No data</div> -->
  <div class="no-data">
    <img class="no-data__img" src="images/no_data.svg" alt="no data found" height="170" width="100%"/>
    <p class="no-data__text">माफ गर्नुहोस्। कुनै डाटा भेटिएन</p>
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
    &__img {
      margin-bottom: 16px;
      width: 80px;
      height: 80px;
    }

    &__text {
      color: var(--orange-300);
      font-weight: 600;
    }
  }
</style>