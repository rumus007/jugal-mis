(self.webpackChunk=self.webpackChunk||[]).push([[523],{853:(t,a,e)=>{"use strict";function r(t,a){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);a&&(r=r.filter((function(a){return Object.getOwnPropertyDescriptor(t,a).enumerable}))),e.push.apply(e,r)}return e}function o(t){for(var a=1;a<arguments.length;a++){var e=null!=arguments[a]?arguments[a]:{};a%2?r(Object(e),!0).forEach((function(a){i(t,a,e[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):r(Object(e)).forEach((function(a){Object.defineProperty(t,a,Object.getOwnPropertyDescriptor(e,a))}))}return t}function i(t,a,e){return a in t?Object.defineProperty(t,a,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[a]=e,t}function h(){return(h=Object.assign||function(t){for(var a=1;a<arguments.length;a++){var e=arguments[a];for(var r in e)Object.prototype.hasOwnProperty.call(e,r)&&(t[r]=e[r])}return t}).apply(this,arguments)}e.d(a,{v7:()=>n,Y1:()=>s});var n=function(t){for(var a in t)""!==t[a]&&null!==t[a]&&void 0!==t[a]||delete t[a];return t},s=function(t){var a=h({},t),e={};return Object.keys(a).map((function(t){a[t].length>0&&(e=o(o({},e),{},i({},t,"".concat(a[t].join(","))))),"number"==typeof a[t]&&(e=o(o({},e),{},i({},t,"".concat(a[t]))))})),e}},9523:(t,a,e)=>{"use strict";e.r(a),e.d(a,{default:()=>i});var r=e(853);const o={name:"HouseItems",components:{HouseChart:function(){return e.e(118).then(e.bind(e,118))}},data:function(){return{showDrinkWaterSrcGraph:!0,drinkWaterSrcData:[],showDrinkWaterSrcLoader:!1,showTimeForHealthCareGraph:!0,timeForHealthCareData:[],showTimeForHealthCare:!1,showAlternativeSrcGraph:!0,alternativeSrcData:[],showAlternativeSrcLoader:!1,showElectricitySrcGraph:!0,electrictySrcData:[],showElectricitySrcLoader:!1,showTimeForWaterFetchGraph:!0,timeForWaterFetchData:[],showTimeForWaterFetchLoader:!1,showCookFuelGraph:!0,cookFuelData:[],showCookFuelLoader:!1,showNewBornLocationGraph:!0,newBornLocationData:[],showNewBornLocationLoader:!1}},methods:{showTable:function(t){this[t]=!1},showGraph:function(t){this[t]=!0},getSourceDrinkWaterData:function(){var t=this;this.showDrinkWaterSrcLoader=!0;var a={ward:this.ward};a=(0,r.v7)(a);var e=(0,r.Y1)(a);axios.get("household/source-drinking-water",{params:e}).then((function(a){var e,r=a.data;t.drinkWaterSrcData=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],t.showDrinkWaterSrcLoader=!1})).catch((function(){t.showDrinkWaterSrcLoader=!1}))},getTimeForHealthCareData:function(){var t=this;this.showTimeForHealthCare=!0;var a={ward:this.ward};a=(0,r.v7)(a);var e=(0,r.Y1)(a);axios.get("household/distance-basic-healthcare",{params:e}).then((function(a){var e,r=a.data;t.timeForHealthCareData=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],t.showTimeForHealthCare=!1})).catch((function(){t.showTimeForHealthCare=!1}))},getFoundationData:function(){var t=this;this.showAlternativeSrcLoader=!0;var a={ward:this.ward};a=(0,r.v7)(a);var e=(0,r.Y1)(a);axios.get("household/source-alternate-energy",{params:e}).then((function(a){var e,r=a.data;t.alternativeSrcData=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],t.showAlternativeSrcLoader=!1})).catch((function(){t.showAlternativeSrcLoader=!1}))},getElectricitySrcData:function(){var t=this;this.showElectricitySrcLoader=!0;var a={ward:this.ward};a=(0,r.v7)(a);var e=(0,r.Y1)(a);axios.get("household/source-electricity",{params:e}).then((function(a){var e,r=a.data;t.electrictySrcData=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],t.showElectricitySrcLoader=!1})).catch((function(){t.showElectricitySrcLoader=!1}))},getTimeForWaterFetchData:function(){var t=this;this.showTimeForWaterFetchLoader=!0;var a={ward:this.ward};a=(0,r.v7)(a);var e=(0,r.Y1)(a);axios.get("household/distance-fetch-water",{params:e}).then((function(a){var e,r=a.data;t.timeForWaterFetchData=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],t.showTimeForWaterFetchLoader=!1})).catch((function(){t.showTimeForWaterFetchLoader=!1}))},getCookFuelData:function(){var t=this;this.showCookFuelLoader=!0;var a={ward:this.ward};a=(0,r.v7)(a);var e=(0,r.Y1)(a);axios.get("household/source-fuel",{params:e}).then((function(a){var e,r=a.data;t.cookFuelData=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],t.showCookFuelLoader=!1})).catch((function(){t.showCookFuelLoader=!1}))},getNewBornLocationData:function(){var t=this;this.showNewBornLocationLoader=!0;var a={ward:this.ward};a=(0,r.v7)(a);var e=(0,r.Y1)(a);axios.get("household/newborn-birthplace",{params:e}).then((function(a){var e,r=a.data;t.newBornLocationData=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],t.showNewBornLocationLoader=!1})).catch((function(){t.showNewBornLocationLoader=!1}))}},mounted:function(){this.getSourceDrinkWaterData(),this.getTimeForHealthCareData(),this.getFoundationData(),this.getElectricitySrcData(),this.getTimeForWaterFetchData(),this.getCookFuelData(),this.getNewBornLocationData()},computed:{ward:function(){return this.$store.getters.ward}},watch:{ward:{handler:function(){this.getSourceDrinkWaterData(),this.getTimeForHealthCareData(),this.getFoundationData(),this.getElectricitySrcData(),this.getTimeForWaterFetchData(),this.getCookFuelData(),this.getNewBornLocationData()},deep:!0}}};const i=(0,e(1900).Z)(o,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("h2",[t._v("उपयाेग्य बस्तु")]),t._v(" "),e("div",{staticClass:"chart-wrapper flex"},[e("house-chart",{attrs:{showLoader:t.showDrinkWaterSrcLoader,data:t.drinkWaterSrcData,title:"परिवारका लागि खानेपानीकाे स्राेत",tableTitle:"परिवारका लागि खानेपानीकाे स्राेत",showGraphText:"showDrinkWaterSrcGraph",showGraph:t.showDrinkWaterSrcGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"परिवारका लागि खानेपानीकाे स्राेत",yAxisTitle:"जम्मा"},showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}}),t._v(" "),e("house-chart",{attrs:{showLoader:t.showCookFuelLoader,data:t.cookFuelData,title:"खाना पकाउने मुख्य इन्धन",tableTitle:"खाना पकाउने मुख्य इन्धन",showGraphText:"showCookFuelGraph",showGraph:t.showCookFuelGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"खाना पकाउने मुख्य इन्धन",yAxisTitle:"जम्मा"},showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}}),t._v(" "),e("house-chart",{attrs:{showLoader:t.showElectricitySrcLoader,data:t.electrictySrcData,title:"विद्युतकाे प्रमुख इन्धन",tableTitle:"विद्युतकाे प्रमुख इन्धन",showGraphText:"showElectricitySrcGraph",showGraph:t.showElectricitySrcGraph,chartDetail:{type:"Bar",horizontalBar:!0,yAxisTitle:"विद्युतकाे प्रमुख इन्धन",xAxisTitle:"जम्मा"}},on:{graphFunction:t.showGraph,tableFunction:t.showTable}}),t._v(" "),e("house-chart",{attrs:{showLoader:t.showAlternativeSrcLoader,data:t.alternativeSrcData,title:"बैकल्पिक इन्धनकाे प्रयाेग",tableTitle:"बैकल्पिक इन्धनकाे प्रयाेग",showGraphText:"showAlternativeSrcGraph",showGraph:t.showAlternativeSrcGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"बैकल्पिक इन्धनकाे प्रयाेग",yAxisTitle:"जम्मा"},showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}}),t._v(" "),e("house-chart",{attrs:{showLoader:t.showTimeForHealthCare,data:t.timeForHealthCareData,title:"आधारभुत स्वास्थ्य सेवाका लागि जाँदा लाग्ने समय",tableTitle:"आधारभुत स्वास्थ्य सेवाका लागि जाँदा लाग्ने समय",showGraphText:"showTimeForHealthCareGraph",showGraph:t.showTimeForHealthCareGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"आधारभुत स्वास्थ्य सेवाका लागि जाँदा लाग्ने समय",yAxisTitle:"जम्मा"},showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}}),t._v(" "),e("house-chart",{attrs:{showLoader:t.showTimeForWaterFetchLoader,data:t.timeForWaterFetchData,title:"खानेपानी लिनका लागि जाँदा लाग्ने समय",tableTitle:"खानेपानी लिनका लागि जाँदा लाग्ने समय",showGraphText:"showTimeForWaterFetchGraph",showGraph:t.showTimeForWaterFetchGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"खानेपानी लिनका लागि जाँदा लाग्ने समय",yAxisTitle:"जम्मा"},showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}}),t._v(" "),e("house-chart",{attrs:{showLoader:t.showNewBornLocationLoader,data:t.newBornLocationData,title:"शिशुकाे जन्म भएकाे स्थान",tableTitle:"शिशुकाे जन्म भएकाे स्थान",showGraphText:"showNewBornLocationGraph",showGraph:t.showNewBornLocationGraph,chartDetail:{type:"Bar",horizontalBar:!0,yAxisTitle:"शिशुकाे जन्म भएकाे स्थान",xAxisTitle:"जम्मा"}},on:{graphFunction:t.showGraph,tableFunction:t.showTable}})],1)])}),[],!1,null,"77b11d24",null).exports}}]);
//# sourceMappingURL=523.js.map