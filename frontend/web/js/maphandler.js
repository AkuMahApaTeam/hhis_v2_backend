/**
 * Created by Irfan on 8/18/16.
 */

function MapHandler(map) {
    this.map = map;
    this.marker = new google.maps.Marker({
        map:this.map
    });
    this.alamat = null;
}

MapHandler.prototype = {

    addMarker: function (point) {
        this.marker.setPosition(point);
    },

    setLat: function (selector, val) {
        $(selector).val(val.lat);
    },

    setLng: function (selec, val) {
        $(selec).val(val.lng);
    },

    getAddress: function (selector, point) {

        var latlng = point;

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'latLng': latlng}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    alert("Location: " + results[0].formatted_address);
                    $(selector).val(results[0].formatted_address);
                }
            }
        });

        //return res;

    },
    setInfoWindows: function (content) {
        var ini = this;
        //console.log("haha");

    },



};
