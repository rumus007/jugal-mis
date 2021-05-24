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
// import localLevel from "../../../../assets/data/NewNepalLocalLevel.json";

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

      // L.geoJSON(localLevel).addTo(this.map);

      this.addMarker();
    },
    addMarker: function () {
      console.log("==================add markerrrrrrrr-----", this.mapData);
      // mapRef.eachLayer((layer) => {
      //   console.log(layer)
      //   // layer.remove();
      // });
      // var marker;
      // marker && mapRef.removeLayer(marker)

      this.layerGroup = L.layerGroup().addTo(this.map);
      const myIcon = L.icon({
        iconUrl: markerIcon,
        iconAnchor: [11, 41],
        popupAnchor: [0, -41],
      });

      this.mapData.map((state) =>
        //   marker = L.marker(state.geolocation, { icon: myIcon })
        //     .bindPopup("<b>Hello world!</b><br>I am a popup.")
        //     .addTo(mapRef)
        // );

        // L.marker(state.geolocation, { icon: myIcon })
        //   .bindPopup("<b>Hello world!</b><br>I am a popup.")
        //   .addTo(this.map)
        L.marker(state.geolocation, { icon: myIcon })
          .bindPopup("<b>Hello world!</b><br>I am a popup.")
          .addTo(this.layerGroup)
      );

      // var marker = L.marker([27.83732885694356, 85.77425191534314], {
      //   icon: myIcon,
      // }).addTo(mapRef);
      // marker.bindPopup("<b>Hello world!</b><br>I am a popup.");
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
  width: 80vw;
  height: 500px;
}
</style>