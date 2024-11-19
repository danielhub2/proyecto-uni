<?php
/*
try {				
	global $cs_connection;
	$city_id = "3523466";		//Heroica				
	$sql = "SELECT id,title,desc,adrress,lat,lng,img_1 FROM near_by_map ORDER BY ";
			$stmt = $cs_connection->prepare($sql);
			$stmt->execute(array(':city_id'=>$city_id));
			$total_rows_wea = $stmt->rowCount();
		echo "<div id='ini_weather'>";
		while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)){		
				echo $rows['temp_now_c'] . "&#176; C <span class='temp_col_ini'></span> ";
				echo $rows['temp_now_f'] . "&#176; F";						
		}
		echo "</div>";		
	} catch(PDOException $e) {
    echo 'ERROR SELECT: ' . $e->getMessage();
	}
*/
$class_one_map_icon = "map_uca_icon-01.png";
$lat="25.421300";//saltillo
$long="-100.996956";//saltillo
	?>
<script>
if (window.navigator.geolocation) {
    var failure, success;
    success = function(position) {	
/*	var stringData = JSON.stringify(position, null);			
			$.ajax({
				  type: "POST",
				  url: "php/gm_session.php",
				  data: { data: stringData }
				});		*/
	var geoLocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);   
	var myLat = position.coords.latitude;
	var myLng = position.coords.longitude;	
//	console.log("HotelJardin@" + myLat+','+myLng);	/*Console log*/	
	}
}	
	//ICONS
var customIcons = {	
      featured: {
        icon: 'img/comun/<?php echo $class_one_map_icon; ?>'
      },
      barr: {
        icon: 'img/comun/map_hjr_com-02.png'
      },
      sucursall: {
        icon: 'img/comun/<?php echo $class_one_map_icon; ?>'
      }
,
      int_br: {
          icon: 'img/comun/map_hjr_common_pi-02.png' 
      }
    };
	var mapZoom;
 
	  // STYLE 1.- Create an array of styles.			
var styles = [	{
         featureType: "administrative",
         elementType: "labels",
         stylers: [
           { visibility: "off" }
         ]
  },{
    featureType: "poi.business",
    elementType: "labels",
    stylers: [
      { visibility: "off" }
		]
	},{
	  	featureType: "administrative.country",
		elementType: "geometry.stroke",
		stylers: [
			{ visibility: "off" }
		]
	  }/*,{
	featureType: "all",
    stylers: [
		{hue: 20},
		{lightness: 0}, //1.00
		{saturation: 25}, //-75
		{gamma: 0.0 }	//0.15

    ]
  },{
    featureType: "road",
    elementType: "geometry.fill",
    stylers: [
      { color: "#efeeed" }, //#ce4dff
      { saturation: 0 }
    ]
  },{
    featureType: "road",
    elementType: "labels",
    stylers: [
      { visibility: "on" }
    ]
  },{
	featureType: 'poi.park',
	elementType: 'geometry',
	stylers: [{color: '#46bb5f'}] 
 },
{
featureType: 'landscape.natural',
elementType: 'geometry',
stylers: [{color: '#a2ccb3'}]
},{
	featureType: 'water',
	elementType: 'geometry',
	stylers: [{color: '#708894'}]
 },{
    featureType: "poi.place_of_worship",
    elementType: "labels",
    stylers: [
      { visibility: "off" }
		]
	},{
    featureType: "road.highway",
    elementType: "labels",
    stylers: [
      { visibility: "on" }

					  ]
					}/*,
            {
	featureType: 'transit.station',
	elementType: 'geometry',
	stylers: [{color: '#252525'},{ hue: "#000000" },{ saturation: 60 },{ visibility: "on" }]
            }*/
					];					
	  // 2.-Create a new StyledMapType object, passing it the array of styles,
  // as well as the name to be displayed on the map type control.
  var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});

 var mapOptions = {
	scrollwheel: false,
	mapTypeControl: false,
    zoom: 13,
	center: new google.maps.LatLng(<?php echo $lat . "," . $long; ?>),
	zoomControl: true,
    zoomControlOptions: {style: google.maps.ZoomControlStyle.SMALL},
    mapTypeControlOptions: {
    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
    }	
}
  // 3.-Create a map object, and include the MapTypeId to add
  // to the map type control.

      var map = new google.maps.Map(document.getElementById("mapa_contenedor"), mapOptions,{       
      });


/////////////////////////////////////////////

	var expand = "map_expand";
	var contract = "map_contract";
		var latLongLiteral = "<?php echo $lat ; ?>, <?php echo $long ; ?>";
		var newlocation = latLongLiteral;
		var latlng = newlocation.split(/, ?/);
		$("#map_resizr").click(function(e){
		var id_clicked = e.target.id;

	if(id_clicked == expand )	{
		
	$("#map").animate({height:["700px", "easeInOutQuart"]}, 300, function() { 
		$("#map_resizr").html('<div id="map_contract">Contraer el mapa</div>');
		google.maps.event.trigger(map, 'resize');
		var latLngLit  = new google.maps.LatLng(parseFloat(latlng[0]), parseFloat(latlng[1])); //<<<<lat long literal
        map.setCenter(latLngLit);

		//$('html, body').animate({scrollTop: $(window).scrollTop() + 400}, 600);
		});

	} else {
           // var centro = "<?php echo $lat .",".$long; ?>";
	$("#map").animate({height:["225px", "easeInOutQuart"]}, 300, function() { 
		$("#map_resizr").html('<div id="map_expand">Expandir el mapa</div>');
		google.maps.event.trigger(map, 'resize');
		var latLngLit  = new google.maps.LatLng(parseFloat(latlng[0]), parseFloat(latlng[1])); //<<<<lat long literal
        map.setCenter(latLngLit);
//$('html, body').animate({scrollTop: $(window).scrollTop() - 400}, 600);
	});	

}					
	});
/////////////////////////////////////////////

  //    var infoWindow = new google.maps.InfoWindow;
var infoWindow = new google.maps.InfoWindow({
    pixelOffset: new google.maps.Size(0,-10)  //move to right
});

		// Change this depending on the name of your PHP file
		downloadUrl("scripts/genxml.php", function(data)	{ //function data
        var xml = data.responseXML;
		//console.log(xml);
        var markers = xml.documentElement.getElementsByTagName("marker");
		var z_index = 1000;	//para que el primer marcador salga encima de otros cercanos
		var marker_array = [];

			for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var stTel = markers[i].getAttribute("telefono");
          var stHorario = markers[i].getAttribute("descripcion");
          var type = markers[i].getAttribute("type");
          var db_id = markers[i].getAttribute("id");
          var image = markers[i].getAttribute("image");
		  var varUrlMaps = "index.php?clave=" + db_id;
          var point = new google.maps.LatLng(
		  parseFloat(markers[i].getAttribute("lat")),
		  parseFloat(markers[i].getAttribute("lng")),varUrlMaps);
          var ttp = markers[i].getAttribute("timetoplace");
		  var icon = customIcons[type] || {};

          var marker = new google.maps.Marker({
            map: map,
            position: point,
			title: name,
            icon: icon.icon,
			url: varUrlMaps,
			zIndex: z_index			
          });	
marker_array.push(db_id);
 
		var html = "<style>";
		html += ".gm-style-iw{max-width:310px; background-color: #fff;top: 0px !Important;left:0px !important;box-shadow: 4px 4px 0px 1px #000;}";
		html += "#info_windows{position:relative;top:6px;width:310px;height:auto; padding:0px 0px 10px 0px;text-align:center; }";
		html += ".red{color:#f53c3c;}";
		html += ".big{font-size:18px;}";
		html += ".bigger{width:100%;height:auto;text-align:center;font-size:25px;}";
		html += ".black{color:#252525;}";
		html += ".ttp{width:98%;height:auto;text-align:center;font-size:14px;color:#a9a9a9;margin:0px 0px 0px 0px;}";
		html += "</style>";
		if (type == "barr"){
		html += '<div id="info_windows">';
		html += '<div style="width:100%;text-align:center;">';
		html += '<img src="img_base/map/poi_image/' + image + '"/>';
		html += '</div>'
		html += '<b class="bigger">' + name + '</b>';
		html += "<br>";
		html += '<p class="ttp">' + ttp + ' Minutos en coche</p>';
		html += "</div>";
	//	html += '<br/>' + address;
		} else {
		if (type == 'int_br'){
					html += '<div id="info_windows">';
			html += '<b class ="big">' + name + '</b>';
			html += "<br>";
					html += '<p class="ttp">' + ttp + ' Minutos en coche</p>';

					html += "</div>";
		} else {
					html += '<div id="info_windows">';
				html += '<b class="red">' + name + '</b><br/><b class="black">' + address + '</b><br/>Telefono: <b>'+ stTel +'</b>';
				html += '<br/>';
				html += 'Horario: <b>' + stHorario + '.</b>';
				html += "</div>";
		}
	}
	if( i !== 0 ){
		bindInfoWindow(marker, map, infoWindow, html);
        } else { 
		setInfoWindowClose(marker, map)	
		} 	
		//z_index = (parseInt(z_index) - parseInt(2));

        }

      }); 
 //google.maps.event.addListener(marker, 'click', function () {window.open(varUrlMaps, '');});//click link object
	//$("#map_script").append(scriptMap);
 
 // 4.- Associate the styled map with the MapTypeId and set it to display.
	  map.mapTypes.set('map_style', styledMap);	
	  map.setMapTypeId('map_style');
	  //map.setCenter(geoLocate);
				//FIN DE ESTILOS DE MAPA
				//Zoom Change >>
			var minFTZoomLevel = 11;		
			google.maps.event.addListener(map, 'zoom_changed', function() {
			zoomLevel = map.getZoom();
			if(zoomLevel < minFTZoomLevel) {				
			map.setZoom(minFTZoomLevel);
			}

});	
   		/*
   function bindInfoWindow(marker, map, infoWindow, html) {		//event listeners¡!
google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);		
      });
		google.maps.event.addListener(marker, "mouseover", function() {
                marker.setZIndex(1100);
		});
    }*/
	    function bindInfoWindow(marker, map, infoWindow, html) {		//event listeners¡!
      google.maps.event.addListener(marker, 'mouseover', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);		
      });
		google.maps.event.addListener(marker, "mouseover", function() {
                marker.setZIndex(999);
				   // Reference to the DIV which receives the contents of the infowindow using jQuery
   var iwOuter = $('.gm-style-iw');

   /* The DIV we want to change is above the .gm-style-iw DIV.
    * So, we use jQuery and create a iwBackground variable,
    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
    */
   var iwBackground = iwOuter.prev();
   // Remove the background shadow DIV
   iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   // Remove the white background DIV
    iwBackground.children(':nth-child(4)').css({'display' : 'none'});
 //  iwBackground.children(':nth-child(4)').css({'position:':'relative','top':'0px'});
$(".gm-style-iw").next("div").hide();
$(".gm-style-iw").prev("div").css({'display' : 'none'});
		});
	google.maps.event.addListener(marker, "mouseout", function() {
                marker.setZIndex(undefined);
				 infoWindow.close(map, marker);	
		});
    }
	    function setInfoWindowClose(marker, map) {		//event listeners¡!
		google.maps.event.addListener(marker, "mouseover", function() {
                marker.setZIndex(999);
		});
	google.maps.event.addListener(marker, "mouseout", function() {
                marker.setZIndex(undefined);	
		});
    }
    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;
      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };
      request.open('GET', url, true);
      request.send(null);
    }
function doNothing() {}	

/* 	- --	- 	-	 -	-- 	- -	--	 	- -	- 	- 	-- 	- 	- 	 	--	-- -	-	- 	-	 -	- -	- 		-	*/
google.maps.event.addListener(infoWindow, 'domready', function() {

   // Reference to the DIV which receives the contents of the infowindow using jQuery
   var iwOuter = $('.gm-style-iw');

   /* The DIV we want to change is above the .gm-style-iw DIV.
    * So, we use jQuery and create a iwBackground variable,
    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
    */
   var iwBackground = iwOuter.prev();
   // Remove the background shadow DIV
   iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   // Remove the white background DIV
    iwBackground.children(':nth-child(4)').css({'display' : 'none'});
 //  iwBackground.children(':nth-child(4)').css({'position:':'relative','top':'0px'});
$(".gm-style-iw").next("div").hide();
$(".gm-style-iw").prev("div").css({'display' : 'none'});

});
/* - 	-	- -	- -- - -	- 	-	 - 	-	  - --	- - 	- -	- 	-	 --	 -	- 	-- -	 -	-	- -	 -	-	 -*/
/*
(function($) {    
  if ($.fn.style) {
    return;
  }

  // Escape regex chars with \
  var escape = function(text) {
    return text.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
  };

  // For those who need them (< IE 9), add support for CSS functions
  var isStyleFuncSupported = !!CSSStyleDeclaration.prototype.getPropertyValue;
  if (!isStyleFuncSupported) {
    CSSStyleDeclaration.prototype.getPropertyValue = function(a) {
      return this.getAttribute(a);
    };
    CSSStyleDeclaration.prototype.setProperty = function(styleName, value, priority) {
      this.setAttribute(styleName, value);
      var priority = typeof priority != 'undefined' ? priority : '';
      if (priority != '') {
        // Add priority manually
        var rule = new RegExp(escape(styleName) + '\\s*:\\s*' + escape(value) +
            '(\\s*;)?', 'gmi');
        this.cssText =
            this.cssText.replace(rule, styleName + ': ' + value + ' !' + priority + ';');
      }
    };
    CSSStyleDeclaration.prototype.removeProperty = function(a) {
      return this.removeAttribute(a);
    };
    CSSStyleDeclaration.prototype.getPropertyPriority = function(styleName) {
      var rule = new RegExp(escape(styleName) + '\\s*:\\s*[^\\s]*\\s*!important(\\s*;)?',
          'gmi');
      return rule.test(this.cssText) ? 'important' : '';
    }
  }

  // The style function
  $.fn.style = function(styleName, value, priority) {
    // DOM node
    var node = this.get(0);
    // Ensure we have a DOM node
    if (typeof node == 'undefined') {
      return this;
    }
    // CSSStyleDeclaration
    var style = this.get(0).style;
    // Getter/Setter
    if (typeof styleName != 'undefined') {
      if (typeof value != 'undefined') {
        // Set style property
        priority = typeof priority != 'undefined' ? priority : '';
        style.setProperty(styleName, value, priority);
        return this;
      } else {
        // Get style property
        return style.getPropertyValue(styleName);
      }
    } else {
      // Get CSSStyleDeclaration
      return style;
    }
 };
})(jQuery);*/
</script>