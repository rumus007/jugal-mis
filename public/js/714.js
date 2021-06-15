(self.webpackChunk=self.webpackChunk||[]).push([[714],{7714:(t,e,n)=>{"use strict";n.r(e),n.d(e,{default:()=>a});var i=n(3909);const r={name:"Family",components:{FamilyDetails:function(){return n.e(907).then(n.bind(n,1907))},FamilyAgriculture:function(){return n.e(462).then(n.bind(n,7462))},FamilyLivestock:function(){return n.e(707).then(n.bind(n,9707))},TitleBar:function(){return n.e(573).then(n.bind(n,9573))},Stats:function(){return n.e(358).then(n.bind(n,6358))},Tabs:i.Tabs,Tab:i.Tab},data:function(){return{selectedTab:"परिवारकाे संयाेजन"}},methods:{familyTabChange:function(t){this.selectedTab=t.tab.name,this.$store.commit("changeLoader",!0),window.scrollTo(0,0)}}};const a=(0,n(1900).Z)(r,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"house-wrapper"},[n("TitleBar",{attrs:{title:"पारिवारिक विवरण"}}),t._v(" "),n("div",{staticClass:"main-content",attrs:{id:"main"}},[n("Stats",{attrs:{url:"family/summary-stats"}}),t._v(" "),n("div",{staticClass:"tabs"},[n("tabs",{attrs:{options:{useUrlFragment:!1},"cache-lifetime":"0"},on:{changed:t.familyTabChange}},[n("tab",{attrs:{name:"परिवारकाे संयाेजन"}},["परिवारकाे संयाेजन"===t.selectedTab?n("family-details"):t._e()],1),t._v(" "),n("tab",{attrs:{name:"कृषि"}},["कृषि"===t.selectedTab?n("family-agriculture"):t._e()],1),t._v(" "),n("tab",{attrs:{name:"पशुपालन"}},["पशुपालन"===t.selectedTab?n("family-livestock"):t._e()],1)],1)],1)],1)],1)}),[],!1,null,"567f9098",null).exports},3909:function(t){var e;"undefined"!=typeof self&&self,e=function(){return function(t){var e={};function n(i){if(e[i])return e[i].exports;var r=e[i]={i,l:!1,exports:{}};return t[i].call(r.exports,r,r.exports,n),r.l=!0,r.exports}return n.m=t,n.c=e,n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:i})},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=7)}([function(t,e,n){t.exports=!n(6)((function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a}))},function(t,e){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},function(t,e){t.exports=function(t,e,n,i,r){var a,o=t=t||{},s=typeof t.default;"object"!==s&&"function"!==s||(a=t,o=t.default);var u,c="function"==typeof o?o.options:o;if(e&&(c.render=e.render,c.staticRenderFns=e.staticRenderFns),i&&(c._scopeId=i),r?(u=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),n&&n.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(r)},c._ssrRegister=u):n&&(u=n),u){var f=c.functional,l=f?c.render:c.beforeCreate;f?c.render=function(t,e){return u.call(e),l(t,e)}:c.beforeCreate=l?[].concat(l,u):[u]}return{esModule:a,exports:o,options:c}}},function(t,e){var n=t.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=n)},function(t,e){var n=t.exports={version:"2.5.7"};"number"==typeof __e&&(__e=n)},function(t,e,n){var i=n(23),r=n(24),a=n(26),o=Object.defineProperty;e.f=n(0)?Object.defineProperty:function(t,e,n){if(i(t),e=a(e,!0),i(n),r)try{return o(t,e,n)}catch(t){}if("get"in n||"set"in n)throw TypeError("Accessors not supported!");return"value"in n&&(t[e]=n.value),t}},function(t,e){t.exports=function(t){try{return!!t()}catch(t){return!0}}},function(t,e,n){var i,r,a;r=[e,n(8),n(11)],void 0===(a="function"==typeof(i=function(t,e,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.Tabs=t.Tab=void 0;var i=a(e),r=a(n);function a(t){return t&&t.__esModule?t:{default:t}}t.default={install:function(t){t.component("tab",i.default),t.component("tabs",r.default)}},t.Tab=i.default,t.Tabs=r.default})?i.apply(e,r):i)||(t.exports=a)},function(t,e,n){var i=n(2)(n(9),n(10),null,null,null);t.exports=i.exports},function(t,e,n){var i,r,a;r=[e],void 0===(a="function"==typeof(i=function(t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:{id:{default:null},name:{required:!0},prefix:{default:""},suffix:{default:""},isDisabled:{default:!1}},data:function(){return{isActive:!1,isVisible:!0}},computed:{header:function(){return this.prefix+this.name+this.suffix},computedId:function(){return this.id?this.id:this.name.toLowerCase().replace(/ /g,"-")},hash:function(){return this.isDisabled?"#":"#"+this.computedId}}}})?i.apply(e,r):i)||(t.exports=a)},function(t,e){t.exports={render:function(){var t=this,e=t.$createElement;return(t._self._c||e)("section",{directives:[{name:"show",rawName:"v-show",value:t.isActive,expression:"isActive"}],staticClass:"tabs-component-panel",attrs:{"aria-hidden":!t.isActive,id:t.computedId,role:"tabpanel"}},[t._t("default")],2)},staticRenderFns:[]}},function(t,e,n){var i=n(2)(n(12),n(29),null,null,null);t.exports=i.exports},function(t,e,n){var i,r,a;r=[e,n(13)],void 0===(a="function"==typeof(i=function(t,e){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=i(e);function i(t){return t&&t.__esModule?t:{default:t}}t.default={props:{cacheLifetime:{default:5},options:{type:Object,required:!1,default:function(){return{useUrlFragment:!0,defaultTabHash:null}}}},data:function(){return{tabs:[],activeTabHash:"",activeTabIndex:0,lastActiveTabHash:""}},computed:{storageKey:function(){return"vue-tabs-component.cache."+window.location.host+window.location.pathname}},created:function(){this.tabs=this.$children},mounted:function(){var t=this;if(window.addEventListener("hashchange",(function(){return t.selectTab(window.location.hash)})),this.findTab(window.location.hash))this.selectTab(window.location.hash);else{var e=n.default.get(this.storageKey);this.findTab(e)?this.selectTab(e):null!==this.options.defaultTabHash&&this.findTab("#"+this.options.defaultTabHash)?this.selectTab("#"+this.options.defaultTabHash):this.tabs.length&&this.selectTab(this.tabs[0].hash)}},methods:{findTab:function(t){return this.tabs.find((function(e){return e.hash===t}))},selectTab:function(t,e){e&&!this.options.useUrlFragment&&e.preventDefault();var i=this.findTab(t);i&&(i.isDisabled?e.preventDefault():this.lastActiveTabHash!==i.hash?(this.tabs.forEach((function(t){t.isActive=t.hash===i.hash})),this.$emit("changed",{tab:i}),this.activeTabHash=i.hash,this.activeTabIndex=this.getTabIndex(t),this.lastActiveTabHash=this.activeTabHash=i.hash,n.default.set(this.storageKey,i.hash,this.cacheLifetime)):this.$emit("clicked",{tab:i}))},setTabVisible:function(t,e){var n=this.findTab(t);n&&(n.isVisible=e,n.isActive&&(n.isActive=e,this.tabs.every((function(t,e,n){return!t.isVisible||(t.isActive=!0,!1)}))))},getTabIndex:function(t){var e=this.findTab(t);return this.tabs.indexOf(e)},getTabHash:function(t){var e=this,n=this.tabs.find((function(n){return e.tabs.indexOf(n)===t}));if(n)return n.hash},getActiveTab:function(){return this.findTab(this.activeTabHash)},getActiveTabIndex:function(){return this.getTabIndex(this.activeTabHash)}}}})?i.apply(e,r):i)||(t.exports=a)},function(t,e,n){var i,r,a;r=[e,n(14),n(15)],void 0===(a="function"==typeof(i=function(t,e,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=a(e),r=a(n);function a(t){return t&&t.__esModule?t:{default:t}}var o=function(){function t(){(0,i.default)(this,t)}return(0,r.default)(t,[{key:"get",value:function(t){var e=JSON.parse(localStorage.getItem(t));return e?new Date(e.expires)<new Date?(localStorage.removeItem(t),null):e.value:null}},{key:"set",value:function(t,e,n){var i=(new Date).getTime(),r=new Date(i+6e4*n);localStorage.setItem(t,JSON.stringify({value:e,expires:r}))}}]),t}();t.default=new o})?i.apply(e,r):i)||(t.exports=a)},function(t,e,n){"use strict";e.__esModule=!0,e.default=function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}},function(t,e,n){"use strict";e.__esModule=!0;var i,r=n(16),a=(i=r)&&i.__esModule?i:{default:i};e.default=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),(0,a.default)(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}()},function(t,e,n){t.exports={default:n(17),__esModule:!0}},function(t,e,n){n(18);var i=n(4).Object;t.exports=function(t,e,n){return i.defineProperty(t,e,n)}},function(t,e,n){var i=n(19);i(i.S+i.F*!n(0),"Object",{defineProperty:n(5).f})},function(t,e,n){var i=n(3),r=n(4),a=n(20),o=n(22),s=n(28),u=function(t,e,n){var c,f,l,d=t&u.F,h=t&u.G,p=t&u.S,b=t&u.P,v=t&u.B,m=t&u.W,y=h?r:r[e]||(r[e]={}),_=y.prototype,T=h?i:p?i[e]:(i[e]||{}).prototype;for(c in h&&(n=e),n)(f=!d&&T&&void 0!==T[c])&&s(y,c)||(l=f?T[c]:n[c],y[c]=h&&"function"!=typeof T[c]?n[c]:v&&f?a(l,i):m&&T[c]==l?function(t){var e=function(e,n,i){if(this instanceof t){switch(arguments.length){case 0:return new t;case 1:return new t(e);case 2:return new t(e,n)}return new t(e,n,i)}return t.apply(this,arguments)};return e.prototype=t.prototype,e}(l):b&&"function"==typeof l?a(Function.call,l):l,b&&((y.virtual||(y.virtual={}))[c]=l,t&u.R&&_&&!_[c]&&o(_,c,l)))};u.F=1,u.G=2,u.S=4,u.P=8,u.B=16,u.W=32,u.U=64,u.R=128,t.exports=u},function(t,e,n){var i=n(21);t.exports=function(t,e,n){if(i(t),void 0===e)return t;switch(n){case 1:return function(n){return t.call(e,n)};case 2:return function(n,i){return t.call(e,n,i)};case 3:return function(n,i,r){return t.call(e,n,i,r)}}return function(){return t.apply(e,arguments)}}},function(t,e){t.exports=function(t){if("function"!=typeof t)throw TypeError(t+" is not a function!");return t}},function(t,e,n){var i=n(5),r=n(27);t.exports=n(0)?function(t,e,n){return i.f(t,e,r(1,n))}:function(t,e,n){return t[e]=n,t}},function(t,e,n){var i=n(1);t.exports=function(t){if(!i(t))throw TypeError(t+" is not an object!");return t}},function(t,e,n){t.exports=!n(0)&&!n(6)((function(){return 7!=Object.defineProperty(n(25)("div"),"a",{get:function(){return 7}}).a}))},function(t,e,n){var i=n(1),r=n(3).document,a=i(r)&&i(r.createElement);t.exports=function(t){return a?r.createElement(t):{}}},function(t,e,n){var i=n(1);t.exports=function(t,e){if(!i(t))return t;var n,r;if(e&&"function"==typeof(n=t.toString)&&!i(r=n.call(t)))return r;if("function"==typeof(n=t.valueOf)&&!i(r=n.call(t)))return r;if(!e&&"function"==typeof(n=t.toString)&&!i(r=n.call(t)))return r;throw TypeError("Can't convert object to primitive value")}},function(t,e){t.exports=function(t,e){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:e}}},function(t,e){var n={}.hasOwnProperty;t.exports=function(t,e){return n.call(t,e)}},function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"tabs-component"},[n("ul",{staticClass:"tabs-component-tabs",attrs:{role:"tablist"}},t._l(t.tabs,(function(e,i){return n("li",{directives:[{name:"show",rawName:"v-show",value:e.isVisible,expression:"tab.isVisible"}],key:i,staticClass:"tabs-component-tab",class:{"is-active":e.isActive,"is-disabled":e.isDisabled},attrs:{role:"presentation"}},[n("a",{staticClass:"tabs-component-tab-a",attrs:{"aria-controls":e.hash,"aria-selected":e.isActive,href:e.hash,role:"tab"},domProps:{innerHTML:t._s(e.header)},on:{click:function(n){t.selectTab(e.hash,n)}}})])}))),t._v(" "),n("div",{staticClass:"tabs-component-panels"},[t._t("default")],2)])},staticRenderFns:[]}}])},t.exports=e()}}]);
//# sourceMappingURL=714.js.map