<template>
    <div>
        <Header></Header>
        <router-view></router-view>
        <Footer></Footer>
    </div>
</template>

<script>
export default {
    components:{
        Header: () => import("./shared/Header.vue"),
        Footer: () => import("./shared/Footer.vue")
    }
    
}
</script>

<style scoped>

</style>