<template>
  <div id="container">
    <div id="mapContainer"></div>
  </div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";
import markerIcon from "../../../../../assets/marker.svg";
// import nepal from "../../../../assets/data/Nepal.json";
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
        L.marker(data.leaflet_geolocation, { icon: myIcon })
          .bindPopup(`Name:<b>${data.local_name}</b>`)
          .addTo(this.layerGroup)
      );
    },
    removeMarker: function () {
      this.layerGroup.clearLayers();
      this.addMarker();
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

<style scoped>
#mapContainer {
  height: 500px;
  width: 80vw;
}
</style>