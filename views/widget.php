<?php
use Pagekit\Application as App;
$settings = App::module('maps')->config();
?>
<style>
    #map { height: <?= $settings['height'];?>px; }
</style>
<div id="map"></div>
<script type="text/javascript">
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: <?=$settings['lat']?>, lng: <?=$settings['lng']?>},
            zoom: <?= $settings['zoom'] ?>,
            zoomControl: <?php if($settings['zoomControl']) echo 'true'; else echo 'false';?>,
            mapTypeControl: <?php if($settings['mapTypeControl']) echo 'true'; else echo 'false';?>,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.<?= $settings['mapTypeControlStyle']?>,
            },
            scaleControl: <?php if($settings['scaleControl']) echo 'true'; else echo 'false';?>,
            streetViewControl: <?php if($settings['streetViewControl']) echo 'true'; else echo 'false';?>,
            rotateControl: <?php if($settings['rotateControl']) echo 'true'; else echo 'false';?>
        });
        var marker = new google.maps.Marker({
            position: {lat: <?=$settings['lat']?>, lng: <?=$settings['lng']?>},
            map: map,
            title: '<?=$settings['name']?>'
        });
        <?php if ($settings['infowindow']) { echo "
        var infowindow = new google.maps.InfoWindow({
            content: '".$settings['content']."'
        });
        infowindow.open(map, marker);
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
        ";}?>
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?=  $settings['key']?>&callback=initMap"></script>