(self.webpackChunk=self.webpackChunk||[]).push([[944],{853:(t,e,r)=>{"use strict";function n(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function a(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?n(Object(r),!0).forEach((function(e){o(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):n(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function o(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}function i(){return(i=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var r=arguments[e];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(t[n]=r[n])}return t}).apply(this,arguments)}r.d(e,{v7:()=>s,Y1:()=>c});var s=function(t){for(var e in t)""!==t[e]&&null!==t[e]&&void 0!==t[e]||delete t[e];return t},c=function(t){var e=i({},t),r={};return Object.keys(e).map((function(t){e[t].length>0&&(r=a(a({},r),{},o({},t,"".concat(e[t].join(","))))),"number"==typeof e[t]&&(r=a(a({},r),{},o({},t,"".concat(e[t]))))})),r}},7944:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>o});var n=r(853);const a={name:"GovernmentId",components:{IndividualChart:function(){return r.e(931).then(r.bind(r,7931))}},data:function(){return{showGovIdGraph:!0,govIdData:[],showGovIdLoader:!1}},methods:{showTable:function(t){this[t]=!1},showGraph:function(t){this[t]=!0},getFromApi:function(t,e,r){var a=this;this[t]=!0;var o="individual/".concat(r),i={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};i=(0,n.v7)(i);var s=(0,n.Y1)(i);axios.get(o,{params:s}).then((function(r){var n=r.data;a[e]=n.data,a[t]=!1})).catch((function(){a[t]=!1}))}},mounted:function(){this.getFromApi("showGovIdLoader","govIdData","government-id")},computed:{ward:function(){return this.$store.getters.ward},ageRange:function(){return this.$store.getters.ageRange}},watch:{ward:{handler:function(){this.getFromApi("showGovIdLoader","govIdData","government-id")},deep:!0},ageRange:{handler:function(){this.getFromApi("showGovIdLoader","govIdData","government-id")},deep:!0}}};const o=(0,r(1900).Z)(a,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("h2",[t._v("नागरिकतासहितका परिचयपत्र")]),t._v(" "),r("div",{staticClass:"chart-wrapper flex"},[r("individual-chart",{attrs:{showLoader:t.showGovIdLoader,data:t.govIdData,title:"नागरिकतासहितका परिचयपत्र",tableTitle:"नागरिकतासहितका परिचयपत्र",showGraphText:"showGovIdGraph",showGraph:t.showGovIdGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"बच्चालाई खाेपकाे अवस्था",yAxisTitle:"जम्मा"},showFullChartClass:!0,showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}})],1)])}),[],!1,null,"546ad8e6",null).exports}}]);
//# sourceMappingURL=944.js.map