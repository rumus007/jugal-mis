<template>
  <div class="institution">
    <div class="section__map--inner">
      <div class="map-sidebar">
        <span>व्यवसायिक संस्था</span>
        <ul class="map-filter">
          <!-- <label><input type="checkbox" v-model="showAllMarkers" />सबै</label> -->
          <li>
            <input type="checkbox" v-model="showKiranaPasalMarkers" />किराना पसल
          </li>
          <li><input type="checkbox" v-model="showSahakariMarkers" />सहकारी</li>
        </ul>
      </div>
    </div>
    <Map :mapData="mapData"></Map>
  </div>
</template>

<script>
export default {
  name: "Institution",
  components:{
        Map: () => import("../components/Map/Map.vue"),
    },
  props: {
    msg: String,
  },
  data: function () {
    return {
      showKiranaPasalMarkers: false,
      showSahakariMarkers: false,
      mapData: [
        {
          GPS: "27.98712552356428,  85.77560628632924",
          commercialinst: "किराना पसल",
          type: "Kirana pasal",
          deviceid: "358449071073586",
          end: "2020-02-19T17:20:11.150+05:45",
          enu_name: "Nanimaya_K",
          formhub: "b546e89447914b09b42f2426355b07a4",
          instype: "व्यवसायिक संस्था",
          meta: "uuid:0bc993d7-6fa4-4496-b961-92651a7e8948",
          name: "Computer languages ",
          photo: "1582112100098.jpg",
          shopitem: "other",
          shopreg: "yes",
          start: "2020-02-19T17:17:37.706+05:45",
          __version__: "v5TTbty2cVkZ5wKFQAEtFj",
          _bamboo_dataset_id: "",
          geolocation: [27.98712552356428,  85.77560628632924],
          _id: 41128,
          _notes: [],
          _status: "submitted_via_web",
          _submission_time: "2020-02-19T13:22:08",
          _submitted_by: null,
          _tags: [],
          _uuid: "0bc993d7-6fa4-4496-b961-92651a7e8948",
          _validation_status: {},
          _version_: "vnuyWwWYyxCMmnvS6mkYxL",
          _version__001: "vp7HYiKssosYj3Ec7pFuEY",
          _xform_id_string: "a4CuktLBPsxhNHcTPaFNkG",
        },
        {
          GPS: "28.057438520876673,  85.83327406192468",
          commercialinst: "सहकारी",
          type: "Sahakari",
          deviceid: "358449071073586",
          end: "2020-02-19T17:22:17.864+05:45",
          enu_name: "Nanimaya_K",
          uuid: "b546e89447914b09b42f2426355b07a4",
          instype: "व्यवसायिक संस्था",
          meta: "uuid:f6320508-079a-4e0d-8caa-b28f90aff2de",
          name: "Diamond  pharnichar",
          photo: "1582112209971.jpg",
          shopitem: "clothes",
          shopreg: "yes",
          start: "2020-02-19T17:20:14.852+05:45",
          __version__: "v5TTbty2cVkZ5wKFQAEtFj",
          _bamboo_dataset_id: "",
          geolocation: [28.057438520876673,  85.83327406192468],
          _id: 41129,
          _notes: [],
          _status: "submitted_via_web",
          _submission_time: "2020-02-19T13:22:17",
          _submitted_by: null,
          _tags: [],
          _uuid: "f6320508-079a-4e0d-8caa-b28f90aff2de",
          _validation_status: {},
          _version_: "vnuyWwWYyxCMmnvS6mkYxL",
          _version__001: "vp7HYiKssosYj3Ec7pFuEY",
          _xform_id_string: "a4CuktLBPsxhNHcTPaFNkG",
        },
      ],
    };
  },
  // watcher needs to be used as depending upon this we need to send filtered data to map component
  watch: {
    // showKiranaPasalMarkers: {
    //   handler() {
    //     this.showKiranaPasalMarkers = !this.showKiranaPasalMarkers;
    //   },
    // },
    // showSahakariMarkers: {
    //   handler() {
    //     this.showSahakariMarkers = !this.showSahakariMarkers;
    //   },
    // },

    showSahakariMarkers: {
      handler(showSahakariMarker) {
        if(this.showSahakariMarkers === true)
        {
          this.mapData = [{
            GPS: "28.057438520876673,  85.83327406192468",
            commercialinst: "सहकारी",
            type: "Sahakari",
            deviceid: "358449071073586",
            end: "2020-02-19T17:22:17.864+05:45",
            enu_name: "Nanimaya_K",
            uuid: "b546e89447914b09b42f2426355b07a4",
            instype: "व्यवसायिक संस्था",
            meta: "uuid:f6320508-079a-4e0d-8caa-b28f90aff2de",
            name: "Diamond  pharnichar",
            photo: "1582112209971.jpg",
            shopitem: "clothes",
            shopreg: "yes",
            start: "2020-02-19T17:20:14.852+05:45",
            __version__: "v5TTbty2cVkZ5wKFQAEtFj",
            _bamboo_dataset_id: "",
            geolocation: [28.057438520876673,  85.83327406192468],
            _id: 41129,
            _notes: [],
            _status: "submitted_via_web",
            _submission_time: "2020-02-19T13:22:17",
            _submitted_by: null,
            _tags: [],
            _uuid: "f6320508-079a-4e0d-8caa-b28f90aff2de",
            _validation_status: {},
            _version_: "vnuyWwWYyxCMmnvS6mkYxL",
            _version__001: "vp7HYiKssosYj3Ec7pFuEY",
            _xform_id_string: "a4CuktLBPsxhNHcTPaFNkG",
          }];

        } 
      },
    },
    showKiranaPasalMarkers: {
      
      handler(showKiranaPasalMarker) {
        if(showKiranaPasalMarker === true) {
          this.mapData = [{
            GPS: "27.98712552356428,  85.77560628632924",
            commercialinst: "किराना पसल",
            type: "Kirana pasal",
            deviceid: "358449071073586",
            end: "2020-02-19T17:20:11.150+05:45",
            enu_name: "Nanimaya_K",
            formhub: "b546e89447914b09b42f2426355b07a4",
            instype: "व्यवसायिक संस्था",
            meta: "uuid:0bc993d7-6fa4-4496-b961-92651a7e8948",
            name: "Computer languages ",
            photo: "1582112100098.jpg",
            shopitem: "other",
            shopreg: "yes",
            start: "2020-02-19T17:17:37.706+05:45",
            __version__: "v5TTbty2cVkZ5wKFQAEtFj",
            _bamboo_dataset_id: "",
            geolocation: [27.98712552356428,  85.77560628632924],
            _id: 41128,
            _notes: [],
            _status: "submitted_via_web",
            _submission_time: "2020-02-19T13:22:08",
            _submitted_by: null,
            _tags: [],
            _uuid: "0bc993d7-6fa4-4496-b961-92651a7e8948",
            _validation_status: {},
            _version_: "vnuyWwWYyxCMmnvS6mkYxL",
            _version__001: "vp7HYiKssosYj3Ec7pFuEY",
            _xform_id_string: "a4CuktLBPsxhNHcTPaFNkG",
          }]
        }
      },
    },
    // mapData: {
    //   handler(showKiranaPasalMarkers,showSahakariMarkers){
    //     console.log('-------marker changedddd-----',this.mapData)
    //   }
    // }
  },
  methods: {
    updateData: function () {
      this.barChartoptions = {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
        },
      };
    },
    originalData: function () {
      return [
        {
          GPS: "27.98712552356428,  85.77560628632924",
          commercialinst: "किराना पसल",
          type: "Kirana pasal",
          deviceid: "358449071073586",
          end: "2020-02-19T17:20:11.150+05:45",
          enu_name: "Nanimaya_K",
          formhub: "b546e89447914b09b42f2426355b07a4",
          instype: "व्यवसायिक संस्था",
          meta: "uuid:0bc993d7-6fa4-4496-b961-92651a7e8948",
          name: "Computer languages ",
          photo: "1582112100098.jpg",
          shopitem: "other",
          shopreg: "yes",
          start: "2020-02-19T17:17:37.706+05:45",
          __version__: "v5TTbty2cVkZ5wKFQAEtFj",
          _bamboo_dataset_id: "",
          geolocation: [27.98712552356428,  85.77560628632924],
          _id: 41128,
          _notes: [],
          _status: "submitted_via_web",
          _submission_time: "2020-02-19T13:22:08",
          _submitted_by: null,
          _tags: [],
          _uuid: "0bc993d7-6fa4-4496-b961-92651a7e8948",
          _validation_status: {},
          _version_: "vnuyWwWYyxCMmnvS6mkYxL",
          _version__001: "vp7HYiKssosYj3Ec7pFuEY",
          _xform_id_string: "a4CuktLBPsxhNHcTPaFNkG",
        },
        {
          GPS: "28.057438520876673,  85.83327406192468",
          commercialinst: "सहकारी",
          type: "Sahakari",
          deviceid: "358449071073586",
          end: "2020-02-19T17:22:17.864+05:45",
          enu_name: "Nanimaya_K",
          uuid: "b546e89447914b09b42f2426355b07a4",
          instype: "व्यवसायिक संस्था",
          meta: "uuid:f6320508-079a-4e0d-8caa-b28f90aff2de",
          name: "Diamond  pharnichar",
          photo: "1582112209971.jpg",
          shopitem: "clothes",
          shopreg: "yes",
          start: "2020-02-19T17:20:14.852+05:45",
          __version__: "v5TTbty2cVkZ5wKFQAEtFj",
          _bamboo_dataset_id: "",
          geolocation: [28.057438520876673,  85.83327406192468],
          _id: 41129,
          _notes: [],
          _status: "submitted_via_web",
          _submission_time: "2020-02-19T13:22:17",
          _submitted_by: null,
          _tags: [],
          _uuid: "f6320508-079a-4e0d-8caa-b28f90aff2de",
          _validation_status: {},
          _version_: "vnuyWwWYyxCMmnvS6mkYxL",
          _version__001: "vp7HYiKssosYj3Ec7pFuEY",
          _xform_id_string: "a4CuktLBPsxhNHcTPaFNkG",
        },
      ]
    }
  },
};
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->

<style scoped>
.institution {
  display: flex;
}
section__map--inner {
  display: flex;
  flex-direction: column;
}
</style>
