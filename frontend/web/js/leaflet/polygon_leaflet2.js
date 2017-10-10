/**
 * Created by Irfan on 8/2/17.
 */
function PolygonEditor(options){
    var defaultOptions = {
        id : "map",
        center : [-7.265757, 112.734146],
        zoom : 13,
        markerPath: "/",
        initPaths : [],
        initColors : [],
        initMarkers: [],
        polylines : [],
        colors : [],
        point:[],
        enableEditor: true,
        contextmenuWidth: 140,
        contextmenuItems: [{
            text: "Peta ini tidak memiliki menu klik kanan."
        }],
        onChange: null,
        offline: false,
    };
    var allOptions = $.extend( true, defaultOptions, options );
    this.allOptions = allOptions;

    this.enableEditor = allOptions.enableEditor;
    this.contextmenuWidth = allOptions.contextmenuWidth;
    this.contextmenuItems = allOptions.contextmenuItems;
    this.selectedContextMenuObject = null;
    this.offline = allOptions.offline;

    this.mapInstance = L.map(allOptions.id, {maxZoom: 20}).setView(allOptions.center, allOptions.zoom);
    this.onlineLayer = null;

    this.setupLayer();

    this.initPaths = allOptions.initPaths;
    this.initColors = allOptions.initColors;
    this.initMarkers = allOptions.initMarkers;
    this.polylines = allOptions.polylines;
    this.colors = allOptions.colors;
    this.point = allOptions.point;
    this.markerPath = allOptions.markerPath;

    this.drawControl = null;
    this.drawnItems = null;
    this.initEditor();

    var ini = this;
    this.mapInstance.on('contextmenu.show', function (event) {
        ini.selectedContextMenuObject = event.relatedTarget;
    });

    this.convertPathsToPolyline();
    this.fitBounds();

    //this.initPoint();
    //this.initializeMarker();

    this.onChange = allOptions.onChange;



}

PolygonEditor.prototype = {
    setupLayer: function(){
        if(this.offline){
            L.tileLayer(this.allOptions.markerPath + 'empty.png', {noWrap: true}).addTo(this.mapInstance);
        }else {
            //this.onlineLayer = L.tileLayer('http://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {attribution: '&copy; Google Map'});
            L.tileLayer(this.allOptions.markerPath + 'empty.png', {noWrap: true}).addTo(this.mapInstance);
            //this.onlineLayer.addTo(this.mapInstance);

            /* reference : http://stackoverflow.com/questions/9394190/leaflet-map-api-with-google-satellite-layer */
            var google_streets = L.tileLayer('http://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                id: 'google_streets',
                attribution: "-"
            });
            var google_hybrid = L.tileLayer('http://mt1.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                id: 'google_hybrid',
                attribution: "-"
            });
            var google_satellite = L.tileLayer('http://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                id: 'google_satellite',
                attribution: "-"
            });
            var google_terain = L.tileLayer('http://mt1.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
                id: 'google_terain',
                attribution: "-"
            });

            this.mapInstance.addLayer(google_streets);
            this.mapInstance.addLayer(google_hybrid);
            this.mapInstance.addLayer(google_satellite);
            this.mapInstance.addLayer(google_terain);

            L.control.layers({
                "Peta": google_streets,
                "Hybrid": google_hybrid,
                "Satelit": google_satellite,
                "Terain": google_terain,
            }, {}).addTo(this.mapInstance);
        }
    },

    isOnline : function(){

        return false;
    },

    initEditor : function(){
        var map = this.mapInstance;

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var options = {};
        var editOptions = {
            featureGroup: drawnItems
        };
        if(this.enableEditor) {
            options = {
                position: 'topleft',
                polyline: {
                    shapeOptions: {
                        color: '#000000',
                        weight: 5
                    }
                },
                circle: false,
                marker: true,
                rectangle: false,
                polygon: false
            };
        }else {
            options = {
                position: 'topleft',
                polyline: false,
                circle: false,
                marker: false,
                rectangle: false,
                polygon: false
            };
            editOptions = false
        }

        var drawControl = new L.Control.Draw({
            draw: options,
            edit: editOptions
        });
        map.addControl(drawControl);

        var ini = this;

        map.on('draw:created', function (e) {
            polyline = e.layer;

            /*polyline.bindContextMenu({
                contextmenu: true,
                contextmenuInheritItems: false,
                contextmenuItems: ini.contextmenuItems
            });*/

            var ha = ini.getButtonId(e.layerType);
            if(ha == 'polyline'){
                polyline.bindContextMenu({
                    contextmenu: true,
                    contextmenuInheritItems: false,
                    contextmenuItems: ini.contextmenuItems
                });

                ini.polylines.push(polyline);
                drawnItems.addLayer(polyline);
                //console.log(polyline);
                ini.drawnType = "polyline";

            } else {
                console.log("markers created");
                //console.log(markers);

                ini.point.push(polyline);
                drawnItems.addLayer(polyline);
                ini.drawnType = "marker";

            }

            /*ini.polylines.push(polyline);

            drawnItems.addLayer(polyline);*/

            ini.onChange();
        });

        map.on('draw:edited', function () {
            if(ini.onChange != null) {

                ini.onChange();
            }
        });

        map.on('draw:deleted', function () {
            if(ini.onChange != null) {
                ini.onChange();
            }
        });

        map.on('draw:editstop', function () {
            console.log("edit stop");
            if(ini.onChange != null) {
                ini.onChange();
            }
        });

        this.drawControl = drawControl;
        this.drawnItems = drawnItems;
    },

    startDraw: function(color) {
        var polygonDrawer = new L.Draw.Polyline(this.mapInstance, {shapeOptions:{color:color}});

        polygonDrawer.enable();

        this.changeDrawColor(color);
    },

    changeDrawColor: function(color) {
        this.drawControl.setDrawingOptions({
            polyline: {
                shapeOptions: {
                    color: color
                }
            }
        });
    },

    changePolygonColor: function(color) {
        if(this.selectedContextMenuObject != null){
            this.selectedContextMenuObject.setStyle({
                color: color
            });
            if(this.onChange != null) {
                this.onChange();
            }
        }
    },

    drawPolygon: function(){

    },

    clearAllPaths: function(){
        var paths = this.getPolylineArray();
        for(var i=0;i<paths.length;i++){
            this.drawnItems.removeLayer(paths[i]);
        }
    },

    addNewPaths: function(paths){
        for(var i=0;i<paths.length;i++) {
            var polyline = new L.Polyline(paths[i]);
            polyline.setStyle({color: "#000000"});
            console.log(polyline);
            //polyline.addTo(this.mapInstance);
            this.polylines.push(polyline);
            this.drawnItems.addLayer(polyline);
        }
    },

    convertPathsToPolyline: function(){
        var paths = this.initPaths;
        var colors = this.initColors;
        for(var i=0;i<paths.length;i++){
            var path = paths[i];
            var color = colors[i];
            if(color == "" || color == null){
                color = "#000000";
            }
            var polyline = new L.Polyline(path);
            polyline.bindContextMenu({
                contextmenu: true,
                contextmenuInheritItems: false,
                contextmenuItems: this.contextmenuItems
            });
            polyline.setStyle({ color: color });
            this.polylines.push(polyline);
            this.drawnItems.addLayer(polyline);
        }
    },

    setLabelOnPolygon: function(labelText, polygonIndex){
        var layers = this.drawnItems.getLayers();
        for(var i=0;i<layers.length;i++) {
            var layer = layers[i];
            if(i == polygonIndex) {
                var label = new L.Label()
                label.setContent(labelText)
                label.setLatLng(layer.getBounds().getCenter());
                this.mapInstance.showLabel(label);
                //layer.setText(label, {center: true, offset: 20, orientation: "flip", below:true, attributes: {fill: 'black', "font-family": "Times New Roman", "font-size": 24}});
            }
        }
    },

    initializeMarker: function(){
        this.addMarkers(this.initMarkers);
    },

    addMarkers: function(markers){
        for(var i=0;i<markers.length;i++) {
            var marker = markers[i];
            this.addMarker(marker);
        }
    },

    addMarker: function(marker){
        var iconDefinition = L.icon({
            iconUrl: this.markerPath + marker.type + '_marker.png',

            iconSize: [31, 40], // size of the icon
            iconAnchor: [16, 40], // point of the icon which will correspond to marker's location
            popupAnchor: [0, -50] // point from which the popup should open relative to the iconAnchor
        });

        var marker = L.marker(marker.position, {icon: iconDefinition});
        marker.addTo(this.mapInstance);

        this.drawnItems.addLayer(marker);
    },

    fitBounds: function(){
        var layers = this.drawnItems.getLayers();
        if(layers.length != 0) {
            var group = new L.featureGroup(layers);
            this.mapInstance.fitBounds(group.getBounds());
        }
    },

    exportPath: function(){
        var output = [];
        var layers = this.drawnItems.getLayers();
        for(var i=0;i<layers.length;i++){
            var pathOutput = [];
            var layer = layers[i];
            if(typeof layer.getLatLngs === 'function') {
                var latlngs = layer.getLatLngs();
                for(var j=0;j<latlngs.length;j++){
                    var latlng = latlngs[j];
                    pathOutput.push([latlng.lat, latlng.lng]);
                }
                output.push(pathOutput);
            }
        }
        return output;
    },

    exportColor: function(){
        var output = [];
        var layers = this.drawnItems.getLayers();
        for(var i=0;i<layers.length;i++){
            //between edit mode and non edit mode
            var layer = layers[i];
            if(typeof layer.getLatLngs === 'function') {
                if (layers[i].options.previousOptions == null) {
                    output.push(layers[i].options.color);
                } else {
                    output.push(layers[i].options.previousOptions.color);
                }
            }
        }
        return output;
    },

    showGlobalInfowindow: function(text){
        var allPoints = [];

        var lastPoint = null;
        var polylineArray = this.getPolylineArray();
        for(var i=0;i<polylineArray.length;i++) {
            var polyline = polylineArray[i];
            var latlngs = polyline.getLatLngs();
            //check, whether the drawing should be reversed
            if(lastPoint != null){
                var fPoint = latlngs[0];
                var lPoint = latlngs[latlngs.length-1];
                if(this.calculateDistance(lastPoint.lat, lastPoint.lng, fPoint.lat, fPoint.lng) > this.calculateDistance(lastPoint.lat, lastPoint.lng, lPoint.lat, lPoint.lng)){
                    //mereverse array
                    latlngs = latlngs.reverse();
                }
            }
            for(var j=0;j<latlngs.length;j++){
                var latlng = latlngs[j];

                allPoints.push(latlng);

                lastPoint = latlng;
            }
        }

        var position = this.getLatlngsCenterLocation(allPoints);
        var popup = new L.Popup();
        popup.setLatLng(position);
        popup.setContent(text);
        this.mapInstance.addLayer(popup);
    },

    showPolylineInfowindow: function(text, polygonIndex){
        var polylineArray = this.getPolylineArray();
        for(var i=0;i<polylineArray.length;i++) {
            var polyline = polylineArray[i];
            if(i == polygonIndex) {
                var position = this.getLatlngsCenterLocation(polyline.getLatLngs());
                var popup = new L.Popup();
                popup.setLatLng(position);
                popup.setContent(text);
                this.mapInstance.addLayer(popup);
            }
        }
    },

    getLatlngsCenterLocation: function(latlngs){
        var totalDistance = 0;
        for(var j=0;j<latlngs.length-1;j++){
            var latlng1 = latlngs[j];
            var latlng2 = latlngs[j+1];
            totalDistance += this.calculateDistance(latlng1.lat, latlng1.lng, latlng2.lat, latlng2.lng);
        }

        var halfDistance = totalDistance/2;
        var checkDistance = 0;

        //loop through polyline points
        for(var j=0;j<latlngs.length-1;j++){
            var latlng1 = latlngs[j];
            var latlng2 = latlngs[j+1];
            var distance = this.calculateDistance(latlng1.lat, latlng1.lng, latlng2.lat, latlng2.lng);
            var beforeDistance = checkDistance;
            var afterDistance = checkDistance + distance;
            if(beforeDistance <= halfDistance && halfDistance <= afterDistance){
                //pilih diantara 2 titik
                if(halfDistance - beforeDistance < afterDistance - halfDistance){
                    return latlng1;
                }else{
                    return latlng2;
                }
            }
            checkDistance += distance;
        }

        return null;
    },

    calculateDistance: function(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = this.deg2rad(lat2-lat1);  // deg2rad below
        var dLon = this.deg2rad(lon2-lon1);
        var a =
            Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2)) *
            Math.sin(dLon/2) * Math.sin(dLon/2)
        ;
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        var d = R * c; // Distance in km
        return d;
    },

    deg2rad: function(deg) {
        return deg * (Math.PI/180);
    },

    getPolylineArray: function(){
        var polygonArray = [];
        var layers = this.drawnItems.getLayers();
        for(var i=0;i<layers.length;i++) {
            var layer = layers[i];
            if(typeof layer.getLatLngs === 'function') {
                polygonArray.push(layer);
            }
        }

        return polygonArray;
    },

    setPaths: function (paths) {
        this.mapInstance.initPaths = paths;
        this.fitBounds();
    },

    getDrawnType:function () {
        return this.drawnType;
    },

    getButtonId:function (button) {
        console.log(this.drawnItems.getLayers());
        return button;

    },

    exportPoint:function () {
        var output = [];
        var layers = this.drawnItems.getLayers();
        output.push(layers[0]._latlng.lat);
        output.push(layers[0]._latlng.lng);

        return output;
    },

    addDrawnItems:function (items) {
        this.drawnItems.addLayer(items);
    }

};