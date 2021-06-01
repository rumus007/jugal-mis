(self.webpackChunk=self.webpackChunk||[]).push([[258],{853:(t,a,o)=>{"use strict";o.d(a,{v7:()=>r});var r=function(t){for(var a in t)""!==t[a]&&null!==t[a]&&void 0!==t[a]||delete t[a];return t}},9258:(t,a,o)=>{"use strict";o.r(a),o.d(a,{default:()=>h});var r=o(853);function e(t,a){var o=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);a&&(r=r.filter((function(a){return Object.getOwnPropertyDescriptor(t,a).enumerable}))),o.push.apply(o,r)}return o}function s(t){for(var a=1;a<arguments.length;a++){var o=null!=arguments[a]?arguments[a]:{};a%2?e(Object(o),!0).forEach((function(a){i(t,a,o[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(o)):e(Object(o)).forEach((function(a){Object.defineProperty(t,a,Object.getOwnPropertyDescriptor(o,a))}))}return t}function i(t,a,o){return a in t?Object.defineProperty(t,a,{value:o,enumerable:!0,configurable:!0,writable:!0}):t[a]=o,t}const n={name:"HouseStatus",components:{BarChart:function(){return o.e(466).then(o.bind(o,9466))},LineChart:function(){return o.e(700).then(o.bind(o,2700))},PieChart:function(){return o.e(417).then(o.bind(o,6417))},DonutChart:function(){return o.e(579).then(o.bind(o,2579))},Table:function(){return o.e(830).then(o.bind(o,4830))}},data:function(){return{showOwnerShipGraph:!0,ownershipData:[],showHouseNumberGraph:!0,houseNumberData:[],showFoundationGraph:!0,foundationData:[],showRoofingGraph:!0,roofingData:[],showRoadtoHouseGraph:!0,roadToHouseData:[],showRoadTypeGraph:!0,roadTypeData:[],showBarChartGraph:!0,barChartoptions:{chart:{id:"vuechart-example"},xaxis:{categories:[1991,1992,1993,1994,1995,1996]}},barChartSeries:[{name:"bar-chart",data:[30,40,45,50,49,60]}],tableBarChartData:[{category:1991,total:30},{category:1992,total:40},{category:1993,total:45},{category:1994,total:50},{category:1995,total:49},{category:1996,total:60}]}},methods:{showTable:function(t){this[t]=!1},showGraph:function(t){this[t]=!0},getOwnerShipData:function(){var t=this,a={ward:this.ward};a=(0,r.v7)(a);var o={};Object.keys(a).map((function(t){a[t].length>0&&(o=s(s({},o),{},i({},t,"".concat(a[t].join(",")))))})),axios.get("household/ownership",{params:o}).then((function(a){var o=a.data;t.ownershipData=o.data}))},getHouseNumberData:function(){var t=this,a={ward:this.ward};a=(0,r.v7)(a);var o={};Object.keys(a).map((function(t){a[t].length>0&&(o=s(s({},o),{},i({},t,"".concat(a[t].join(",")))))})),axios.get("household/house-number",{params:o}).then((function(a){var o=a.data;t.houseNumberData=o.data}))},getFoundationData:function(){var t=this,a={ward:this.ward};a=(0,r.v7)(a);var o={};Object.keys(a).map((function(t){a[t].length>0&&(o=s(s({},o),{},i({},t,"".concat(a[t].join(",")))))})),axios.get("household/foundation",{params:o}).then((function(a){var o=a.data;t.foundationData=o.data}))},getRoofingData:function(){var t=this,a={ward:this.ward};a=(0,r.v7)(a);var o={};Object.keys(a).map((function(t){a[t].length>0&&(o=s(s({},o),{},i({},t,"".concat(a[t].join(",")))))})),axios.get("household/roofing",{params:o}).then((function(a){var o=a.data;t.roofingData=o.data}))},getRoadTypeToHouseData:function(){var t=this,a={ward:this.ward};a=(0,r.v7)(a);var o={};Object.keys(a).map((function(t){a[t].length>0&&(o=s(s({},o),{},i({},t,"".concat(a[t].join(",")))))})),axios.get("household/road-type-to-house",{params:o}).then((function(a){var o=a.data;t.roadToHouseData=o.data}))},getRoadTypeData:function(){var t=this,a={ward:this.ward};a=(0,r.v7)(a);var o={};Object.keys(a).map((function(t){a[t].length>0&&(o=s(s({},o),{},i({},t,"".concat(a[t].join(",")))))})),axios.get("household/road-type",{params:o}).then((function(a){var o=a.data;t.roadTypeData=o.data}))}},mounted:function(){this.getOwnerShipData(),this.getHouseNumberData(),this.getFoundationData(),this.getRoofingData(),this.getRoadTypeToHouseData(),this.getRoadTypeData()},computed:{ward:function(){return this.$store.getters.ward}},watch:{ward:{handler:function(){this.getOwnerShipData(),this.getHouseNumberData(),this.getFoundationData(),this.getRoofingData(),this.getRoadTypeToHouseData(),this.getRoadTypeData()},deep:!0}}};const h=(0,o(1900).Z)(n,(function(){var t=this,a=t.$createElement,o=t._self._c||a;return o("div",{staticClass:"chart-wrapper flex"},[o("div",{staticClass:"charts"},[o("h3",[t._v("घरकाे स्वामित्व")]),t._v(" "),o("div",{staticClass:"card chart"},[o("div",{staticClass:"view-icons"},[o("button",{class:t.showOwnerShipGraph?"active":"",on:{click:function(a){return t.showGraph("showOwnerShipGraph")}}},[o("img",{attrs:{src:"images/ic_graph.svg",alt:"",width:"16",height:"16"}})]),t._v(" "),o("button",{class:t.showOwnerShipGraph?"":"active",on:{click:function(a){return t.showTable("showOwnerShipGraph")}}},[o("img",{attrs:{src:"images/ic_table.svg",alt:"",width:"16",height:"16"}})])]),t._v(" "),t.showOwnerShipGraph?o("div",[o("BarChart",{attrs:{data:t.ownershipData}})],1):o("div",[o("Table",{attrs:{data:t.ownershipData}})],1)])]),t._v(" "),o("div",{staticClass:"charts"},[o("h3",[t._v("छानाकाे प्रकार")]),t._v(" "),o("div",{staticClass:"card chart"},[o("div",{staticClass:"view-icons"},[o("button",{class:t.showRoofingGraph?"active":"",on:{click:function(a){return t.showGraph("showRoofingGraph")}}},[o("img",{attrs:{src:"images/ic_graph.svg",alt:"",width:"16",height:"16"}})]),t._v(" "),o("button",{class:t.showRoofingGraph?"":"active",on:{click:function(a){return t.showTable("showRoofingGraph")}}},[o("img",{attrs:{src:"images/ic_table.svg",alt:"",width:"16",height:"16"}})])]),t._v(" "),t.showRoofingGraph?o("div",[o("BarChart",{attrs:{data:t.roofingData}})],1):o("div",[o("Table",{attrs:{data:t.roofingData}})],1)])]),t._v(" "),o("div",{staticClass:"charts"},[o("h3",[t._v("घरकाेे जग")]),t._v(" "),o("div",{staticClass:"card chart"},[o("div",{staticClass:"view-icons"},[o("button",{class:t.showFoundationGraph?"active":"",on:{click:function(a){return t.showGraph("showFoundationGraph")}}},[o("img",{attrs:{src:"images/ic_graph.svg",alt:"",width:"16",height:"16"}})]),t._v(" "),o("button",{class:t.showFoundationGraph?"":"active",on:{click:function(a){return t.showTable("showFoundationGraph")}}},[o("img",{attrs:{src:"images/ic_table.svg",alt:"",width:"16",height:"16"}})])]),t._v(" "),t.showFoundationGraph?o("div",[o("BarChart",{attrs:{data:t.foundationData}})],1):o("div",[o("Table",{attrs:{data:t.foundationData}})],1)])]),t._v(" "),o("div",{staticClass:"charts"},[o("h3",[t._v("घरको number")]),t._v(" "),o("div",{staticClass:"card chart"},[o("div",{staticClass:"view-icons"},[o("button",{class:t.showHouseNumberGraph?"active":"",on:{click:function(a){return t.showGraph("showHouseNumberGraph")}}},[o("img",{attrs:{src:"images/ic_graph.svg",alt:"",width:"16",height:"16"}})]),t._v(" "),o("button",{class:t.showHouseNumberGraph?"":"active",on:{click:function(a){return t.showTable("showHouseNumberGraph")}}},[o("img",{attrs:{src:"images/ic_table.svg",alt:"",width:"16",height:"16"}})])]),t._v(" "),t.showHouseNumberGraph?o("div",[o("DonutChart",{attrs:{data:t.houseNumberData}})],1):o("div",[o("Table",{attrs:{data:t.houseNumberData}})],1)])]),t._v(" "),o("div",{staticClass:"charts"},[o("h3",[t._v("घरसम्म पुुग्ने बाटाेकाे प्रकार")]),t._v(" "),o("div",{staticClass:"card chart"},[o("div",{staticClass:"view-icons"},[o("button",{class:t.showRoadtoHouseGraph?"active":"",on:{click:function(a){return t.showGraph("showRoadtoHouseGraph")}}},[o("img",{class:t.showRoadtoHouseGraph?"":"active",attrs:{src:"images/ic_graph.svg",alt:"",width:"16"}})]),t._v(" "),o("button",{staticClass:"table-view",on:{click:function(a){return t.showTable("showRoadtoHouseGraph")}}},[o("img",{attrs:{src:"images/ic_table.svg",alt:"",width:"16",height:"16"}})])]),t._v(" "),t.showRoadtoHouseGraph?o("div",[o("BarChart",{attrs:{data:t.roadToHouseData}})],1):o("div",[o("Table",{attrs:{data:t.roadToHouseData}})],1)])]),t._v(" "),o("div",{staticClass:"charts"},[o("h3",[t._v("घरसम्म पुग्ने बाटाे")]),t._v(" "),o("div",{staticClass:"card chart"},[o("div",{staticClass:"view-icons"},[o("button",{class:t.showRoadTypeGraph?"active":"",on:{click:function(a){return t.showGraph("showRoadTypeGraph")}}},[o("img",{attrs:{src:"images/ic_graph.svg",alt:"",width:"16",height:"16"}})]),t._v(" "),o("button",{class:t.showRoadTypeGraph?"":"active",on:{click:function(a){return t.showTable("showRoadTypeGraph")}}},[o("img",{attrs:{src:"images/ic_table.svg",alt:"",width:"16",height:"16"}})])]),t._v(" "),t.showRoadTypeGraph?o("div",[o("BarChart",{attrs:{data:t.roadTypeData}})],1):o("div",[o("Table",{attrs:{data:t.roadTypeData}})],1)])])])}),[],!1,null,"756a75f1",null).exports}}]);
//# sourceMappingURL=258.js.map