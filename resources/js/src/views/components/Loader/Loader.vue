<template>
  <!-- <div class="loader-wrapper-component"> -->
    <div class="spinner-local">
      <!-- <div class="double-bounce1"></div>
      <div class="double-bounce2"></div> -->
      Loading.......
    </div>
  <!-- </div> -->
</template>

<script>
export default {
  name: "Loader",
};
</script>

<style scoped>
.loader-wrapper-component {
  /* background: #fff; */
  border-radius: 5px;
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.spinner-local {
  width: 40px;
  height: 40px;
  position: relative;
}

.double-bounce1,
.double-bounce2 {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #fff;
  opacity: 0.6;
  position: absolute;
  top: 0;
  left: 0;
  animation: m 2s infinite ease-in-out;
}

.double-bounce2 {
  animation-delay: -1s;
}

@keyframes m {
  0%,
  to {
    transform: scale(0);
    -webkit-transform: scale(0);
  }
  50% {
    transform: scale(1);
    -webkit-transform: scale(1);
  }
}
</style>
