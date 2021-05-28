<template>    
  <div class="title-bar flex">
    <h1>{{title}}</h1>
    <div class="ward-options">
      <multiselect
        v-model="filter.ward"
        :options="wardList"
        :multiple="true"
        placeholder="वार्ड छनौट गर्नुहोस्"
      ></multiselect>
     <!-- <v-select :options="wardOptions" placeholder="वार्ड छनौट गर्नुहोस्"/> -->
      <a href="#" class="download-pdf">
        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 13.4211H14V15H0V13.4211ZM7.77778 8.82L12.4997 4.02632L13.5994 5.14263L7 11.8421L0.400556 5.14342L1.50033 4.02632L6.22222 8.81842V0H7.77778V8.82Z" fill="#fff"/>
          </svg>
        डाउनलोड गर्नुहोस्
      </a>
    </div>
  </div>
</template>

<script>
    import Multiselect from "vue-multiselect";
    export default {
        name: "TitleBar",
        props: ['title'],
        components: {
            Multiselect,
        },
        data: function() {
            return {
                filter: {
                  ward: [],
                },
                wardList: [1, 2, 3, 4, 5, 6, 7],
                selectedWard: "",
            }
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped lang="scss">
  .title-bar {
    align-items: center;
    background-color: #028EFF;
    justify-content: space-between;
    padding: 20px 48px;
    h1 {
      color: var(--color-base);
    }
  }

  .ward-options {
    align-items: center;
    display: flex;
  }
  
  .multiselect {
    height: 42px;
    width: 169px;
  }

  .download-pdf {
    color:var(--color-base);
    margin-left: 24px;
    svg {
      float: left;
      margin-right: 8px;
      margin-top: 5px;
    }
  }
</style>