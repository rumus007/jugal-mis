(self.webpackChunk=self.webpackChunk||[]).push([[76],{8791:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>s});var n=a(4015),d=a.n(n),l=a(3645),r=a.n(l)()(d());r.push([t.id,"table[data-v-3255addd],td[data-v-3255addd],th[data-v-3255addd]{border:1px solid #000;border-collapse:collapse}td[data-v-3255addd],th[data-v-3255addd]{padding:15px;text-align:left}","",{version:3,sources:["webpack://./resources/js/src/views/components/Table/Table.vue"],names:[],mappings:"AA4BA,+DAGA,qBAAA,CACA,wBACA,CACA,wCAEA,YAAA,CACA,eACA",sourcesContent:['<template>\n  <div>\n    <table style="width: 100%">\n      <tr>\n        <th>SN</th>\n        <th>Year</th>\n        <th>Total</th>\n      </tr>\n      <tr v-for="(tableData, index) in data" :key="tableData.index">\n        <td>{{ index + 1 }}</td>\n        <td>{{ tableData.category }}</td>\n        <td>{{ tableData.total }}</td>\n      </tr>\n    </table>\n  </div>\n</template>\n\n<script>\nexport default {\n  name: "Table",\n  props: {\n    data: { type: Array, required: true },\n  },\n};\n<\/script>\n\n\x3c!-- Add "scoped" attribute to limit CSS to this component only --\x3e\n<style scoped>\ntable,\nth,\ntd {\n  border: 1px solid black;\n  border-collapse: collapse;\n}\nth,\ntd {\n  padding: 15px;\n  text-align: left;\n}\n</style>\n'],sourceRoot:""}]);const s=r},5076:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>d});const n={name:"Table",props:{data:{type:Array,required:!0}}};a(271);const d=(0,a(1900).Z)(n,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("table",{staticStyle:{width:"100%"}},[t._m(0),t._v(" "),t._l(t.data,(function(e,n){return a("tr",{key:e.index},[a("td",[t._v(t._s(n+1))]),t._v(" "),a("td",[t._v(t._s(e.category))]),t._v(" "),a("td",[t._v(t._s(e.total))])])}))],2)])}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("tr",[a("th",[t._v("SN")]),t._v(" "),a("th",[t._v("Year")]),t._v(" "),a("th",[t._v("Total")])])}],!1,null,"3255addd",null).exports},271:(t,e,a)=>{var n=a(8791);n.__esModule&&(n=n.default),"string"==typeof n&&(n=[[t.id,n,""]]),n.locals&&(t.exports=n.locals);(0,a(5346).Z)("1efb6b56",n,!0,{})}}]);
//# sourceMappingURL=76.js.map