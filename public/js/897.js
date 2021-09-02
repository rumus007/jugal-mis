(self.webpackChunk=self.webpackChunk||[]).push([[897],{853:(t,e,r)=>{"use strict";function a(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,a)}return r}function n(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?a(Object(r),!0).forEach((function(e){o(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):a(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function o(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}function s(){return(s=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var r=arguments[e];for(var a in r)Object.prototype.hasOwnProperty.call(r,a)&&(t[a]=r[a])}return t}).apply(this,arguments)}r.d(e,{v7:()=>i,Y1:()=>l});var i=function(t){for(var e in t)""!==t[e]&&null!==t[e]&&void 0!==t[e]||delete t[e];return t},l=function(t){var e=s({},t),r={};return Object.keys(e).map((function(t){e[t].length>0&&(r=n(n({},r),{},o({},t,"".concat(e[t].join(","))))),"number"==typeof e[t]&&(r=n(n({},r),{},o({},t,"".concat(e[t]))))})),r}},8897:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>o});var a=r(853);const n={name:"EmploymentStatus",components:{IndividualChart:function(){return r.e(931).then(r.bind(r,7931))},Loader:function(){return r.e(936).then(r.bind(r,2936))},NoData:function(){return r.e(920).then(r.bind(r,5101))},Table:function(){return r.e(307).then(r.bind(r,7307))}},data:function(){return{foreignEmploymentGraph:!0,foreignEmploymentData:[],showForeignEmploymentLoader:!1,privateBusinessData:[],showPrivateBusinessLoader:!1,showEmploymentStatsGraph:!0,employmentStatsData:[],showEmploymentStatsLoader:!1}},methods:{showTable:function(t){this[t]=!1},showGraph:function(t){this[t]=!0},getFromApi:function(t,e,r){var n=this;this[t]=!0;var o="individual/".concat(r),s={ward:this.ward};s=(0,a.v7)(s);var i=(0,a.Y1)(s);axios.get(o,{params:i}).then((function(r){var a,o=r.data;n[e]=null!==(a=null==o?void 0:o.data)&&void 0!==a?a:[],n[t]=!1})).catch((function(){n[t]=!1}))}},mounted:function(){this.getFromApi("showEmploymentStatsLoader","employmentStatsData","employment-status"),this.getFromApi("showForeignEmploymentLoader","foreignEmploymentData","foreign-employment"),this.getFromApi("showHouseListedLoader","privateBusinessData","private-business")},computed:{ward:function(){return this.$store.getters.ward}},watch:{ward:{handler:function(){this.getFromApi("showEmploymentStatsLoader","employmentStatsData","employment-status"),this.getFromApi("showHouseListedLoader","privateBusinessData","private-business"),this.getFromApi("showHouseListedLoader","privateBusinessData","private-business")},deep:!0}}};const o=(0,r(1900).Z)(n,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("h2",[t._v("राेजगारीकाे अवस्था")]),t._v(" "),r("div",{staticClass:"chart-wrapper flex"},[r("individual-chart",{attrs:{showLoader:t.showEmploymentStatsLoader,data:t.employmentStatsData,title:"राेजगारीकाे अवस्था",tableTitle:"राेजगारीकाे अवस्था",showGraphText:"showEmploymentStatsGraph",showGraph:t.showEmploymentStatsGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"राेजगारीकाे अवस्था",yAxisTitle:"जम्मा"},showFullChartClass:!0,showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}}),t._v(" "),r("individual-chart",{attrs:{showLoader:t.showForeignEmploymentLoader,data:t.foreignEmploymentData,title:"वैदेशिक राेजगारीकाे अवस्था",tableTitle:"वैदेशिक राेजगारीकाे अवस्था",showGraphText:"foreignEmploymentGraph",showGraph:t.foreignEmploymentGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"वैदेशिक राेजगारीकाे अवस्था",yAxisTitle:"जम्मा"},showFullChartClass:!0,showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}})],1)])}),[],!1,null,"4efbf3af",null).exports}}]);
//# sourceMappingURL=897.js.map