(self.webpackChunk=self.webpackChunk||[]).push([[113],{9113:(t,a,r)=>{"use strict";r.r(a),r.d(a,{default:()=>o});const e={name:"Ghar",components:{BarChart:function(){return r.e(926).then(r.bind(r,2926))},LineChart:function(){return r.e(924).then(r.bind(r,6924))},PieChart:function(){return r.e(839).then(r.bind(r,1839))},Table:function(){return r.e(76).then(r.bind(r,5076))}},props:{msg:String},data:function(){return{showBarChartGraph:!0,showLineChartGraph:!0,showPieChartGraph:!0,barChartoptions:{chart:{id:"vuechart-example"},xaxis:{categories:[1991,1992,1993,1994,1995,1996]}},barChartSeries:[{name:"bar-chart",data:[30,40,45,50,49,60]}],tableBarChartData:[{category:1991,total:30},{category:1992,total:40},{category:1993,total:45},{category:1994,total:50},{category:1995,total:49},{category:1996,total:60}],lineChartOptions:{xaxis:{categories:[1991,1992,1993,1994,1995,1996,1997,1998]}},lineChartSeries:[{name:"line-chart",data:[30,40,45,50,49,60,70,91]}],tableLineChartData:[{category:1991,total:30},{category:1992,total:40},{category:1993,total:45},{category:1994,total:50},{category:1995,total:49},{category:1996,total:60}],pieChartSeries:[44,55,41,17,15],pieChartOptions:{chart:{type:"donut"}},tablePieChartData:[{category:1991,total:30},{category:1992,total:40},{category:1993,total:45},{category:1994,total:50},{category:1995,total:49},{category:1996,total:60}]}},methods:{updateData:function(){this.barChartoptions={chart:{id:"vuechart-example"},xaxis:{categories:[1992,1993,1994,1995,1996,1997,1998,1999]}}},showTable:function(t){this[t]=!1},showGraph:function(t){this[t]=!0}}};const o=(0,r(1900).Z)(e,(function(){var t=this,a=t.$createElement,r=t._self._c||a;return r("div",[r("div",[r("button",{on:{click:function(a){return t.showTable("showBarChartGraph")}}},[t._v("Show table")]),t._v(" "),r("button",{on:{click:function(a){return t.showGraph("showBarChartGraph")}}},[t._v("Show graph")]),t._v(" "),t.showBarChartGraph?r("div",[r("BarChart",{attrs:{series:t.barChartSeries,options:t.barChartoptions}})],1):r("div",[r("Table",{attrs:{data:t.tableBarChartData}})],1)]),t._v(" "),r("div",[r("button",{on:{click:function(a){return t.showTable("showLineChartGraph")}}},[t._v("Show table")]),t._v(" "),r("button",{on:{click:function(a){return t.showGraph("showLineChartGraph")}}},[t._v("Show graph")]),t._v(" "),t.showLineChartGraph?r("div",[r("LineChart",{attrs:{series:t.lineChartSeries,options:t.lineChartOptions}})],1):r("div",[r("Table",{attrs:{data:t.tableLineChartData}})],1)]),t._v(" "),r("div",[r("button",{on:{click:function(a){return t.showTable("showPieChartGraph")}}},[t._v("Show table")]),t._v(" "),r("button",{on:{click:function(a){return t.showGraph("showPieChartGraph")}}},[t._v("Show graph")]),t._v(" "),t.showPieChartGraph?r("div",[r("PieChart",{attrs:{series:t.pieChartSeries,options:t.pieChartOptions}})],1):r("div",[r("Table",{attrs:{data:t.tablePieChartData}})],1)]),t._v(" "),r("button",{on:{click:t.updateData}},[t._v("Update Data")])])}),[],!1,null,"118454e8",null).exports}}]);
//# sourceMappingURL=113.js.map