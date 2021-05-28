<template>    
    <div>       
       <tabs>
        <tab name="First tab">
            First tab content
        </tab>
        <tab name="Second tab">
            Second tab content
        </tab>
        <tab name="Third tab">
            Third tab content
        </tab>
    </tabs>
    </div>
</template>

<script>

import {Tabs, Tab} from 'vue-tabs-component';
export default {
    name: "TabFilter",
    components: {
        Tabs,
        Tab
    }
}

</script>

<style scoped>

</style>