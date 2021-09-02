(self.webpackChunk=self.webpackChunk||[]).push([[527],{853:(t,e,r)=>{"use strict";function n(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function o(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?n(Object(r),!0).forEach((function(e){a(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):n(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function a(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}function s(){return(s=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var r=arguments[e];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(t[n]=r[n])}return t}).apply(this,arguments)}r.d(e,{v7:()=>i,Y1:()=>u});var i=function(t){for(var e in t)""!==t[e]&&null!==t[e]&&void 0!==t[e]||delete t[e];return t},u=function(t){var e=s({},t),r={};return Object.keys(e).map((function(t){e[t].length>0&&(r=o(o({},r),{},a({},t,"".concat(e[t].join(","))))),"number"==typeof e[t]&&(r=o(o({},r),{},a({},t,"".concat(e[t]))))})),r}},8715:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>i});var n=r(4015),o=r.n(n),a=r(3645),s=r.n(a)()(o());s.push([t.id,"","",{version:3,sources:[],names:[],mappings:"",sourceRoot:""}]);const i=s},8375:(t,e,r)=>{"use strict";r.d(e,{yL:()=>o});var n=function(){function t(t){this.outputLocale="en",this.numberString="",this.supportedLocale=["en","ne"],this.supportedNumberType=["en-IN","en-US"],this.digitMapping=["०","१","२","३","४","५","६","७","८","९"],t&&this.setNumber(t)}return t.prototype.setOutputLocale=function(t){if(!this.supportedLocale.includes(t))throw new TypeError("Currently 'ne' and 'en' only supported as a `locale` parameter.");return this.outputLocale=t,this},t.prototype.setNumber=function(t){return this.numberString=""+t,this},t.prototype.toNepali=function(t){var e=this;return(t=t||this.numberString)?t.toString().split("").map((function(t){return isNaN(parseInt(t))?t:e.digitMapping[t]||t})).join(""):""},t.prototype.toEnglish=function(t){var e=this;return(t=t||this.numberString)?t.toString().split("").map((function(t){var r=e.digitMapping.findIndex((function(e){return e===t}));return-1===r?t:""+r})).join(""):""},t.prototype.formatNumber=function(t){if(!this.supportedNumberType.includes(t))throw new TypeError("Currently 'en-US' and 'en-IN' only supported as a `type` parameter.");var e=parseFloat(this.toEnglish());if(isNaN(e))return this.numberString;var r=new Intl.NumberFormat(t).format(e);return"en"===this.outputLocale?this.toEnglish(r):this.toNepali(r)},t.prototype.formatAmount=function(t,e){if(void 0===e&&(e=2),!this.supportedNumberType.includes(t))throw new TypeError("Currently 'en-US' and 'en-IN' only supported as a `type` parameter.");var r=parseFloat(this.toEnglish());if(isNaN(r))return this.numberString;var n=new Intl.NumberFormat(t,{maximumFractionDigits:e,minimumFractionDigits:e}).format(r);return"en"===this.outputLocale?this.toEnglish(n):this.toNepali(n)},t}(),o=function(t){return(new n).setNumber(t).toNepali()}},7527:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>p});var n=r(853),o=r(8375);function a(t){return(a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function s(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var r=t&&("undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"]);if(null==r)return;var n,o,a=[],s=!0,i=!1;try{for(r=r.call(t);!(s=(n=r.next()).done)&&(a.push(n.value),!e||a.length!==e);s=!0);}catch(t){i=!0,o=t}finally{try{s||null==r.return||r.return()}finally{if(i)throw o}}return a}(t,e)||function(t,e){if(!t)return;if("string"==typeof t)return i(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return i(t,e)}(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function i(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}const u={name:"Stats",components:{Loader:function(){return r.e(936).then(r.bind(r,2936))}},props:{url:{type:String,rquired:!0}},data:function(){return{statData:{},statLoader:!1}},methods:{getFromApi:function(){var t=this;this.statLoader=!0;var e={ward:this.ward};e=(0,n.v7)(e);var r=(0,n.Y1)(e);axios.get(this.url,{params:r}).then((function(e){for(var r=e.data,n={},o=0,i=Object.entries(r.data);o<i.length;o++){var u=s(i[o],2),p=u[0],l=u[1];"object"!==a(l)?n[p]=t.getFormattedCount(l):n[p]=l}t.statData=n,t.statLoader=!1})).catch((function(){t.statLoader=!1}))},getFormattedCount:function(t){return(0,o.yL)(t)}},mounted:function(){this.getFromApi()},computed:{ward:function(){return this.$store.getters.ward}},watch:{ward:{handler:function(){this.getFromApi()},deep:!0}}};r(4586);const p=(0,r(1900).Z)(u,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"stats-section"},[t.statLoader?r("div",{staticClass:"loader-wrapper"},[r("loader")],1):r("div",{staticClass:"flex justify-space-between"},[r("div",{staticClass:"stats stats-population"},[r("strong",{domProps:{textContent:t._s(t.statData.voter_population?t.statData.voter_population:"-")}}),t._v(" "),r("span",[t._v("कुल मतदाता योग्य जनसंख्या")])]),t._v(" "),r("div",{staticClass:"flex stats-maximum"},[r("div",{staticClass:"stats stats-employment"},[r("strong",{domProps:{textContent:t._s(t.statData.employment_total?t.statData.employment_total:"-")}}),t._v(" "),r("span",[t._v("अधिकतम जनसंख्या समावेश क्षेत्र")])]),t._v(" "),r("div",{staticClass:"stats stats-female"},[r("strong",{domProps:{textContent:t._s(t.statData.employment_gender&&t.statData.employment_gender.female?t.statData.employment_gender.female:"-")}}),t._v(" "),r("span",[t._v("अधिकतम महिला समावेश क्षेत्र ")])]),t._v(" "),r("div",{staticClass:"stats stats-male"},[r("strong",{domProps:{textContent:t._s(t.statData.employment_gender&&t.statData.employment_gender.male?t.statData.employment_gender.male:"-")}}),t._v(" "),r("span",[t._v("अधिकतम पुरुष समावेश क्षेत्र ")])])])])])}),[],!1,null,"7da11672",null).exports},4586:(t,e,r)=>{var n=r(8715);n.__esModule&&(n=n.default),"string"==typeof n&&(n=[[t.id,n,""]]),n.locals&&(t.exports=n.locals);(0,r(5346).Z)("6cffc17f",n,!0,{})}}]);
//# sourceMappingURL=527.js.map