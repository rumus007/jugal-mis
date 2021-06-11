(self.webpackChunk=self.webpackChunk||[]).push([[705],{853:(e,t,a)=>{"use strict";function o(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,o)}return a}function i(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?o(Object(a),!0).forEach((function(t){r(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):o(Object(a)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}function r(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}function s(){return(s=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var o in a)Object.prototype.hasOwnProperty.call(a,o)&&(e[o]=a[o])}return e}).apply(this,arguments)}a.d(t,{v7:()=>n,Y1:()=>h});var n=function(e){for(var t in e)""!==e[t]&&null!==e[t]&&void 0!==e[t]||delete e[t];return e},h=function(e){var t=s({},e),a={};return Object.keys(t).map((function(e){t[e].length>0&&(a=i(i({},a),{},r({},e,"".concat(t[e].join(",")))))})),a}},3705:(e,t,a)=>{"use strict";a.r(t),a.d(t,{default:()=>r});var o=a(853);const i={name:"ServiceUsageStatus",components:{IndividualChart:function(){return a.e(818).then(a.bind(a,818))}},data:function(){return{showProlongDiseaseGraph:!0,prolongDiseaseData:[],showProlongDiseaseLoader:!1,showCommonDiseaseGraph:!0,commonDiseaseData:[],showCommonDiseaseLoader:!1,showCitizenshipGraph:!0,citizenshipData:[],showCitizenshipLoader:!1,showVaccineGraph:!0,vaccineData:[],showVaccineLoder:!1}},methods:{showTable:function(e){this[e]=!1},showGraph:function(e){this[e]=!0},getFromApi:function(e,t,a){var i=this;this[e]=!0;var r="individual/".concat(a),s={ward:this.ward};s=(0,o.v7)(s);var n=(0,o.Y1)(s);axios.get(r,{params:n}).then((function(a){var o,r=a.data;i[t]=null!==(o=null==r?void 0:r.data)&&void 0!==o?o:[],i[e]=!1})).catch((function(){i[e]=!1}))}},mounted:function(){this.getFromApi("showVaccineLoder","vaccineData","vaccination-immunization"),this.getFromApi("showProlongDiseaseLoader","prolongDiseaseData","prolonged-diseases"),this.getFromApi("showCommmonDiseaseLoader","commonDiseaseData","common-diseases"),this.getFromApi("showCitizenshipLoader","citizenshipData","citizenship-status")},computed:{ward:function(){return this.$store.getters.ward}},watch:{ward:{handler:function(){this.getFromApi("showVaccineLoder","vaccineData","vaccination-immunization"),this.getFromApi("showProlongDiseaseLoader","prolongDiseaseData","prolonged-diseases"),this.getFromApi("showCommmonDiseaseLoader","commonDiseaseData","common-diseases"),this.getFromApi("showCitizenshipLoader","citizenshipData","citizenship-status")},deep:!0}}};const r=(0,a(1900).Z)(i,(function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",[a("h2",[e._v("सेवा तथा सुविधाहरुकाे प्रयाेगकाे अवस्था")]),e._v(" "),a("div",{staticClass:"chart-wrapper flex"},[a("individual-chart",{attrs:{showLoader:e.showVaccineLoder,data:e.vaccineData,title:"बच्चालाई खाेपकाे अवस्था",tableTitle:"बच्चालाई खाेपकाे अवस्था",showGraphText:"showVaccineGraph",showGraph:e.showVaccineGraph,chartDetail:{type:"Bar",horizontalBar:!0,yAxisTitle:"बच्चालाई खाेपकाे अवस्था",xAxisTitle:"जम्मा"}},on:{graphFunction:e.showGraph,tableFunction:e.showTable}}),e._v(" "),a("individual-chart",{attrs:{showLoader:e.showProlongDiseaseLoader,data:e.prolongDiseaseData,title:"दीर्घराेगबाट पीडित जनसंख्या",tableTitle:"दीर्घराेगबाट पीडित जनसंख्या",showGraphText:"showProlongDiseaseGraph",showGraph:e.showProlongDiseaseGraph,chartDetail:{type:"Bar",horizontalBar:!0,yAxisTitle:"दीर्घराेगबाट पीडित जनसंख्या",xAxisTitle:"जम्मा"}},on:{graphFunction:e.showGraph,tableFunction:e.showTable}}),e._v(" "),a("individual-chart",{attrs:{showLoader:e.showCommonDiseaseLoader,data:e.commonDiseaseData,title:"राेगबाट पीडित जनसंख्या",tableTitle:"राेगबाट पीडित जनसंख्या",showGraphText:"showCommonDiseaseGraph",showGraph:e.showCommonDiseaseGraph,chartDetail:{type:"Bar",horizontalBar:!0,yAxisTitle:"राेगबाट पीडित जनसंख्या",xAxisTitle:"जम्मा"}},on:{graphFunction:e.showGraph,tableFunction:e.showTable}}),e._v(" "),a("individual-chart",{attrs:{showLoader:e.showCitizenshipLoader,data:e.citizenshipData,title:"नागरिकताकाे अवस्था",tableTitle:"नागरिकताकाे अवस्था",showGraphText:"showCitizenshipGraph",showGraph:e.showCitizenshipGraph,chartDetail:{type:"Donut"},showDonutChartClass:!0},on:{graphFunction:e.showGraph,tableFunction:e.showTable}})],1)])}),[],!1,null,"5c6e0d0f",null).exports}}]);
//# sourceMappingURL=705.js.map