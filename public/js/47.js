(self.webpackChunk=self.webpackChunk||[]).push([[47],{853:(t,e,n)=>{"use strict";n.d(e,{v7:()=>r});var r=function(t){for(var e in t)""!==t[e]&&null!==t[e]&&void 0!==t[e]||delete t[e];return t}},6551:(t,e,n)=>{"use strict";n.r(e),n.d(e,{default:()=>o});var r=n(4015),a=n.n(r),i=n(3645),s=n.n(i)()(a());s.push([t.id,".institution[data-v-bd49eb00]{display:flex}.map-filter[data-v-bd49eb00]{list-style:none}","",{version:3,sources:["webpack://./resources/js/src/views/institution/Institution.vue"],names:[],mappings:"AAkFA,8BACA,YACA,CACA,6BACA,eACA",sourcesContent:['<template>\n  <div class="institution-wrapper">\n    <TitleBar title="संस्थागत विवरण" />\n    <div class="institution">\n      <FilterByType\n        :resourceFilter="filter.resource_type_id"\n        @change="handleResourceFilter"\n      />\n      <Map :mapData="mapData"></Map>\n    </div>\n  </div>\n</template>\n\n<script>\nimport { filterObject, route } from "../../common/helper.js";\nexport default {\n  name: "Institution",\n  components: {\n    Map: () => import("../components/Map/Map.vue"),\n    FilterByType: () => import("./FilterInstitutionByType.vue"),\n    TitleBar: () => import("../shared/TitleBar"),\n  },\n  data: function () {\n    return {\n      filter: {\n        resource_type_id: [],\n      },\n      mapData: [],\n      resourceTypeList: [],\n    };\n  },\n  // watcher needs to be used as depending upon this we need to send filtered data to map component\n  watch: {\n    filter: {\n      handler() {\n        this.getMapData();\n      },\n      deep: true,\n    },\n    ward: {\n      handler() {\n        this.getMapData();\n      },\n      deep: true,\n    },\n  },\n  methods: {\n    getMapData: function () {\n      const targetUrl = `resource/mapdata`;\n      let wardParams =  { ward: this.ward }\n      let queryParams = Object.assign({}, {...this.filter,...wardParams});\n      queryParams = filterObject(queryParams);\n      let formattedParams = {};\n      Object.keys(queryParams).map((data) => {\n        if (queryParams[data].length > 0) {\n          formattedParams = {\n            ...formattedParams,\n            [data]: `${queryParams[data].join(",")}`,\n          };\n        }\n      });\n\n      this.filter.resource_type_id.length !== 0\n        ? axios.get(targetUrl, { params: formattedParams }).then(({ data }) => {\n            this.mapData = data.data;\n          })\n        : (this.mapData = []);\n    },\n\n    handleResourceFilter: function (selectedFilter) {\n      this.filter.resource_type_id = selectedFilter;\n    },\n  },\n  computed: {\n    ward() {\n      return this.$store.getters.ward;\n    },\n  },\n};\n<\/script>\n\n<style scoped>\n.institution {\n  display: flex;\n}\n.map-filter {\n  list-style: none;\n}\n</style>\n'],sourceRoot:""}]);const o=s},4047:(t,e,n)=>{"use strict";n.r(e),n.d(e,{default:()=>c});var r=n(853);function a(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,r)}return n}function i(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?a(Object(n),!0).forEach((function(e){s(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):a(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function s(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}const o={name:"Institution",components:{Map:function(){return n.e(814).then(n.bind(n,8814))},FilterByType:function(){return n.e(233).then(n.bind(n,3233))},TitleBar:function(){return n.e(853).then(n.bind(n,8853))}},data:function(){return{filter:{resource_type_id:[]},mapData:[],resourceTypeList:[]}},watch:{filter:{handler:function(){this.getMapData()},deep:!0},ward:{handler:function(){this.getMapData()},deep:!0}},methods:{getMapData:function(){var t=this,e={ward:this.ward},n=Object.assign({},i(i({},this.filter),e));n=(0,r.v7)(n);var a={};Object.keys(n).map((function(t){n[t].length>0&&(a=i(i({},a),{},s({},t,"".concat(n[t].join(",")))))})),0!==this.filter.resource_type_id.length?axios.get("resource/mapdata",{params:a}).then((function(e){var n=e.data;t.mapData=n.data})):this.mapData=[]},handleResourceFilter:function(t){this.filter.resource_type_id=t}},computed:{ward:function(){return this.$store.getters.ward}}};n(4976);const c=(0,n(1900).Z)(o,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"institution-wrapper"},[n("TitleBar",{attrs:{title:"संस्थागत विवरण"}}),t._v(" "),n("div",{staticClass:"institution"},[n("FilterByType",{attrs:{resourceFilter:t.filter.resource_type_id},on:{change:t.handleResourceFilter}}),t._v(" "),n("Map",{attrs:{mapData:t.mapData}})],1)],1)}),[],!1,null,"bd49eb00",null).exports},4976:(t,e,n)=>{var r=n(6551);r.__esModule&&(r=r.default),"string"==typeof r&&(r=[[t.id,r,""]]),r.locals&&(t.exports=r.locals);(0,n(5346).Z)("1661ddd4",r,!0,{})}}]);
//# sourceMappingURL=47.js.map