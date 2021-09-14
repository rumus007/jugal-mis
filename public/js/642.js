(self.webpackChunk=self.webpackChunk||[]).push([[642],{853:(t,a,e)=>{"use strict";function r(t,a){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);a&&(r=r.filter((function(a){return Object.getOwnPropertyDescriptor(t,a).enumerable}))),e.push.apply(e,r)}return e}function s(t){for(var a=1;a<arguments.length;a++){var e=null!=arguments[a]?arguments[a]:{};a%2?r(Object(e),!0).forEach((function(a){n(t,a,e[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):r(Object(e)).forEach((function(a){Object.defineProperty(t,a,Object.getOwnPropertyDescriptor(e,a))}))}return t}function n(t,a,e){return a in t?Object.defineProperty(t,a,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[a]=e,t}function o(){return(o=Object.assign||function(t){for(var a=1;a<arguments.length;a++){var e=arguments[a];for(var r in e)Object.prototype.hasOwnProperty.call(e,r)&&(t[r]=e[r])}return t}).apply(this,arguments)}e.d(a,{v7:()=>i,Y1:()=>h});var i=function(t){for(var a in t)""!==t[a]&&null!==t[a]&&void 0!==t[a]||delete t[a];return t},h=function(t){var a=o({},t),e={};return Object.keys(a).map((function(t){a[t].length>0&&(e=s(s({},e),{},n({},t,"".concat(a[t].join(","))))),"number"==typeof a[t]&&(e=s(s({},e),{},n({},t,"".concat(a[t]))))})),e}},9642:(t,a,e)=>{"use strict";e.r(a),e.d(a,{default:()=>n});var r=e(853);const s={name:"HouseDisasterPrepare",components:{HouseChart:function(){return e.e(118).then(e.bind(e,118))}},data:function(){return{showEqResistantLoader:!1,eqResistantData:[],showEqResistantGraph:!0,showRiskMitigateLoader:!1,riskMitigateData:[],showRiskMitigateGraph:!0,showVulnerableLoader:!1,vulnerableData:[],showVulnerableGraph:!0}},methods:{showTable:function(t){this[t]=!1},showGraph:function(t){this[t]=!0},getEQResistantData:function(){var t=this;this.showEqResistantLoader=!0;var a={ward:this.ward};a=(0,r.v7)(a);var e=(0,r.Y1)(a);axios.get("household/earthquake-resistant",{params:e}).then((function(a){var e,r=a.data;t.eqResistantData=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],t.showEqResistantLoader=!1})).catch((function(){t.showEqResistantLoader=!1}))},getVulnerableData:function(){var t=this;this.showVulnerableLoader=!0;var a={ward:this.ward};a=(0,r.v7)(a);var e=(0,r.Y1)(a);axios.get("household/vulnerable-types",{params:e}).then((function(a){var e,r=a.data;t.vulnerableData=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],t.showVulnerableLoader=!1})).catch((function(){t.showVulnerableLoader=!1}))},getRiskMitigationData:function(){var t=this;this.showRiskMitigateLoader=!0;var a={ward:this.ward};a=(0,r.v7)(a);var e=(0,r.Y1)(a);axios.get("household/risk-mitigation",{params:e}).then((function(a){var e,r=a.data;t.riskMitigateData=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],t.showRiskMitigateLoader=!1})).catch((function(){t.showRiskMitigateLoader=!1}))}},computed:{ward:function(){return this.$store.getters.ward}},watch:{ward:{handler:function(){this.getEQResistantData(),this.getVulnerableData(),this.getRiskMitigationData()},deep:!0}},mounted:function(){this.getEQResistantData(),this.getVulnerableData(),this.getRiskMitigationData()}};const n=(0,e(1900).Z)(s,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("h2",[t._v("विपद पूर्वतयारी")]),t._v(" "),e("div",{staticClass:"chart-wrapper flex"},[e("house-chart",{attrs:{showLoader:t.showEqResistantLoader,data:t.eqResistantData,title:"भूकम्प प्रतिराेधी घर",tableTitle:"भूकम्प प्रतिराेधी घर",showGraphText:"showEqResistantGraph",showGraph:t.showEqResistantGraph,chartDetail:{type:"Donut"},showDonutChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}}),t._v(" "),e("house-chart",{attrs:{showLoader:t.showRiskMitigateLoader,data:t.riskMitigateData,title:"घर परिवारको जोखिम पारिवारिक योजना",tableTitle:"घर परिवारको जोखिम पारिवारिक योजना",showGraphText:"showRiskMitigateGraph",showGraph:t.showRiskMitigateGraph,chartDetail:{type:"Donut"},showDonutChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}}),t._v(" "),e("house-chart",{attrs:{showLoader:t.showVulnerableLoader,data:t.vulnerableData,title:"घरलाइ प्राकृतिक प्रकोपको जोखिम र जाेखिमकाे प्रकार",tableTitle:"घरलाइ प्राकृतिक प्रकोपको जोखिम र जाेखिमकाे प्रकार",showGraphText:"showVulnerableGraph",showGraph:t.showVulnerableGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"घरलाइ प्राकृतिक प्रकोपको जोखिम र जाेखिमकाे प्रकार",yAxisTitle:"जम्मा"},showFullChartClass:!0,showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}})],1)])}),[],!1,null,"535c5a91",null).exports}}]);
//# sourceMappingURL=642.js.map