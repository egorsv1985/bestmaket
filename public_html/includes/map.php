<div class="main-contants">

	<div class="contaner">
		<div class="large-title">
			Контакты
		</div>
		
		<div class="contact-block">
			 <?
$APPLICATION->IncludeFile("/includes/contact-right.php", array(), array(
	'NAME' => 'контакты',
	'MODE' => 'text'
));
?>
		</div>
		<div class="clear">
		</div>
	</div>
	<div class="maps">
		<script data-skip-moving="true" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7IG-mXqYnNwnQDFvhVi17zNT_zsTrBxY&callback=initMap" async defer></script>
		<script data-skip-moving="true">
			function initMap() {
				var styledMapType = new google.maps.StyledMapType(
					[{
							"featureType": "administrative.land_parcel",
							"stylers": [{
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
							"stylers": [{
								"color": "#e6eff9"
							}]
						},
						{
							"featureType": "landscape.man_made",
							"elementType": "geometry.stroke",
							"stylers": [{
								"color": "#afcdec"
							}]
						},
						{
							"featureType": "poi.park",
							"elementType": "geometry.fill",
							"stylers": [{
								"color": "#c6dbf1"
							}]
						},
						{
							"featureType": "poi.park",
							"elementType": "labels.text.fill",
							"stylers": [{
								"color": "#2b6cae"
							}]
						},
						{
							"featureType": "water",
							"stylers": [{
								"color": "#bcd5ef"
							}]
						}
					], {
						name: 'Стиль'
					});


				var map1 = new google.maps.Map(document.getElementById('map1'), {
					center: {
						lat: 59.94821017035078,
						lng: 30.27223597015389
					},
					zoom: 17,
					mapTypeControlOptions: {
						mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
					}
				});

				var coordinates = {
					lat: 59.94821017035078,
					lng: 30.27223597015389
				};
				var popupContent = '<p class="map-balloon">г.Санкт-Петербург,<br>7-ая линия В.О., д.78</p>';
				var imgMarker = '<?= SITE_TEMPLATE_PATH; ?>/images/marker.png';
				marker1 = new google.maps.Marker({
					position: coordinates,
					map: map1,
					icon: imgMarker,
				});
				infowindow1 = new google.maps.InfoWindow({
					content: popupContent
				});

				marker1.addListener('click', function() {
					infowindow1.open(map1, marker1);
				});







				map1.mapTypes.set('styled_map', styledMapType);
				map1.setMapTypeId('styled_map');
				
			}
		</script>
		<div class="left">
			<?
			$APPLICATION->IncludeFile("/includes/map-left.php", array(), array(
				'NAME' => 'текст',
				'MODE' => 'html',
				'SHOW_BORDER' => false
			));
			?>
		</div>

	</div>
	<div class="bottom-btn">
		<div class="left">
			Остались вопросы?
		</div>
		<div class="right">
			<a href="#popupOrder" class="fancy">Задайте нам вопрос</a>
		</div>
		<div class="clear"></div>
	</div>
</div>

