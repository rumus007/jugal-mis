(self.webpackChunk=self.webpackChunk||[]).push([[310],{853:(a,t,i)=>{"use strict";function e(a,t){var i=Object.keys(a);if(Object.getOwnPropertySymbols){var e=Object.getOwnPropertySymbols(a);t&&(e=e.filter((function(t){return Object.getOwnPropertyDescriptor(a,t).enumerable}))),i.push.apply(i,e)}return i}function o(a){for(var t=1;t<arguments.length;t++){var i=null!=arguments[t]?arguments[t]:{};t%2?e(Object(i),!0).forEach((function(t){r(a,t,i[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(a,Object.getOwnPropertyDescriptors(i)):e(Object(i)).forEach((function(t){Object.defineProperty(a,t,Object.getOwnPropertyDescriptor(i,t))}))}return a}function r(a,t,i){return t in a?Object.defineProperty(a,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):a[t]=i,a}function h(){return(h=Object.assign||function(a){for(var t=1;t<arguments.length;t++){var i=arguments[t];for(var e in i)Object.prototype.hasOwnProperty.call(i,e)&&(a[e]=i[e])}return a}).apply(this,arguments)}i.d(t,{v7:()=>s,Y1:()=>n});var s=function(a){for(var t in a)""!==a[t]&&null!==a[t]&&void 0!==a[t]||delete a[t];return a},n=function(a){var t=h({},a),i={};return Object.keys(t).map((function(a){t[a].length>0&&(i=o(o({},i),{},r({},a,"".concat(t[a].join(","))))),"number"==typeof t[a]&&(i=o(o({},i),{},r({},a,"".concat(t[a]))))})),i}},3310:(a,t,i)=>{"use strict";i.r(t),i.d(t,{default:()=>r});var e=i(853);const o={name:"PopulationDistribution",components:{IndividualChart:function(){return i.e(931).then(i.bind(i,7931))}},data:function(){return{showAgeGroupGraph:!0,byAgeGroupData:[],showAgeGroupLoader:!1,showMaritalStatusGraph:!0,byMaritalData:[],showMaritalLoader:!1,showEthnicityGraph:!0,byEthnicityData:[],showEthnicityLoader:!1,showReligionGraph:!0,byReligionData:[],showReligionLoader:!1,showMotherTongueGraph:!0,byMotherTongueData:[],showMotherTongueLoader:!1,showGenderGraph:!0,byGenderData:[],showGenderLoader:!1,showBearChildGraph:!0,byBearChildData:[],showBearChildLoader:!1,showDisabilityGraph:!0,byDisabilityData:[],showDisabilityLoader:!1,showDomicileGraph:!0,byDomicileData:[],showDomicileLoader:!1,showDisabilityIdGraph:!0,byDisabilityIdData:[],showDisabilityIdLoader:!1,showTechHumanSrcGraph:!0,byTechHumanSrcData:[],showTechHumanSrcLoader:!1,showMobileHolderGraph:!0,byMobileHolderData:[],showMobileHolderLoader:!1,showDisabilityTypeGraph:!0,disabilityTypeData:[],showDisabilityTypeLoader:!1,showMobileTelecomGraph:!0,byMobileTelecomData:[],showMobileTelecomLoader:!1}},methods:{showTable:function(a){this[a]=!1},showGraph:function(a){this[a]=!0},getAgeGroupData:function(){var a=this;this.showAgeGroupLoader=!0;var t={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};t=(0,e.v7)(t);var i=(0,e.Y1)(t);axios.get("individual/population-by-age-group",{params:i}).then((function(t){var i,e=t.data;a.byAgeGroupData=null!==(i=null==e?void 0:e.data)&&void 0!==i?i:[],a.showAgeGroupLoader=!1})).catch((function(){a.showAgeGroupLoader=!1}))},getMaritalData:function(){var a=this;this.showMaritalLoader=!0;var t={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};t=(0,e.v7)(t);var i=(0,e.Y1)(t);axios.get("individual/population-by-marital-status",{params:i}).then((function(t){var i,e=t.data;a.byMaritalData=null!==(i=null==e?void 0:e.data)&&void 0!==i?i:[],a.showMaritalLoader=!1})).catch((function(){a.showMaritalLoader=!1}))},getEthnicityData:function(){var a=this;this.showEthnicityLoader=!0;var t={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};t=(0,e.v7)(t);var i=(0,e.Y1)(t);axios.get("individual/population-by-ethnicity",{params:i}).then((function(t){var i,e=t.data;a.byEthnicityData=null!==(i=null==e?void 0:e.data)&&void 0!==i?i:[],a.showEthnicityLoader=!1})).catch((function(){a.showEthnicityLoader=!1}))},getReligionData:function(){var a=this;this.showReligionLoader=!0;var t={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};t=(0,e.v7)(t);var i=(0,e.Y1)(t);axios.get("individual/population-by-religion",{params:i}).then((function(t){var i,e=t.data;a.byReligionData=null!==(i=null==e?void 0:e.data)&&void 0!==i?i:[],a.showReligionLoader=!1})).catch((function(){a.showReligionLoader=!1}))},getMotherTongueData:function(){var a=this;this.showMotherTongueLoader=!0;var t={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};t=(0,e.v7)(t);var i=(0,e.Y1)(t);axios.get("individual/population-by-mother-tongue",{params:i}).then((function(t){var i,e=t.data;a.byMotherTongueData=null!==(i=null==e?void 0:e.data)&&void 0!==i?i:[],a.showMotherTongueLoader=!1})).catch((function(){a.showMotherTongueLoader=!1}))},getGenderData:function(){var a=this;this.showGenderLoader=!0;var t={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};t=(0,e.v7)(t);var i=(0,e.Y1)(t);axios.get("individual/population-by-gender",{params:i}).then((function(t){var i,e=t.data;a.byGenderData=null!==(i=null==e?void 0:e.data)&&void 0!==i?i:[],a.showGenderLoader=!1})).catch((function(){a.showGenderLoader=!1}))},getDomicileData:function(){var a=this;this.showDomicileLoader=!0;var t={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};t=(0,e.v7)(t);var i=(0,e.Y1)(t);axios.get("individual/domicile-status",{params:i}).then((function(t){var i,e=t.data;a.byDomicileData=null!==(i=null==e?void 0:e.data)&&void 0!==i?i:[],a.showDomicileLoader=!1})).catch((function(){a.showDomicileLoader=!1}))},getBearChildData:function(){var a=this;this.showBearChildLoader=!0;var t={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};t=(0,e.v7)(t);var i=(0,e.Y1)(t);axios.get("individual/population-by-gender",{params:i}).then((function(t){var i,e=t.data;a.byBearChildData=null!==(i=null==e?void 0:e.data)&&void 0!==i?i:[],a.showBearChildLoader=!1})).catch((function(){a.showBearChildLoader=!1}))},getDisabilityData:function(){var a=this;this.showDisabilityLoader=!0;var t={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};t=(0,e.v7)(t);var i=(0,e.Y1)(t);axios.get("individual/population-by-disability",{params:i}).then((function(t){var i,e=t.data;a.byDisabilityData=null!==(i=null==e?void 0:e.data)&&void 0!==i?i:[],a.showDisabilityLoader=!1})).catch((function(){a.showDisabilityLoader=!1}))},getFromApi:function(a,t,i){var o=this;this[a]=!0;var r="individual/".concat(i),h={ward:this.ward,minage:this.ageRange.minValue,maxage:this.ageRange.maxValue};h=(0,e.v7)(h);var s=(0,e.Y1)(h);axios.get(r,{params:s}).then((function(i){var e,r=i.data;o[t]=null!==(e=null==r?void 0:r.data)&&void 0!==e?e:[],o[a]=!1})).catch((function(){o[a]=!1}))}},mounted:function(){this.getAgeGroupData(),this.getMaritalData(),this.getEthnicityData(),this.getReligionData(),this.getMotherTongueData(),this.getGenderData(),this.getDomicileData(),this.getDisabilityData(),this.getFromApi("showDisabilityIdLoader","byDisabilityIdData","disability-id"),this.getFromApi("showTechHumanSrcLoader","byTechHumanSrcData","training-type"),this.getFromApi("showMobileHolderLoader","byMobileHolderData","has-mobile"),this.getFromApi("showDisabilityTypeLoader","disabilityTypeData","disability-types"),this.getFromApi("showMobileTelecomLoader","byMobileTelecomData","mobile-telecom")},computed:{ward:function(){return this.$store.getters.ward},ageRange:function(){return this.$store.getters.ageRange}},watch:{ward:{handler:function(){this.getAgeGroupData(),this.getMaritalData(),this.getEthnicityData(),this.getReligionData(),this.getMotherTongueData(),this.getGenderData(),this.getDomicileData(),this.getDisabilityData(),this.getFromApi("showDisabilityIdLoader","byDisabilityIdData","disability-id"),this.getFromApi("showTechHumanSrcLoader","byTechHumanSrcData","training-type"),this.getFromApi("showMobileHolderLoader","byMobileHolderData","has-mobile"),this.getFromApi("showDisabilityTypeLoader","disabilityTypeData","disability-types"),this.getFromApi("showMobileTelecomLoader","byMobileTelecomData","mobile-telecom")},deep:!0},ageRange:{handler:function(){this.getAgeGroupData(),this.getMaritalData(),this.getEthnicityData(),this.getReligionData(),this.getMotherTongueData(),this.getGenderData(),this.getDomicileData(),this.getDisabilityData(),this.getFromApi("showDisabilityIdLoader","byDisabilityIdData","disability-id"),this.getFromApi("showTechHumanSrcLoader","byTechHumanSrcData","training-type"),this.getFromApi("showMobileHolderLoader","byMobileHolderData","has-mobile"),this.getFromApi("showDisabilityTypeLoader","disabilityTypeData","disability-types"),this.getFromApi("showMobileTelecomLoader","byMobileTelecomData","mobile-telecom")},deep:!0}}};const r=(0,i(1900).Z)(o,(function(){var a=this,t=a.$createElement,i=a._self._c||t;return i("div",[i("h2",[a._v("जनसंख्याकाे वितरण")]),a._v(" "),i("div",{staticClass:"chart-wrapper flex"},[i("individual-chart",{attrs:{showLoader:a.showGenderLoader,data:a.byGenderData,title:"लिंगका आधारमा जनसंख्याकाे वितरण",tableTitle:"लिंगका आधारमा जनसंख्याकाे वितरण",showGraphText:"showGenderGraph",showGraph:a.showGenderGraph,chartDetail:{type:"Bar",horizontalBar:!0,yAxisTitle:"लिंगका आधारमा जनसंख्याकाे वितरण",xAxisTitle:"जम्मा"}},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showAgeGroupLoader,data:a.byAgeGroupData,title:"उमेर समूहका आधारमा जनसंख्याकाे वितरण",tableTitle:"उमेर समूहका आधारमा जनसंख्याकाे वितरण",showGraphText:"showAgeGroupGraph",showGraph:a.showAgeGroupGraph,chartDetail:{type:"Bar",horizontalBar:!0,yAxisTitle:"उमेर समूहका आधारमा जनसंख्याकाे वितरण",xAxisTitle:"जम्मा"}},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showEthnicityLoader,data:a.byEthnicityData,title:"जातिका आधारमा जनसंख्याकाे वितरण",tableTitle:"जातिका आधारमा जनसंख्याकाे वितरण",showGraphText:"showEthnicityGraph",showGraph:a.showEthnicityGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"जातिका आधारमा जनसंख्याकाे वितरण",yAxisTitle:"जम्मा"},showFullChartClass:!0,showVerticalChartClass:!0},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showMotherTongueLoader,data:a.byMotherTongueData,title:"मातृभाषाका आधारमा जनसंख्याकाे वितरण",tableTitle:"मातृभाषाका आधारमा जनसंख्याकाे वितरण",showGraphText:"showMotherTongueGraph",showGraph:a.showMotherTongueGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"मातृभाषाका आधारमा जनसंख्याकाे वितरण",yAxisTitle:"जम्मा"},showFullChartClass:!0,showVerticalChartClass:!0},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showReligionLoader,data:a.byReligionData,title:"धर्मका आधारमा जनसंख्याकाे वितरण",tableTitle:"धर्मका आधारमा जनसंख्याकाे वितरण",showGraphText:"showReligionGraph",showGraph:a.showReligionGraph,chartDetail:{type:"Bar",horizontalBar:!0,yAxisTitle:"धर्मका आधारमा जनसंख्याकाे वितरण",xAxisTitle:"जम्मा"}},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showMaritalLoader,data:a.byMaritalData,title:"वैवाहिक अवस्थाका आधारमा जनसंख्याकाे वितरण",tableTitle:"वैवाहिक अवस्थाका आधारमा जनसंख्याकाे वितरण",showGraphText:"showMaritalStatusGraph",showGraph:a.showMaritalStatusGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"वैवाहिक अवस्थाका आधारमा जनसंख्याकाे वितरण",yAxisTitle:"जम्मा"},showVerticalChartClass:!0},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showDisabilityLoader,data:a.byDisabilityData,title:"अपांगताका आधारमा जनसंख्याकाे वितरण",tableTitle:"अपांगताका आधारमा जनसंख्याकाे वितरण",showGraphText:"showDisabilityGraph",showGraph:a.showDisabilityGraph,chartDetail:{type:"Donut"},showDonutChartClass:!0},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showDisabilityTypeLoader,data:a.disabilityTypeData,title:"अपांगताका प्रकारहरु",tableTitle:"अपांगताका प्रकारहरु",showGraphText:"showDisabilityTypeGraph",showGraph:a.showDisabilityTypeGraph,chartDetail:{type:"Bar",horizontalBar:!1,yAxisTitle:"अपांगताका प्रकारहरु",xAxisTitle:"जम्मा"},showVerticalChartClass:!0},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showDisabilityIdLoader,data:a.byDisabilityIdData,title:"अपांगता परिचयपत्रका आधारमा जनसंख्याकाे वितरण",tableTitle:"अपांगता परिचयपत्रका आधारमा जनसंख्याकाे वितरण",showGraphText:"showDisabilityIdGraph",showGraph:a.showDisabilityIdGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"अपांगता परिचयपत्रका आधारमा जनसंख्याकाे वितरण",yAxisTitle:"जम्मा"},showVerticalChartClass:!0},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showDomicileLoader,data:a.byDomicileData,title:"बसाेबासकाे प्रकृति",tableTitle:"बसाेबासकाे प्रकृति",showGraphText:"showDomicileGraph",showGraph:a.showDomicileGraph,chartDetail:{type:"Bar",horizontalBar:!0,yAxisTitle:"बसाेबासकाे प्रकृति",xAxisTitle:"जम्मा"}},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showTechHumanSrcLoader,data:a.byTechHumanSrcData,title:"विशेष प्राविधिक सीपयुक्त मानवश्राेत",tableTitle:"विशेष प्राविधिक सीपयुक्त मानवश्राेत",showGraphText:"showTechHumanSrcGraph",showGraph:a.showTechHumanSrcGraph,chartDetail:{type:"Bar",horizontalBar:!1,xAxisTitle:"विशेष प्राविधिक सीपयुक्त मानवश्राेत",yAxisTitle:"जम्मा"},showFullChartClass:!0,showVerticalChartClass:!0},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showMobileHolderLoader,data:a.byMobileHolderData,title:"माेबाईल फाेन बाेक्ने जनसंख्या",tableTitle:"माेबाईल फाेन बाेक्ने जनसंख्या",showGraphText:"showMobileHolderGraph",showGraph:a.showMobileHolderGraph,chartDetail:{type:"Donut"},showDonutChartClass:!0},on:{graphFunction:a.showGraph,tableFunction:a.showTable}}),a._v(" "),i("individual-chart",{attrs:{showLoader:a.showMobileTelecomLoader,data:a.byMobileTelecomData,title:"माेबाईल फाेन सेवाप्रदायकहरु",tableTitle:"माेबाईल फाेन सेवाप्रदायकहरु",showGraphText:"showMobileTelecomGraph",showGraph:a.showMobileTelecomGraph,chartDetail:{type:"Bar",horizontalBar:!0,yAxisTitle:"माेबाईल फाेन सेवाप्रदायकहरु",xAxisTitle:"जम्मा"}},on:{graphFunction:a.showGraph,tableFunction:a.showTable}})],1)])}),[],!1,null,"d9a2ecee",null).exports}}]);
//# sourceMappingURL=310.js.map