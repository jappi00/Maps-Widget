<template>

    <div class="uk-form-horizontal">

        <div class="uk-form-row">
            <label for="form-top-style" class="uk-form-label">Top {{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-top-style" class="uk-form-width-large" v-model="map.extension.top_style">
                    <option value="uk-block-default">{{ 'Default' | trans }}</option>
                    <option value="uk-block-muted">{{ 'Muted' | trans }}</option>
                </select>
            </div>
        </div>

    </div>

</template>
<script>

    module.exports = {

        section: {
            label: 'Map',
            priority: 90
        },

        props: ['map']

    };

    window.Site.components['map-extension'] = module.exports;

</script>