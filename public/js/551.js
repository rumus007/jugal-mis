(self.webpackChunk=self.webpackChunk||[]).push([[551],{4259:(t,e,n)=>{"use strict";n.r(e),n.d(e,{default:()=>s});var r=n(4015),o=n.n(r),a=n(3645),i=n.n(a)()(o());i.push([t.id,".main-footer[data-v-3eb8c754]{position:fixed;left:0;bottom:0;width:100%;background-color:#fff;color:#000;text-align:center}","",{version:3,sources:["webpack://./resources/js/src/views/shared/Footer.vue"],names:[],mappings:"AAqBA,8BACA,cAAA,CACA,MAAA,CACA,QAAA,CACA,UAAA,CACA,qBAAA,CACA,UAAA,CACA,iBACA",sourcesContent:['<template>\n  <footer class="main-footer">\n    <div>\n      <router-link to="/house">\n        <span>Ghardhuri bibaran</span>\n      </router-link>\n      <span>Pariparik bibaran</span>\n      <span>Population bibaran</span>\n      <router-link to="/institution">\n        <span>Sanshtagat bibaran</span>\n      </router-link>\n    </div>\n  </footer>\n</template>\n\n<script>\nexport default {\n  name: "footer",\n};\n<\/script>\n<style scoped>\n.main-footer {\n  position: fixed;\n  left: 0;\n  bottom: 0;\n  width: 100%;\n  background-color: white;\n  color: black;\n  text-align: center;\n}\n</style>'],sourceRoot:""}]);const s=i},3645:t=>{"use strict";t.exports=function(t){var e=[];return e.toString=function(){return this.map((function(e){var n=t(e);return e[2]?"@media ".concat(e[2]," {").concat(n,"}"):n})).join("")},e.i=function(t,n,r){"string"==typeof t&&(t=[[null,t,""]]);var o={};if(r)for(var a=0;a<this.length;a++){var i=this[a][0];null!=i&&(o[i]=!0)}for(var s=0;s<t.length;s++){var u=[].concat(t[s]);r&&o[u[0]]||(n&&(u[2]?u[2]="".concat(n," and ").concat(u[2]):u[2]=n),e.push(u))}},e}},4015:t=>{"use strict";function e(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var n=t&&("undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"]);if(null==n)return;var r,o,a=[],i=!0,s=!1;try{for(n=n.call(t);!(i=(r=n.next()).done)&&(a.push(r.value),!e||a.length!==e);i=!0);}catch(t){s=!0,o=t}finally{try{i||null==n.return||n.return()}finally{if(s)throw o}}return a}(t,e)||function(t,e){if(!t)return;if("string"==typeof t)return n(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return n(t,e)}(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function n(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}t.exports=function(t){var n=e(t,4),r=n[1],o=n[3];if("function"==typeof btoa){var a=btoa(unescape(encodeURIComponent(JSON.stringify(o)))),i="sourceMappingURL=data:application/json;charset=utf-8;base64,".concat(a),s="/*# ".concat(i," */"),u=o.sources.map((function(t){return"/*# sourceURL=".concat(o.sourceRoot||"").concat(t," */")}));return[r].concat(u).concat([s]).join("\n")}return[r].join("\n")}},2551:(t,e,n)=>{"use strict";n.r(e),n.d(e,{default:()=>o});const r={name:"footer"};n(4910);const o=(0,n(1900).Z)(r,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("footer",{staticClass:"main-footer"},[n("div",[n("router-link",{attrs:{to:"/house"}},[n("span",[t._v("Ghardhuri bibaran")])]),t._v(" "),n("span",[t._v("Pariparik bibaran")]),t._v(" "),n("span",[t._v("Population bibaran")]),t._v(" "),n("router-link",{attrs:{to:"/institution"}},[n("span",[t._v("Sanshtagat bibaran")])])],1)])}),[],!1,null,"3eb8c754",null).exports},4910:(t,e,n)=>{var r=n(4259);r.__esModule&&(r=r.default),"string"==typeof r&&(r=[[t.id,r,""]]),r.locals&&(t.exports=r.locals);(0,n(5346).Z)("e753e534",r,!0,{})},5346:(t,e,n)=>{"use strict";function r(t,e){for(var n=[],r={},o=0;o<e.length;o++){var a=e[o],i=a[0],s={id:t+":"+o,css:a[1],media:a[2],sourceMap:a[3]};r[i]?r[i].parts.push(s):n.push(r[i]={id:i,parts:[s]})}return n}n.d(e,{Z:()=>h});var o="undefined"!=typeof document;if("undefined"!=typeof DEBUG&&DEBUG&&!o)throw new Error("vue-style-loader cannot be used in a non-browser environment. Use { target: 'node' } in your Webpack config to indicate a server-rendering environment.");var a={},i=o&&(document.head||document.getElementsByTagName("head")[0]),s=null,u=0,c=!1,l=function(){},f=null,p="data-vue-ssr-id",d="undefined"!=typeof navigator&&/msie [6-9]\b/.test(navigator.userAgent.toLowerCase());function h(t,e,n,o){c=n,f=o||{};var i=r(t,e);return v(i),function(e){for(var n=[],o=0;o<i.length;o++){var s=i[o];(u=a[s.id]).refs--,n.push(u)}e?v(i=r(t,e)):i=[];for(o=0;o<n.length;o++){var u;if(0===(u=n[o]).refs){for(var c=0;c<u.parts.length;c++)u.parts[c]();delete a[u.id]}}}}function v(t){for(var e=0;e<t.length;e++){var n=t[e],r=a[n.id];if(r){r.refs++;for(var o=0;o<r.parts.length;o++)r.parts[o](n.parts[o]);for(;o<n.parts.length;o++)r.parts.push(b(n.parts[o]));r.parts.length>n.parts.length&&(r.parts.length=n.parts.length)}else{var i=[];for(o=0;o<n.parts.length;o++)i.push(b(n.parts[o]));a[n.id]={id:n.id,refs:1,parts:i}}}}function m(){var t=document.createElement("style");return t.type="text/css",i.appendChild(t),t}function b(t){var e,n,r=document.querySelector("style["+p+'~="'+t.id+'"]');if(r){if(c)return l;r.parentNode.removeChild(r)}if(d){var o=u++;r=s||(s=m()),e=y.bind(null,r,o,!1),n=y.bind(null,r,o,!0)}else r=m(),e=C.bind(null,r),n=function(){r.parentNode.removeChild(r)};return e(t),function(r){if(r){if(r.css===t.css&&r.media===t.media&&r.sourceMap===t.sourceMap)return;e(t=r)}else n()}}var A,g=(A=[],function(t,e){return A[t]=e,A.filter(Boolean).join("\n")});function y(t,e,n,r){var o=n?"":r.css;if(t.styleSheet)t.styleSheet.cssText=g(e,o);else{var a=document.createTextNode(o),i=t.childNodes;i[e]&&t.removeChild(i[e]),i.length?t.insertBefore(a,i[e]):t.appendChild(a)}}function C(t,e){var n=e.css,r=e.media,o=e.sourceMap;if(r&&t.setAttribute("media",r),f.ssrId&&t.setAttribute(p,e.id),o&&(n+="\n/*# sourceURL="+o.sources[0]+" */",n+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(o))))+" */"),t.styleSheet)t.styleSheet.cssText=n;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(n))}}}}]);
//# sourceMappingURL=551.js.map