(self.webpackChunk=self.webpackChunk||[]).push([[997],{853:(t,e,a)=>{"use strict";function n(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,n)}return a}function r(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?n(Object(a),!0).forEach((function(e){o(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):n(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}function o(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}function s(){return(s=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var a=arguments[e];for(var n in a)Object.prototype.hasOwnProperty.call(a,n)&&(t[n]=a[n])}return t}).apply(this,arguments)}a.d(e,{v7:()=>i,Y1:()=>h});var i=function(t){for(var e in t)""!==t[e]&&null!==t[e]&&void 0!==t[e]||delete t[e];return t},h=function(t){var e=s({},t),a={};return Object.keys(e).map((function(t){e[t].length>0&&(a=r(r({},a),{},o({},t,"".concat(e[t].join(","))))),"number"==typeof e[t]&&(a=r(r({},a),{},o({},t,"".concat(e[t]))))})),a}},1997:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>o});var n=a(853);const r={name:"EmploymentStatus",components:{IndividualChart:function(){return a.e(931).then(a.bind(a,7931))},Loader:function(){return a.e(936).then(a.bind(a,2936))},NoData:function(){return a.e(920).then(a.bind(a,5101))},Table:function(){return a.e(307).then(a.bind(a,7307))}},data:function(){return{foreignEmploymentGraph:!0,foreignEmploymentData:[],showForeignEmploymentLoader:!1,privateBusinessData:[],showPrivateBusinessLoader:!1,showEmploymentStatsGraph:!0,employmentStatsData:[],showEmploymentStatsLoader:!1}},methods:{showTable:function(t){this[t]=!1},showGraph:function(t){this[t]=!0},getFromApi:function(t,e,a){var r=this;this[t]=!0;var o="individual/".concat(a),s={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};s=(0,n.v7)(s);var i=(0,n.Y1)(s);axios.get(o,{params:i}).then((function(a){var n,o=a.data;r[e]=null!==(n=null==o?void 0:o.data)&&void 0!==n?n:[],r[t]=!1})).catch((function(){r[t]=!1}))}},mounted:function(){this.getFromApi("showEmploymentStatsLoader","employmentStatsData","employment-status"),this.getFromApi("showForeignEmploymentLoader","foreignEmploymentData","foreign-employment"),this.getFromApi("showHouseListedLoader","privateBusinessData","private-business")},computed:{ward:function(){return this.$store.getters.ward},ageRange:function(){return this.$store.getters.ageRange}},watch:{ward:{handler:function(){this.getFromApi("showEmploymentStatsLoader","employmentStatsData","employment-status"),this.getFromApi("showHouseListedLoader","privateBusinessData","private-business"),this.getFromApi("showHouseListedLoader","privateBusinessData","private-business")},deep:!0},ageRange:{handler:function(){this.getFromApi("showEmploymentStatsLoader","employmentStatsData","employment-status"),this.getFromApi("showHouseListedLoader","privateBusinessData","private-business"),this.getFromApi("showHouseListedLoader","privateBusinessData","private-business")},deep:!0}}};const o=(0,a(1900).Z)(r,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("h2",[t._v("राेजगारीकाे अवस्था")]),t._v(" "),a("div",{staticClass:"chart-wrapper flex"},[a("individual-chart",{attrs:{showLoader:t.showEmploymentStatsLoader,data:t.employmentStatsData,title:"राेजगारीकाे अवस्था",tableTitle:"राेजगारीकाे अवस्था",showGraphText:"showEmploymentStatsGraph",showGraph:t.showEmploymentStatsGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"राेजगारीकाे अवस्था",yAxisTitle:"जम्मा"},showFullChartClass:!0,showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}}),t._v(" "),a("individual-chart",{attrs:{showLoader:t.showForeignEmploymentLoader,data:t.foreignEmploymentData,title:"वैदेशिक राेजगारीकाे अवस्था",tableTitle:"वैदेशिक राेजगारीकाे अवस्था",showGraphText:"foreignEmploymentGraph",showGraph:t.foreignEmploymentGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"वैदेशिक राेजगारीकाे अवस्था",yAxisTitle:"जम्मा"},showFullChartClass:!0,showVerticalChartClass:!0},on:{graphFunction:t.showGraph,tableFunction:t.showTable}})],1)])}),[],!1,null,"f640ec92",null).exports}}]);
//# sourceMappingURL=997.js.map