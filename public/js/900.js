(self.webpackChunk=self.webpackChunk||[]).push([[900],{7900:(t,e,n)=>{"use strict";n.r(e),n.d(e,{default:()=>r});var i=n(3909);const a={name:"Individual",components:{PopulationDistribution:function(){return n.e(382).then(n.bind(n,9382))},EducationStatus:function(){return n.e(343).then(n.bind(n,8343))},EmploymentStatus:function(){return n.e(897).then(n.bind(n,8897))},ServiceUsageStatus:function(){return n.e(705).then(n.bind(n,3705))},GovernmentId:function(){return n.e(174).then(n.bind(n,2174))},Manpower:function(){return n.e(580).then(n.bind(n,8580))},TitleBar:function(){return n.e(406).then(n.bind(n,2406))},Stats:function(){return n.e(527).then(n.bind(n,7527))},Tabs:i.Tabs,Tab:i.Tab},data:function(){return{selectedTab:"जनसंख्याकाे वितरण"}},methods:{individualTabChange:function(t){this.selectedTab=t.tab.name,this.$store.commit("changeLoader",!0),window.scrollTo(0,0)}}};const r=(0,n(1900).Z)(a,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"house-wrapper"},[n("TitleBar",{attrs:{title:"जनसांख्यिकीय विवरण"}}),t._v(" "),n("div",{staticClass:"main-content",attrs:{id:"main"}},[n("Stats",{attrs:{url:"individual/summary-stats"}}),t._v(" "),n("div",{staticClass:"tabs"},[n("tabs",{attrs:{options:{useUrlFragment:!1},"cache-lifetime":"0"},on:{changed:t.individualTabChange}},[n("tab",{attrs:{name:"जनसंख्याकाे वितरण"}},["जनसंख्याकाे वितरण"===t.selectedTab?n("population-distribution"):t._e()],1),t._v(" "),n("tab",{attrs:{name:"शैक्षिक स्थिति"}},["शैक्षिक स्थिति"===t.selectedTab?n("education-status"):t._e()],1),t._v(" "),n("tab",{attrs:{name:"राेजगारीकाे अवस्था"}},["राेजगारीकाे अवस्था"===t.selectedTab?n("employment-status"):t._e()],1),t._v(" "),n("tab",{attrs:{name:"सेवा तथा सुविधाहरुकाे प्रयाेगकाे अवस्था"}},["सेवा तथा सुविधाहरुकाे प्रयाेगकाे अवस्था"===t.selectedTab?n("service-usage-status"):t._e()],1),t._v(" "),n("tab",{attrs:{name:"नागरिकतासहितका परिचयपत्र"}},["नागरिकतासहितका परिचयपत्र"===t.selectedTab?n("government-id"):t._e()],1),t._v(" "),n("tab",{attrs:{name:"व्यवसायिक तालिम प्राप्त जनशक्ति"}},["व्यवसायिक तालिम प्राप्त जनशक्ति"===t.selectedTab?n("manpower"):t._e()],1)],1)],1)],1)],1)}),[],!1,null,"5d3077bb",null).exports},3909:function(t){var e;"undefined"!=typeof self&&self,e=function(){return function(t){var e={};function n(i){if(e[i])return e[i].exports;var a=e[i]={i,l:!1,exports:{}};return t[i].call(a.exports,a,a.exports,n),a.l=!0,a.exports}return n.m=t,n.c=e,n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:i})},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=7)}([function(t,e,n){t.exports=!n(6)((function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a}))},function(t,e){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},function(t,e){t.exports=function(t,e,n,i,a){var r,o=t=t||{},s=typeof t.default;"object"!==s&&"function"!==s||(r=t,o=t.default);var u,c="function"==typeof o?o.options:o;if(e&&(c.render=e.render,c.staticRenderFns=e.staticRenderFns),i&&(c._scopeId=i),a?(u=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),n&&n.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(a)},c._ssrRegister=u):n&&(u=n),u){var f=c.functional,l=f?c.render:c.beforeCreate;f?c.render=function(t,e){return u.call(e),l(t,e)}:c.beforeCreate=l?[].concat(l,u):[u]}return{esModule:r,exports:o,options:c}}},function(t,e){var n=t.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=n)},function(t,e){var n=t.exports={version:"2.5.7"};"number"==typeof __e&&(__e=n)},function(t,e,n){var i=n(23),a=n(24),r=n(26),o=Object.defineProperty;e.f=n(0)?Object.defineProperty:function(t,e,n){if(i(t),e=r(e,!0),i(n),a)try{return o(t,e,n)}catch(t){}if("get"in n||"set"in n)throw TypeError("Accessors not supported!");return"value"in n&&(t[e]=n.value),t}},function(t,e){t.exports=function(t){try{return!!t()}catch(t){return!0}}},function(t,e,n){var i,a,r;a=[e,n(8),n(11)],void 0===(r="function"==typeof(i=function(t,e,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.Tabs=t.Tab=void 0;var i=r(e),a=r(n);function r(t){return t&&t.__esModule?t:{default:t}}t.default={install:function(t){t.component("tab",i.default),t.component("tabs",a.default)}},t.Tab=i.default,t.Tabs=a.default})?i.apply(e,a):i)||(t.exports=r)},function(t,e,n){var i=n(2)(n(9),n(10),null,null,null);t.exports=i.exports},function(t,e,n){var i,a,r;a=[e],void 0===(r="function"==typeof(i=function(t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:{id:{default:null},name:{required:!0},prefix:{default:""},suffix:{default:""},isDisabled:{default:!1}},data:function(){return{isActive:!1,isVisible:!0}},computed:{header:function(){return this.prefix+this.name+this.suffix},computedId:function(){return this.id?this.id:this.name.toLowerCase().replace(/ /g,"-")},hash:function(){return this.isDisabled?"#":"#"+this.computedId}}}})?i.apply(e,a):i)||(t.exports=r)},function(t,e){t.exports={render:function(){var t=this,e=t.$createElement;return(t._self._c||e)("section",{directives:[{name:"show",rawName:"v-show",value:t.isActive,expression:"isActive"}],staticClass:"tabs-component-panel",attrs:{"aria-hidden":!t.isActive,id:t.computedId,role:"tabpanel"}},[t._t("default")],2)},staticRenderFns:[]}},function(t,e,n){var i=n(2)(n(12),n(29),null,null,null);t.exports=i.exports},function(t,e,n){var i,a,r;a=[e,n(13)],void 0===(r="function"==typeof(i=function(t,e){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=i(e);function i(t){return t&&t.__esModule?t:{default:t}}t.default={props:{cacheLifetime:{default:5},options:{type:Object,required:!1,default:function(){return{useUrlFragment:!0,defaultTabHash:null}}}},data:function(){return{tabs:[],activeTabHash:"",activeTabIndex:0,lastActiveTabHash:""}},computed:{storageKey:function(){return"vue-tabs-component.cache."+window.location.host+window.location.pathname}},created:function(){this.tabs=this.$children},mounted:function(){var t=this;if(window.addEventListener("hashchange",(function(){return t.selectTab(window.location.hash)})),this.findTab(window.location.hash))this.selectTab(window.location.hash);else{var e=n.default.get(this.storageKey);this.findTab(e)?this.selectTab(e):null!==this.options.defaultTabHash&&this.findTab("#"+this.options.defaultTabHash)?this.selectTab("#"+this.options.defaultTabHash):this.tabs.length&&this.selectTab(this.tabs[0].hash)}},methods:{findTab:function(t){return this.tabs.find((function(e){return e.hash===t}))},selectTab:function(t,e){e&&!this.options.useUrlFragment&&e.preventDefault();var i=this.findTab(t);i&&(i.isDisabled?e.preventDefault():this.lastActiveTabHash!==i.hash?(this.tabs.forEach((function(t){t.isActive=t.hash===i.hash})),this.$emit("changed",{tab:i}),this.activeTabHash=i.hash,this.activeTabIndex=this.getTabIndex(t),this.lastActiveTabHash=this.activeTabHash=i.hash,n.default.set(this.storageKey,i.hash,this.cacheLifetime)):this.$emit("clicked",{tab:i}))},setTabVisible:function(t,e){var n=this.findTab(t);n&&(n.isVisible=e,n.isActive&&(n.isActive=e,this.tabs.every((function(t,e,n){return!t.isVisible||(t.isActive=!0,!1)}))))},getTabIndex:function(t){var e=this.findTab(t);return this.tabs.indexOf(e)},getTabHash:function(t){var e=this,n=this.tabs.find((function(n){return e.tabs.indexOf(n)===t}));if(n)return n.hash},getActiveTab:function(){return this.findTab(this.activeTabHash)},getActiveTabIndex:function(){return this.getTabIndex(this.activeTabHash)}}}})?i.apply(e,a):i)||(t.exports=r)},function(t,e,n){var i,a,r;a=[e,n(14),n(15)],void 0===(r="function"==typeof(i=function(t,e,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=r(e),a=r(n);function r(t){return t&&t.__esModule?t:{default:t}}var o=function(){function t(){(0,i.default)(this,t)}return(0,a.default)(t,[{key:"get",value:function(t){var e=JSON.parse(localStorage.getItem(t));return e?new Date(e.expires)<new Date?(localStorage.removeItem(t),null):e.value:null}},{key:"set",value:function(t,e,n){var i=(new Date).getTime(),a=new Date(i+6e4*n);localStorage.setItem(t,JSON.stringify({value:e,expires:a}))}}]),t}();t.default=new o})?i.apply(e,a):i)||(t.exports=r)},function(t,e,n){"use strict";e.__esModule=!0,e.default=function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}},function(t,e,n){"use strict";e.__esModule=!0;var i,a=n(16),r=(i=a)&&i.__esModule?i:{default:i};e.default=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),(0,r.default)(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}()},function(t,e,n){t.exports={default:n(17),__esModule:!0}},function(t,e,n){n(18);var i=n(4).Object;t.exports=function(t,e,n){return i.defineProperty(t,e,n)}},function(t,e,n){var i=n(19);i(i.S+i.F*!n(0),"Object",{defineProperty:n(5).f})},function(t,e,n){var i=n(3),a=n(4),r=n(20),o=n(22),s=n(28),u=function(t,e,n){var c,f,l,d=t&u.F,h=t&u.G,p=t&u.S,b=t&u.P,v=t&u.B,m=t&u.W,_=h?a:a[e]||(a[e]={}),T=_.prototype,y=h?i:p?i[e]:(i[e]||{}).prototype;for(c in h&&(n=e),n)(f=!d&&y&&void 0!==y[c])&&s(_,c)||(l=f?y[c]:n[c],_[c]=h&&"function"!=typeof y[c]?n[c]:v&&f?r(l,i):m&&y[c]==l?function(t){var e=function(e,n,i){if(this instanceof t){switch(arguments.length){case 0:return new t;case 1:return new t(e);case 2:return new t(e,n)}return new t(e,n,i)}return t.apply(this,arguments)};return e.prototype=t.prototype,e}(l):b&&"function"==typeof l?r(Function.call,l):l,b&&((_.virtual||(_.virtual={}))[c]=l,t&u.R&&T&&!T[c]&&o(T,c,l)))};u.F=1,u.G=2,u.S=4,u.P=8,u.B=16,u.W=32,u.U=64,u.R=128,t.exports=u},function(t,e,n){var i=n(21);t.exports=function(t,e,n){if(i(t),void 0===e)return t;switch(n){case 1:return function(n){return t.call(e,n)};case 2:return function(n,i){return t.call(e,n,i)};case 3:return function(n,i,a){return t.call(e,n,i,a)}}return function(){return t.apply(e,arguments)}}},function(t,e){t.exports=function(t){if("function"!=typeof t)throw TypeError(t+" is not a function!");return t}},function(t,e,n){var i=n(5),a=n(27);t.exports=n(0)?function(t,e,n){return i.f(t,e,a(1,n))}:function(t,e,n){return t[e]=n,t}},function(t,e,n){var i=n(1);t.exports=function(t){if(!i(t))throw TypeError(t+" is not an object!");return t}},function(t,e,n){t.exports=!n(0)&&!n(6)((function(){return 7!=Object.defineProperty(n(25)("div"),"a",{get:function(){return 7}}).a}))},function(t,e,n){var i=n(1),a=n(3).document,r=i(a)&&i(a.createElement);t.exports=function(t){return r?a.createElement(t):{}}},function(t,e,n){var i=n(1);t.exports=function(t,e){if(!i(t))return t;var n,a;if(e&&"function"==typeof(n=t.toString)&&!i(a=n.call(t)))return a;if("function"==typeof(n=t.valueOf)&&!i(a=n.call(t)))return a;if(!e&&"function"==typeof(n=t.toString)&&!i(a=n.call(t)))return a;throw TypeError("Can't convert object to primitive value")}},function(t,e){t.exports=function(t,e){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:e}}},function(t,e){var n={}.hasOwnProperty;t.exports=function(t,e){return n.call(t,e)}},function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"tabs-component"},[n("ul",{staticClass:"tabs-component-tabs",attrs:{role:"tablist"}},t._l(t.tabs,(function(e,i){return n("li",{directives:[{name:"show",rawName:"v-show",value:e.isVisible,expression:"tab.isVisible"}],key:i,staticClass:"tabs-component-tab",class:{"is-active":e.isActive,"is-disabled":e.isDisabled},attrs:{role:"presentation"}},[n("a",{staticClass:"tabs-component-tab-a",attrs:{"aria-controls":e.hash,"aria-selected":e.isActive,href:e.hash,role:"tab"},domProps:{innerHTML:t._s(e.header)},on:{click:function(n){t.selectTab(e.hash,n)}}})])}))),t._v(" "),n("div",{staticClass:"tabs-component-panels"},[t._t("default")],2)])},staticRenderFns:[]}}])},t.exports=e()}}]);
//# sourceMappingURL=900.js.map