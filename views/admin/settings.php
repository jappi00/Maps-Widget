<?php $view->script('map', 'https://maps.googleapis.com/maps/api/js?sensor=false');
    $view->script('views', 'maps:app/bundle/settings.js', ['vue', 'jquery']);
?>

<div id="settings" class="uk-form uk-form-horizontal" v-cloak>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>
            <h2 class="uk-margin-remove">{{ 'Edit Settings' | trans }}</h2>
        </div>
        <div data-uk-margin>
            <button class="uk-button uk-button-primary" @click.prevent="save">{{ 'Save' | trans }}</button>
        </div>
    </div>
    <form class="uk-form uk-form-horizontal">
    <div class="uk-form-row">
        <div class="uk-form-controls">
            <div class="uk-form-row">
                <label class="uk-form-label">Height</label><input class="uk-form-width-small" type="number" min="0" v-model="config.height">
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">Marker name</label><input class="uk-form-width-large" type="text" v-model="config.name">
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label"><a href="https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DDesktop&hl=en">Coordinates</a></label><input placeholder="lat" class="uk-form-width-middle" type="text" v-model="config.lat">,<input placeholder="lng" class="uk-form-width-middle" type="text" v-model="config.lng">
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label"><a href="https://developers.google.com/maps/documentation/javascript/get-api-key">Google Maps JavaScript & Geocoding API Key</a></label><input class="uk-form-width-large" type="text" v-model="config.key">
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">zoomControl</label><input class="uk-form-width-large" type="checkbox" v-model="config.zoomControl">
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">zoom</label><input class="uk-form-width-mini" type="number" min="0" v-model="config.zoom">
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">mapTypeControl</label><input class="uk-form-width-large" type="checkbox" v-model="config.mapTypeControl">
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">MapTypeControlStyle</label><select name="Pizza" v-model="config.mapTypeControlStyle">
                    <option value="HORIZONTAL_BAR">Horizontal Bar</option>
                    <option value="DROPDOWN_MENU">Dropdown</option>
                    <option value="DEFAULT">Default</option>
                </select>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">scaleControl</label><input class="uk-form-width-large" type="checkbox" v-model="config.scaleControl">
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">streetViewControl</label><input class="uk-form-width-large" type="checkbox" v-model="config.streetViewControl">
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">rotateControl</label><input class="uk-form-width-large" type="checkbox" v-model="config.rotateControl">
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label"><input class="uk-form-width-large" type="checkbox" v-model="config.infowindow">Content of the Info Window</label><textarea class="uk-form-width-large" v-model="config.content"></textarea>
            </div>
        </div>
    </div>
    </form>
</div>
