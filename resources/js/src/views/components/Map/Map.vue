<template>
  <div id="container" class="map-wrapper">
    <div class="map-wrapper__search-input-wrapper map-search">
      <i class="ri-search-line map-search__icon"></i>
      <input
        type="text"
        class="map-search__input"
        placeholder="ठाउँको नामले खोजी गर्नुहोस्..."
      />
    </div>
    <div id="mapContainer"></div>
  </div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";
import markerIcon from "../../../../../assets/marker.svg";
import bankMarker from "../../../../../assets/bank_financial_marker.svg";
import bridgeMarker from "../../../../../assets/bridge_culvert.svg";
import buildingMarker from "../../../../../assets/building_marker.svg";
import businessMarker from "../../../../../assets/business_marker.svg";
import culturalMarker from "../../../../../assets/cultural_heritage_marker.svg";
import educationMarker from "../../../../../assets/education_institute_marker.svg";
import healthMarker from "../../../../../assets/health_institute_marker.svg";
import hotelMarker from "../../../../../assets/hotel_resort_homestay_marker.svg";
import industryMarker from "../../../../../assets/industry_hydro_marker.svg";
import landMarker from "../../../../../assets/land_use_marker.svg";
import naturalResourcesMarker from "../../../../../assets/natural_resources_marker.svg";
import ngoMarker from "../../../../../assets/ngo_club_marker.svg";
import agencyMarker from "../../../../../assets/security_agency_marker.svg";
import localLevel from "../../../../../assets/data/NewNepalLocalLevel.json";

export default {
  name: "Map",
  props: {
    mapData: { type: Array, required: true },
  },
  data() {
    return {
      map: null, // leaflet map
      layers: [],
      layerGroup: null,
      center: [27.83732885694356, 85.77425191534314],
    };
  },
  methods: {
    setupLeafletMap: function () {
      this.map = L.map("mapContainer", { minZoom: 10 }).setView(
        [27.83732885694356, 85.77425191534314],
        10
      );
      L.tileLayer(
        "https://{s}.basemaps.cartocdn.com/rastertiles/voyager_labels_under/{z}/{x}/{y}.png",
        {
          attribution:
            '&copy <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        }
      ).addTo(this.map);

      let jsonLayer = L.geoJSON(localLevel).addTo(this.map);
      this.map.fitBounds(jsonLayer.getBounds());
      this.addMarker();
    },
    addMarker: function () {
      this.layerGroup = L.layerGroup().addTo(this.map);
      const myIcon = L.icon({
        iconUrl: markerIcon,
        iconAnchor: [11, 41],
        popupAnchor: [0, -41],
      });

      this.mapData.map((data) =>
        L.marker(data.leaflet_geolocation, {
          icon: this.getMarkerType(data.resource_type),
        })
          .bindPopup(this.getToolTipContent(data))
          .addTo(this.layerGroup)
      );
    },
    removeMarker: function () {
      this.layerGroup.clearLayers();
      this.addMarker();
    },
    getMarkerType: function (dataType) {
      const categories = {
        cultural_heritage: () => culturalMarker,
        educational_institute: () => educationMarker,
        ngo_club_group: () => ngoMarker,
        hotel_resort_homestay: () => hotelMarker,
        building: () => buildingMarker,
        natural_resource: () => naturalResourcesMarker,
        bank_financial: () => bankMarker,
        health_institute: () => healthMarker,
        industry_hydro: () => industryMarker,
        security_agency: () => agencyMarker,
        land_use: () => landMarker,
        business_trade: () => businessMarker,
        bridge_culvert: () => bridgeMarker,
      };
      if (Object.keys(categories).includes(dataType)) {
        return L.icon({
          iconUrl: categories[dataType](),
          iconAnchor: [11, 41],
          popupAnchor: [0, -41],
        });
      }
      return L.icon({
        iconUrl: markerIcon,
        iconAnchor: [11, 41],
        popupAnchor: [0, -41],
      });
    },
    getToolTipContent: function (data) {
      const categories = {
        cultural_heritage: () => this.displayCulturalHeritage(data),
        educational_institute: () => this.displayEducational(data),
        ngo_club_group: () => this.displayNgoClubGroup(data),
        hotel_resort_homestay: () => this.displayHotelResortHomeStay(data),
        building: () => this.displayBuilding(data),
        natural_resource: () => this.displayNaturalResource(data),
        bank_financial: () => this.displayFinance(data),
        health_institute: () => this.displayHealthInstitute(data),
        industry_hydro: () => this.displayIndustryHydro(data),
        security_agency: () => this.displaySecurityAgency(data),
        land_use: () => this.displayLandUse(data),
        business_trade: () => this.displayBusiness(data),
        bridge_culvert: () => this.displayBridgeCulvert(data),
      };
      if (Object.keys(categories).includes(data.resource_type)) {
        return categories[data.resource_type]();
      }
      return `स्थानिय नाम: <b>${data.local_name}</b> Resource Type: ${data.resource_type}`;
    },
    displayBusiness: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
        <div>
        <p>व्यवसाय सञ्चालनकर्ताको नाम: <b>${
          data?.metadata?.owner_name ?? ""
        }</b></p>
        <p>व्यापार तथा व्यवसायको स्वामित्व: <b>${
          data?.metadata?.ownership ?? ""
        }</b></p>
        <p>व्यवसाय दर्ता नं: <b>${
          data?.metadata?.registration_number ?? ""
        }</b></p>
        <!-- <img src=${data.image} alt="business"/> -->
        </div>
        </div>`;
    },
    displayCulturalHeritage: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
        <div>
        <p>संस्कृतिक सम्पदाको प्रकार: <b>${data?.metadata?.type ?? ""}</b></p>
        <!--<img src=${data.image} alt="cultural_heritage"/> -->
        </div>
        </div>`;
    },
    displayEducational: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
        <div>
         <p>शैक्षिक संस्थाकाे प्रकार: <b>${
           data?.metadata?.type_np ?? ""
         }</b></p>
        <p>शैक्षिक संस्थाकाेे विवरण: <b>${
          data?.metadata?.description ?? ""
        }</b></p>
        <p>स्वीकृत दरबन्दी (महिला): <span>Pre Primary: <b>${
          data?.metadata?.approved_appointment_female?.pre_primary ?? ""
        }</b></span>
         <span>Basic: <b>${
           data?.metadata?.approved_appointment_female?.basic ?? ""
         }</b></span>
         <span>Secondary: <b>${
           data?.metadata?.approved_appointment_female?.secondary ?? ""
         }</b></span>
        </p>
        <p>स्वीकृत दरबन्दी (पुरुष): <span>Pre Primary: <b>${
          data?.metadata?.approved_appointment_male?.pre_primary ?? ""
        }</b></span>
         <span>Basic: <b>${
           data?.metadata?.approved_appointment_male?.basic ?? ""
         }</b></span>
         <span>Secondary: <b>${
           data?.metadata?.approved_appointment_male?.secondary ?? ""
         }</b></span></p>
        <p>कार्यरत शिक्षक (महिला): <span>Pre Primary: <b>${
          data?.metadata?.appointed_teacher_female?.pre_primary ?? ""
        }</b></span>
         <span>Basic: <b>${
           data?.metadata?.appointed_teacher_female?.basic ?? ""
         }</b></span>
         <span>Secondary: <b>${
           data?.metadata?.appointed_teacher_female?.secondary ?? ""
         }</b></span></p>
        <p>कार्यरत शिक्षक (पुरुष):<span>Pre Primary: <b>${
          data?.metadata?.appointed_teacher_male?.pre_primary ?? ""
        }</b></span>
         <span>Basic: <b>${
           data?.metadata?.appointed_teacher_male?.basic ?? ""
         }</b></span>
         <span>Secondary: <b>${
           data?.metadata?.appointed_teacher_male?.secondary ?? ""
         }</b></span></p>
        <p>विधार्थी संख्या (महिला): <span>Pre Primary: <b>${
          data?.metadata?.approved_appointment_female?.pre_primary ?? ""
        }</b></span>
         <span>Basic: <b>${
           data?.metadata?.approved_appointment_female?.basic ?? ""
         }</b></span>
         <span>Secondary: <b>${
           data?.metadata?.approved_appointment_female?.secondary ?? ""
         }</b></span></p>
         <p>  विधार्थी संख्या (पुरुष):<span>Pre Primary: <b>${
           data?.metadata?.approved_appointment_female?.pre_primary ?? ""
         }</b></span>
         <span>Basic: <b>${
           data?.metadata?.approved_appointment_female?.basic ?? ""
         }</b></span>
         <span>Secondary: <b>${
           data?.metadata?.approved_appointment_female?.secondary ?? ""
         }</b></span></p>
       <!-- <img src=${data.photo} alt="educational"/> -->
        </div>
        </div>`;
    },
    displayNgoClubGroup: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
        <div>
        <p>गैसस/क्लब/समूहको प्रकार: <b>${data?.metadata?.type}</b></p>
        <!--<img src=${data.image} alt="club"/> -->
        </div>
        </div>`;
    },
    displayHotelResortHomeStay: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
        <div>
        <p>होटल/रिसोर्टको प्रकार: <b>${data?.metadata?.type ?? ""}</b></p>
        <!--<img src=${data.photo} alt="homestay"/> -->
        </div>
        </div>`;
    },
    displayBuilding: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
        <div>
        <p>ठेगाना: <b>${data?.address}</b></p>
        <p>वडा: <b>${data?.ward ?? ""}</b></p>
        <p>भवनको प्रकार: <b>${data?.metadata?.category_np ?? ""}</b></p>
        <p>भवनको स्तर: <b>${data?.metadata?.type_np ?? ""}</b></p>
        <p>भवनको अवस्था: <b>${data?.metadata?.condition_np ?? ""}</b></p>
        <p>सम्पर्क नं: <b>${data?.contact_number ?? ""}</b></p>
        <p>वेबसाइट: <b>${data?.website ?? ""}</b></p>
        <!--<img src=${data.photo} alt="building"/> -->
        </div>
        </div>`;
    },
    displayNaturalResource: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
      <div>
      <p>प्राकृतिक श्रोतको प्रकार: <b>${data?.metadata?.type ?? ""}</b></p>
      <!--<img src=${data?.photo} alt="natural_resource"/> -->
      </div>
      </div>`;
    },
    displayFinance: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
      <div>
      <p>बैंक तथा वित्तिय संस्थाको प्रकार: <b>${
        data?.metadata?.type ?? ""
      }</b></p>
      <!--<img src=${data?.photo} alt="finance"/> -->
      </div>
      </div>`;
    },
    displayHealthInstitute: function (data) {
      let notHealthService = [
        "doctors_alloted",
        "doctors_appointed",
        "type",
        "type_np",
        "health_workers_alloted",
        "health_workers_appointed",
      ];
      let healthService = Object.keys(data?.metadata).filter(
        (healthMetaData) =>
          !notHealthService.includes(healthMetaData) && data?.metadata[healthMetaData]
      );
      // TODO here health service needed to show.
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
        <div>
        <p>स्वास्थ्य संस्थाकाे प्रकार: <b>${
          data?.metadata?.type_np ?? ""
        }</b></p>
        <p>चिकित्सक संख्या (दरवन्दी): <b>${
          data?.metadata?.doctors_alloted ?? ""
        }</b></p>
        <p>चिकित्सक संख्या (कार्यरत) <b>${
          data?.metadata?.doctors_appointed ?? ""
        }</b></p>
         <p>अन्य स्वास्थ्यकर्मीको संख्या (दरवन्दी) <b>${
           data?.metadata?.health_workers_alloted ?? ""
         }</b></p>
        <p>अन्य स्वास्थ्यकर्मीको संख्या (कार्यरत)<b>${
          data?.metadata?.health_workers_appointed ?? ""
        }</b></p>
        <p>स्वास्थ्य संस्थामा उपलब्ध सेवा तथा सुविधा <b>${
          data?.metadata?.registration_number ?? ""
        }</b></p>
        <!--<img src=${data.image} alt="health"/> -->
        </div>
        </div>`;
    },
    displayIndustryHydro: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
        <div>
         <p>स्वामित्व: <b>${data?.metadata?.ownership_np ?? ""}</b></p>
        <p>उद्योगको प्रकार: <b>${data?.metadata?.industry_type_np ?? ""}</b></p>
        <p>उत्पादन हुने वस्तु: <b>${data?.metadata?.product_np ?? ""}</b></p>
        <p>उत्पादन क्षमता : <b>${
          data?.metadata?.production_status ?? ""
        }</b></p>
        <p>राष्ट्रिय प्रसारण लाईनमा जोडिएको छ/छैन ?: <b>${
          data?.metadata?.line ?? ""
        }</b></p>
        <p>रोजगारी विवरण/महिला संख्या: <b>${
          data?.metadata?.employed_women ?? ""
        }</b></p>
        <p>रोजगारी विवरण/पुरुष संख्या: <b>${
          data?.metadata?.employed_men ?? ""
        }</b></p>
        <!--<img src=${data.photo} alt="building"/> -->
        </div>
        </div>`;
    },
    displaySecurityAgency: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
      <div>
      <p>सुरक्षा निकायको प्रकार: <b>${data?.metadata?.type ?? ""}</b></p>
      <!--<img src=${data?.photo} alt="finance"/> -->
      </div>
      </div>`;
    },
    displayLandUse: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
      <div>
       <p>वडा: <b>${data?.metadata?.type ?? ""}</b></p>
       <p>भु-उपयोगको प्रकार: <b>${data?.metadata?.type ?? ""}</b></p>
       <p>सार्वजनिक क्षेत्रको प्रकार : <b>${
         data?.metadata?.type_of_land_np ?? ""
       }</b></p>
       <p>संवेदनशील क्षेत्र (बाढी, पहिरो, नदी कट्टान, ढुबान, सुख्खा): <b>${
         data?.metadata?.type ?? ""
       }</b></p>
       <!--<img src=${data?.photo} alt="natural_resource"/> -->
      </div></div>`;
    },
    displayBridgeCulvert: function (data) {
      return `<div>स्थानिय नाम: <b>${data.local_name}</b>
      <div>
       <p>पुल/पुलेसाको प्रकार: <b>${data?.metadata?.condition_np ?? ""}</b></p>
       <p>पुल/पुलेसाको अवस्था: <b>${data?.metadata?.type ?? ""}</b></p>
       <!--<img src=${data?.photo} alt="bridge"/> -->
      </div></div>`;
    },
  },
  async mounted() {
    this.setupLeafletMap();
  },
  watch: {
    mapData: {
      handler() {
        this.removeMarker();
      },
      deep: true,
    },
  },
};
</script>

<style scoped lang="scss">
#mapContainer {
  border-left: 1px solid rgba(114, 115, 142, 0.2);
  height: 966px;
  width: calc(100vw - 300px);
  z-index: 0;
}

.map-wrapper {
  position: relative;

  &__search-input-wrapper {
    left: 70px;
    position: absolute;
    top: 10px;
    z-index: 1;
  }
}

.map-search {
  &__icon {
    left: 33px;
    position: absolute;
    top: 19px;
  }

  &__input {
    border: 0;
    border-radius: 40px;
    outline: none;
    padding: 22px 40px 22px 58px;
    width: 420px;
  }
}
</style>
