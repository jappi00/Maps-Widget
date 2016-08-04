<?php
use Pagekit\Application as App;
$settings = App::module('maps')->config();
?>

<style>
    #map { height: <?= $settings['height'];?>px;}
</style>

<div id="map"></div>
<script type="text/javascript">
    var map;
    function initMap() {
	
		var styledMapType = new google.maps.StyledMapType(
					[
					  {
						"stylers": [
						  {
							"invert_lightness": <?php if($settings['styler_invert_lightness']) echo 'true'; else echo 'false';?>
						  },
						  {
							"hue": '<?= $settings['styler_hue'] ?>'   //'#f4f6fa'
						  },
						  {
							"saturation": <?= $settings['styler_saturation'] ?>	 //-80 
						  },
						  {
							"lightness":  <?= $settings['styler_lightness'] ?>	//40
						  },
						  {
							"gamma": <?= $settings['styler_gamma'] ?>	//1  
						  }
						]
					  }
					],
					{
					name: 'Styled Map'
		});
		
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: <?=$settings['lat']?>, lng: <?=$settings['lng']?>},
            zoom: <?= $settings['zoom'] ?>,
            zoomControl: <?php if($settings['zoomControl']) echo 'true'; else echo 'false';?>,
            mapTypeControl: <?php if($settings['mapTypeControl']) echo 'true'; else echo 'false';?>,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.<?= $settings['mapTypeControlStyle']?>,
				mapTypeIds: ["styled_map", google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE]
            },
            scaleControl: <?php if($settings['scaleControl']) echo 'true'; else echo 'false';?>,
			scrollwheel: <?php if($settings['scrollWheel']) echo 'true'; else echo 'false';?>,
			draggable: <?php if($settings['draggable']) echo 'true'; else echo 'false';?>,
            streetViewControl: <?php if($settings['streetViewControl']) echo 'true'; else echo 'false';?>,
            rotateControl: <?php if($settings['rotateControl']) echo 'true'; else echo 'false';?>
        });
		var s_marker = parseInt( <?=$settings['marker'] ?>, 10);
		if (s_marker) {
        var marker = new google.maps.Marker({
            position: {lat: <?=$settings['mlat']?>, lng: <?=$settings['mlng']?>},
            map: map,
            title: '<?=$settings['name']?>'
        });
		};
		//Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
		
        if (s_marker >=2) { 
		var maxWidthS = <?=$settings['popup_max_width'] ?> ? parseInt(<?=$settings['popup_max_width']?>, 10 ) : 300;
		
		maxWidthS = ((maxWidthS > 300) ? 300 : maxWidthS) || ((maxWidthS < 10) ? 10 : maxWidthS);
        var infowindow = new google.maps.InfoWindow({
            content: '<?=$settings['content'] ?>',
			maxWidth: maxWidthS
        });
        if (s_marker ===3) infowindow.open(map, marker);
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
        }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?=  $settings['key']?>&language=<?=  $settings['language']?>&region=<?=  $settings['region']?>&callback=initMap">
//+ (window.GOOGLE_MAPS_API_KEY || "")
//?sensor=false

</script>