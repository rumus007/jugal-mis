<template>
<div class="house-wrapper">
    <!-- <button v-on:click="updateData">Update Data</button> -->
  <TitleBar/>
  <div class="tabs">   
      <tabs>
        <tab name="घरकाे अवस्था">     
          <h2>घरकाे अवस्था</h2>
          <div class="chart-wrapper flex">
            <div class="charts">
              <h3>वडागत रुपमा घरकाे संख्या</h3>
              <div class="chart">
                <button v-on:click="showTable('showBarChartGraph')">Show table</button>
                <button v-on:click="showGraph('showBarChartGraph')">Show graph</button>
                <div v-if="showBarChartGraph">
                  <BarChart :series="barChartSeries" :options="barChartoptions" />
                </div>
                <div v-else>
                  <Table :data="tableBarChartData" />
                </div>                   
              </div>
            </div>
            <div class="charts">
              <h3>घरकाे स्वामित्व</h3>
              <div class="chart">
                <button v-on:click="showTable('showLineChartGraph')">Show table</button>
                <button v-on:click="showGraph('showLineChartGraph')">Show graph</button>
                <div v-if="showLineChartGraph">
                  <LineChart :series="lineChartSeries" :options="lineChartOptions" />
                </div>
                <div v-else>
                  <Table :data="tableLineChartData" />
                </div>
              </div>
            </div>
             <div class="charts">
              <h3>छानाकाे प्रकार</h3>             
               <div class="chart">                 
                  <button v-on:click="showTable('showPieChartGraph')">Show table</button>
                  <button v-on:click="showGraph('showPieChartGraph')">Show graph</button>
                  <div v-if="showPieChartGraph">
                    <PieChart :series="pieChartSeries" :options="pieChartOptions" />
                  </div>
                  <div v-else>
                    <Table :data="tablePieChartData" />
                  </div>
               </div>
            </div>
            <div class="charts">
              <h3>घरकाेे जग</h3>             
              <div class="chart">
                <button v-on:click="showTable('showBarChartGraph')">Show table</button>
                <button v-on:click="showGraph('showBarChartGraph')">Show graph</button>
                <div v-if="showBarChartGraph">
                  <BarChart :series="barChartSeries" :options="barChartoptions" />
                </div>
                <div v-else>
                  <Table :data="tableBarChartData" />
                </div>                   
              </div>
            </div>
          </div>
        </tab>
        <tab name="उपयाेग्य बस्तु"> 
          <h2>उपयाेग्य बस्तु</h2>    
           <div class="chart-wrapper flex">
            <div class="charts">
              <h3>परिवारका लागि खानेपानीकाे स्राेत</h3>                      
              <div class="chart">
                <button v-on:click="showTable('showLineChartGraph')">Show table</button>
                <button v-on:click="showGraph('showLineChartGraph')">Show graph</button>
                <div v-if="showLineChartGraph">
                  <LineChart :series="lineChartSeries" :options="lineChartOptions" />
                </div>
                <div v-else>
                  <Table :data="tableLineChartData" />
                </div>
              </div>
            </div>
            <div class="charts">
              <h3>खाना पकाउने मुख्य इन्धन </h3>
              <div class="chart">
                <button v-on:click="showTable('showBarChartGraph')">Show table</button>
                <button v-on:click="showGraph('showBarChartGraph')">Show graph</button>
                <div v-if="showBarChartGraph">
                  <BarChart :series="barChartSeries" :options="barChartoptions" />
                </div>
                <div v-else>
                  <Table :data="tableBarChartData" />
                </div>                   
              </div>
            </div>
            <div class="charts">
              <h3>विद्युतकाे प्रमुख इन्धन</h3>
              <div class="chart">
                <button v-on:click="showTable('showLineChartGraph')">Show table</button>
                <button v-on:click="showGraph('showLineChartGraph')">Show graph</button>
                <div v-if="showLineChartGraph">
                  <LineChart :series="lineChartSeries" :options="lineChartOptions" />
                </div>
                <div v-else>
                  <Table :data="tableLineChartData" />
                </div>
              </div>
            </div>
             <div class="charts">
              <h3>बैकल्पिक इन्धनकाे प्रयाेग</h3>
              <div class="chart">
                <button v-on:click="showTable('showBarChartGraph')">Show table</button>
                <button v-on:click="showGraph('showBarChartGraph')">Show graph</button>
                <div v-if="showBarChartGraph">
                  <BarChart :series="barChartSeries" :options="barChartoptions" />
                </div>
                <div v-else>
                  <Table :data="tableBarChartData" />
                </div>                   
              </div>
            </div>
            <div class="charts">
              <h3>आधारभुत स्वास्थ्य सेवाका लागि जाँदा लाग्ने समय</h3>
              <div class="chart">
                <button v-on:click="showTable('showLineChartGraph')">Show table</button>
                <button v-on:click="showGraph('showLineChartGraph')">Show graph</button>
                <div v-if="showLineChartGraph">
                  <LineChart :series="lineChartSeries" :options="lineChartOptions" />
                </div>
                <div v-else>
                  <Table :data="tableLineChartData" />
                </div>
              </div>
            </div>
          </div> 
        </tab>
        <tab name="विपद पूर्वतयारी">  
          <h2>विपद पूर्वतयारी</h2>                
           <div class="chart-wrapper flex">  
              <div class="charts">
               <h3>भूकम्प प्रतिराेधी घर</h3>  
               <div class="chart">                 
                  <button v-on:click="showTable('showPieChartGraph')">Show table</button>
                  <button v-on:click="showGraph('showPieChartGraph')">Show graph</button>
                  <div v-if="showPieChartGraph">
                    <PieChart :series="pieChartSeries" :options="pieChartOptions" />
                  </div>
                  <div v-else>
                    <Table :data="tablePieChartData" />
                  </div>
               </div>
              </div>
              <div class="charts">
                <h3>घरलाइ प्राकृतिक प्रकोपको जोखिम र जाेखिमकाे प्रकार</h3>
                <div class="chart">
                  <button v-on:click="showTable('showBarChartGraph')">Show table</button>
                  <button v-on:click="showGraph('showBarChartGraph')">Show graph</button>
                  <div v-if="showBarChartGraph">
                    <BarChart :series="barChartSeries" :options="barChartoptions" />
                  </div>
                  <div v-else>
                    <Table :data="tableBarChartData" />
                  </div>                   
                </div>
              </div>
              <div class="charts">
                <h3>विद्युतकाे प्रमुख इन्धन</h3>
                <div class="chart">
                  <button v-on:click="showTable('showLineChartGraph')">Show table</button>
                  <button v-on:click="showGraph('showLineChartGraph')">Show graph</button>
                  <div v-if="showLineChartGraph">
                    <LineChart :series="lineChartSeries" :options="lineChartOptions" />
                  </div>
                  <div v-else>
                    <Table :data="tableLineChartData" />
                  </div>
                </div>
              </div>
          </div> 
        </tab>
    </tabs>
  </div>
  </div>
</template>

<script>

import {Tabs, Tab} from 'vue-tabs-component';

export default {
  name: "Ghar",
  components:{
        BarChart: () => import("../components/Chart/BarChart"),
        LineChart: () => import("../components/Chart/LineChart"),
        PieChart: () => import("../components/Chart/PieChart"),
        Table: () => import("../components/Table/Table"),
        TitleBar: () => import("../shared/TitleBar"),
        Tabs,
        Tab
        // TabFilter: () => import("../components/TabFilter/TabFilter"),
    },
  props: {
    msg: String,
  },
  data: function () {
    return {
      showBarChartGraph: true,
      showLineChartGraph: true,
      showPieChartGraph: true,
      barChartoptions: {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996],
        },
      },
      barChartSeries: [
        {
          name: "bar-chart",
          data: [30, 40, 45, 50, 49, 60],
        },
      ],

      tableBarChartData: [
        { category: 1991, total: 30 },
        { category: 1992, total: 40 },
        { category: 1993, total: 45 },
        { category: 1994, total: 50 },
        { category: 1995, total: 49 },
        { category: 1996, total: 60 },
      ],

      lineChartOptions: {
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998],
        },
      },

      lineChartSeries: [
        {
          name: "line-chart",
          data: [30, 40, 45, 50, 49, 60, 70, 91],
        },
      ],

      tableLineChartData: [
        { category: 1991, total: 30 },
        { category: 1992, total: 40 },
        { category: 1993, total: 45 },
        { category: 1994, total: 50 },
        { category: 1995, total: 49 },
        { category: 1996, total: 60 },
      ],

      pieChartSeries: [44, 55, 41, 17, 15],

      pieChartOptions: {
        chart: {
          type: "donut",
        },
      },

      tablePieChartData: [
        { category: 1991, total: 30 },
        { category: 1992, total: 40 },
        { category: 1993, total: 45 },
        { category: 1994, total: 50 },
        { category: 1995, total: 49 },
        { category: 1996, total: 60 },
      ],
    };
  },
  methods: {
    updateData: function () {
      this.barChartoptions = {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
        },
      };
    },
    showTable: function (dataType) {
      this[dataType] = false;
    },
    showGraph: function (dataType) {
      this[dataType] = true;
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

  .charts {
    width: 48%;
  }

  .chart {
      background: #F5F5F7;
      border-radius: 8px;
      height: 370px;
      margin-bottom: 40px;
      padding: 24px;
      &-wrapper {
        flex-wrap: wrap;
        justify-content: space-between;
      }
      button {
        margin-bottom: 24px;
      }
  }
</style>
