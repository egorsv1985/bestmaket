      function initMap() {
        // Create a new StyledMapType object, passing it an array of styles,
        // and the name to be displayed on the map type control.
        var styledMapType = new google.maps.StyledMapType(
						[
						  {
						    "featureType": "administrative.land_parcel",
						    "stylers": [
						      {
						        "color": "#2c6fb3"
						      },
						      {
						        "visibility": "simplified"
						      }
						    ]
						  },
						  {
						    "featureType": "landscape.man_made",
						    "elementType": "geometry.fill",
						    "stylers": [
						      {
						        "color": "#e6eff9"
						      }
						    ]
						  },
						  {
						    "featureType": "landscape.man_made",
						    "elementType": "geometry.stroke",
						    "stylers": [
						      {
						        "color": "#afcdec"
						      }
						    ]
						  },
						  {
						    "featureType": "poi.park",
						    "elementType": "geometry.fill",
						    "stylers": [
						      {
						        "color": "#c6dbf1"
						      }
						    ]
						  },
						  {
						    "featureType": "poi.park",
						    "elementType": "labels.text.fill",
						    "stylers": [
						      {
						        "color": "#2b6cae"
						      }
						    ]
						  },
						  {
						    "featureType": "water",
						    "stylers": [
						      {
						        "color": "#bcd5ef"
						      }
						    ]
						  }
						],
            {name: 'Стиль'});


        var map1 = new google.maps.Map(document.getElementById('map1'), {
          center: {lat: 59.949230, lng: 30.269000},
          zoom: 17,
          mapTypeControlOptions: {
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
          }
        });
        
        var coordinates = {lat: 59.948730, lng: 30.271500};
        var popupContent = '<p class="map-balloon">г.Санкт-Петербург,<br>7-ая линия В.О., д.84-А.</p>'
        var imgMarker = '<?=SITE_TEMPLATE_PATH;?>/images/marker.png';
        marker1 = new google.maps.Marker({
          position: coordinates,
          map: map1,
  				icon: imgMarker,
					//animation: google.maps.Animation.BOUNCE
        });
        infowindow = new google.maps.InfoWindow({
        	content: popupContent
        });
        infowindow.open(map1, marker1);
        /*
				marker1.addListener('click', function() {
					infowindow.open(map1, marker1)
				});
				*/
        $(window).load(function() {
					$('.gm-style-iw').prev().hide();
				});
        var map2 = new google.maps.Map(document.getElementById('map2'), {
          center: {lat: 55.657109, lng: 37.645576},
          zoom: 17,
          mapTypeControlOptions: {
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain','styled_map']
          }
        });

        var coordinates = {lat: 55.656509, lng: 37.643076};
        var popupContent = '<p class="map-balloon">г. Москва,<br>Каширское шоссе, д. 24</p>'
        marker2 = new google.maps.Marker({
            position: coordinates,
            map: map2,
    				icon: imgMarker
            //animation: google.maps.Animation.BOUNCE
        });
        infowindow = new google.maps.InfoWindow({
        	content: popupContent
        });
        infowindow.open(map2, marker2);
        /*
				marker2.addListener('click', function() {
        	infowindow.open(map2, marker2);
				});
				*/
        //Associate the styled map with the MapTypeId and set it to display.
        map1.mapTypes.set('styled_map', styledMapType);
        map1.setMapTypeId('styled_map');
        map2.mapTypes.set('styled_map', styledMapType);
        map2.setMapTypeId('styled_map');
      }