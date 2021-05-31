(self.webpackChunk=self.webpackChunk||[]).push([[387],{2387:(t,a,r)=>{"use strict";r.r(a),r.d(a,{default:()=>s});var e=r(3909);function n(t,a){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var e=Object.getOwnPropertySymbols(t);a&&(e=e.filter((function(a){return Object.getOwnPropertyDescriptor(t,a).enumerable}))),r.push.apply(r,e)}return r}function o(t){for(var a=1;a<arguments.length;a++){var r=null!=arguments[a]?arguments[a]:{};a%2?n(Object(r),!0).forEach((function(a){i(t,a,r[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):n(Object(r)).forEach((function(a){Object.defineProperty(t,a,Object.getOwnPropertyDescriptor(r,a))}))}return t}function i(t,a,r){return a in t?Object.defineProperty(t,a,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[a]=r,t}const h={name:"HouseItems",components:{BarChart:function(){return r.e(466).then(r.bind(r,9466))},LineChart:function(){return r.e(700).then(r.bind(r,2700))},PieChart:function(){return r.e(417).then(r.bind(r,6417))},Table:function(){return r.e(830).then(r.bind(r,4830))},TitleBar:function(){return r.e(853).then(r.bind(r,8853))},Tabs:e.Tabs,Tab:e.Tab},props:{msg:String},data:function(){return{showBarChartGraph:!0,showLineChartGraph:!0,showPieChartGraph:!0,houseHoldOwnershipData:[],barChartoptions:{chart:{id:"vuechart-example"},xaxis:{categories:[1991,1992,1993,1994,1995,1996]}},barChartSeries:[{category:"निजी/आफ्नै",total:50},{category:"आफ्न्त",total:30},{category:"भाडामा",total:70},{category:"संस्थागत",total:100},{category:"अन्य",total:1200}],tableBarChartData:[{category:"निजी/आफ्नै",total:50},{category:"आफ्न्त",total:30},{category:"भाडामा",total:70},{category:"संस्थागत",total:100},{category:"अन्य",total:1200}],lineChartOptions:{xaxis:{categories:[1991,1992,1993,1994,1995,1996,1997,1998]}},lineChartSeries:[{name:"line-chart",data:[30,40,45,50,49,60,70,91]}],tableLineChartData:[{category:1991,total:30},{category:1992,total:40},{category:1993,total:45},{category:1994,total:50},{category:1995,total:49},{category:1996,total:60}],pieChartSeries:[44,55,41,17,15],pieChartOptions:{chart:{type:"donut"}},tablePieChartData:[{category:1991,total:30},{category:1992,total:40},{category:1993,total:45},{category:1994,total:50},{category:1995,total:49},{category:1996,total:60}]}},methods:{updateData:function(){this.barChartoptions={chart:{id:"vuechart-example"},xaxis:{categories:[1992,1993,1994,1995,1996,1997,1998,1999]}}},showTable:function(t){this[t]=!1},showGraph:function(t){this[t]=!0},getHouseStatusData:function(){var t=this,a=Object.assign({},this.filter);a=filterObject(a);var r={};Object.keys(a).map((function(t){a[t].length>0&&(r=o(o({},r),{},i({},t,"".concat(a[t].join(",")))))})),axios.get("household/ownership",{params:r}).then((function(a){var r=a.data;t.houseHoldOwnershipData=r.data}))}}};const s=(0,r(1900).Z)(h,(function(){var t=this,a=t.$createElement,r=t._self._c||a;return r("div",{staticClass:"chart-wrapper flex"},[r("div",{staticClass:"chart-wrapper flex"},[r("div",{staticClass:"charts"},[r("h3",[t._v("परिवारका लागि खानेपानीकाे स्राेत")]),t._v(" "),r("div",{staticClass:"card chart"},[r("button",{on:{click:function(a){return t.showTable("showLineChartGraph")}}},[t._v("\n          Show table\n        ")]),t._v(" "),r("button",{on:{click:function(a){return t.showGraph("showLineChartGraph")}}},[t._v("\n          Show graph\n        ")]),t._v(" "),t.showLineChartGraph?r("div",[r("LineChart",{attrs:{series:t.lineChartSeries,options:t.lineChartOptions}})],1):r("div",[r("Table",{attrs:{data:t.tableLineChartData}})],1)])]),t._v(" "),r("div",{staticClass:"charts"},[r("h3",[t._v("खाना पकाउने मुख्य इन्धन")]),t._v(" "),r("div",{staticClass:"card chart"},[r("button",{on:{click:function(a){return t.showTable("showBarChartGraph")}}},[t._v("\n          Show table\n        ")]),t._v(" "),r("button",{on:{click:function(a){return t.showGraph("showBarChartGraph")}}},[t._v("\n          Show graph\n        ")]),t._v(" "),t.showBarChartGraph?r("div",[r("BarChart",{attrs:{data:t.barChartSeries}})],1):r("div",[r("Table",{attrs:{data:t.barChartSeries}})],1)])]),t._v(" "),r("div",{staticClass:"charts"},[r("h3",[t._v("विद्युतकाे प्रमुख इन्धन")]),t._v(" "),r("div",{staticClass:"card chart"},[r("button",{on:{click:function(a){return t.showTable("showLineChartGraph")}}},[t._v("\n          Show table\n        ")]),t._v(" "),r("button",{on:{click:function(a){return t.showGraph("showLineChartGraph")}}},[t._v("\n          Show graph\n        ")]),t._v(" "),t.showLineChartGraph?r("div",[r("LineChart",{attrs:{series:t.lineChartSeries,options:t.lineChartOptions}})],1):r("div",[r("Table",{attrs:{data:t.tableLineChartData}})],1)])]),t._v(" "),r("div",{staticClass:"charts"},[r("h3",[t._v("बैकल्पिक इन्धनकाे प्रयाेग")]),t._v(" "),r("div",{staticClass:"card chart"},[r("button",{on:{click:function(a){return t.showTable("showBarChartGraph")}}},[t._v("\n          Show table\n        ")]),t._v(" "),r("button",{on:{click:function(a){return t.showGraph("showBarChartGraph")}}},[t._v("\n          Show graph\n        ")]),t._v(" "),t.showBarChartGraph?r("div",[r("BarChart",{attrs:{data:t.barChartSeries}})],1):r("div",[r("Table",{attrs:{data:t.barChartSeries}})],1)])]),t._v(" "),r("div",{staticClass:"charts"},[r("h3",[t._v("आधारभुत स्वास्थ्य सेवाका लागि जाँदा लाग्ने समय")]),t._v(" "),r("div",{staticClass:"card chart"},[r("button",{on:{click:function(a){return t.showTable("showLineChartGraph")}}},[t._v("\n          Show table\n        ")]),t._v(" "),r("button",{on:{click:function(a){return t.showGraph("showLineChartGraph")}}},[t._v("\n          Show graph\n        ")]),t._v(" "),t.showLineChartGraph?r("div",[r("LineChart",{attrs:{series:t.lineChartSeries,options:t.lineChartOptions}})],1):r("div",[r("Table",{attrs:{data:t.tableLineChartData}})],1)])])])])}),[],!1,null,"d719683a",null).exports}}]);
//# sourceMappingURL=387.js.map