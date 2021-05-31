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
      this.map = L.map("mapContainer").setView(
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
          .bindPopup(`Name:<b>${data.local_name}</b>`)
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