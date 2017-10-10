/**
 * Created by Irfan on 12/20/16.
 */
function Map(opt){
    var options = {
        id:'map',
        center : [-7.265757, 112.734146],
        zoom : 13,
    };

    var allOptions = $.extend( true, options, opt );
    this.mapInstance = L.map(allOptions.id, {maxZoom: 16}).setView(allOptions.center, allOptions.zoom);
    this.initMap();

}

Map.prototype={

    initMap:function () {
        var google_streets = L.tileLayer('http://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            id: 'google_streets',
            attribution: "-"
        });

        this.mapInstance.addLayer(google_streets);
    },

    drawMarker:function (lat,lng) {
        return L.marker([lat, lng],{}).addTo(this.mapInstance);
    },

    drawPolyline:function (point,color) {
       return L.polyline(point,{
            color: color,
            opacity:0.5
        }).addTo(this.mapInstance);
    },

    drawPolylines:function (polylinePoint,color) {
        var point = (polylinePoint);
        var poly = [];

        for(var i=0; i<point.length;i++){
            poly[i]= L.polyline(point[i],{
                color: color,
                opacity:0.5
            }).addTo(this.mapInstance);
        }

        return poly;
    },

    drawMultiColorsPolylines:function (polylinePoint,color) {
        var point = (polylinePoint);
        var poly = [];

        for(var i=0; i<point.length;i++){
            poly[i] = L.polyline(point[i],{
                color: color[i],
                opacity:0.5
            }).addTo(this.mapInstance);
        }
        return poly;
    },

    drawPolygon:function (point,color) {
        return L.polygon(point,{
            color: color,
            opacity:0.5
        }).addTo(this.mapInstance);
    },
    
    addPopup:function (obj,content,open) {
        typeof open == null ? false : true;

        if(open==true){
            obj.bindPopup(content).openPopup()
        } else {
            obj.bindPopup(content);
        }

    },

    addPolylinesPopup:function () {

    }

};