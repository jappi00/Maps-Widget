<?php $view->script('views', 'maps:app/bundle/settings.js', ['vue', 'jquery']);?>

<div id="settings" class="uk-form uk-form-horizontal" v-cloak>

    <form class="uk-form uk-form-horizontal">
	
	<div class="uk-grid pk-grid-large" data-uk-grid-margin>
        <div class="pk-width-sidebar">

            <div class="uk-panel">

                <ul class="uk-nav uk-nav-side pk-nav-large" data-uk-tab="{ connect: '#tab-content' }">
                    <li><a><i class="pk-icon-large-settings uk-margin-right"></i> {{ 'General' | trans }}</a></li>
                    <li><a><i class="pk-icon-large-cone uk-icon-small uk-margin-right"></i> {{ 'Style' | trans }}</a></li>
                </ul>

            </div>

        </div>
        <div class="pk-width-content">

            <ul id="tab-content" class="uk-switcher uk-margin">
                <li>
					<div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
                        <div data-uk-margin>

                            <h2 class="uk-margin-remove">{{ 'Map' | trans }}</h2>

                        </div>
						<div data-uk-margin>

                            <button class="uk-button uk-button-primary" @click.prevent="save">{{ 'Save' | trans }}</button>

                        </div>

                    </div>
					<hr class="uk-article-divider">

							<div class="uk-form-row">
								<label for="form-mapslocale" class="uk-form-label">{{ 'Maps Locale' | trans }}</label>
								<div class="uk-form-controls">
									<select id="form-mapslocale" class="uk-form-width-large" v-model="config.locale">
										<option v-for="lang in locales" :value="$key">{{ lang }}</option>
									</select>
								</div>
							</div>
						
							<div class="uk-form-row">
								<span class="uk-form-label">{{'Height (px)' | trans}}</span>
								<div class="uk-form-controls uk-form-controls-text">
									<label><input class="uk-form-width-small" type="number" min="0" max="9999" maxlength="4" v-model="config.height"></label>
								</div>
							</div>
							
							<div class="uk-form-row">
								<span class="uk-form-label"><a href="https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DDesktop&hl=en">{{'Coordinates' | trans}}</a></span>
								<div class="uk-form-controls uk-form-controls-text">
									<input placeholder="lat" class="uk-form-width-middle" type="text" v-model="config.lat">,<input placeholder="lng" class="uk-form-width-middle" type="text" v-model="config.lng">
								</div>
							</div>
							<div class="uk-form-row">
								<span class="uk-form-label">{{'Marker Coordinates' | trans}}</span>
								<div class="uk-form-controls uk-form-controls-text">
									<input placeholder="lat" class="uk-form-width-middle" type="text" v-model="config.mlat">,<input placeholder="lng" class="uk-form-width-middle" type="text" v-model="config.mlng">
								</div>
							</div>

							<div class="uk-form-row">
								<label class="uk-form-label"><a href="https://developers.google.com/maps/documentation/javascript/get-api-key">Google Maps JavaScript & Geocoding API Key</a></label>
								<div class="uk-form-controls uk-form-controls-text">
									<input class="uk-form-width-large" type="text" v-model="config.key">
								</div>
							</div>
							
							<div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
								<div data-uk-margin>
								<h2 class="uk-margin-remove">{{ 'Controls' | trans }}</h2>
								</div>
							</div>
							
					<hr class="uk-article-divider">
					
							<div class="uk-form-row">
								<span class="uk-form-label">{{'Zoom Control' | trans}}</span>
								<div class="uk-form-controls uk-form-controls-text">
									<label><input type="checkbox" v-model="config.zoomControl"> {{'Show zoom controls' | trans}}</label>
								</div>
							</div>
							<div class="uk-form-row">
								<label class="uk-form-label" for="wk-zoom">{{'Zoom Level' | trans}}</label>
									<div class="uk-form-controls">
										<select id="wk-zoom" class="uk-form-width-medium" v-model="config.zoom">
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
										</select>
									</div>
								
								
							</div>
							<div class="uk-form-row">
								<span class="uk-form-label">{{'Scroll Wheel' | trans}}</span>
									<div class="uk-form-controls uk-form-controls-text">
										<label><input type="checkbox" v-model="config.scrollWheel"> {{'Zoom map on scroll' | trans}}</label>
									</div>
							</div>
							<div class="uk-form-row uk-form-controls-condensed">
								<span class="uk-form-label">{{'Type Controls' | trans}}</span>
									<div class="uk-form-controls uk-form-controls-text">
										<label><input type="checkbox" v-model="config.mapTypeControl"> {{'Show type controls' | trans}}</label>
									</div>

									<div class="uk-form-controls-condensed" v-if="config.mapTypeControl">
										<div class="uk-form-row">
											<span class="uk-form-label">{{'Map Type Control Style' | trans}}</span>
											<div class="uk-form-controls uk-form-controls-text">
												<select name="Pizza" v-model="config.mapTypeControlStyle">
													<option value="HORIZONTAL_BAR">Horizontal Bar</option>
													<option value="DROPDOWN_MENU">Dropdown</option>
													<option value="DEFAULT">{{'Default' | trans}}</option>
												</select>
											</div>
										</div>
									</div>

							</div>
							<div class="uk-form-row">
								<span class="uk-form-label">{{'Scale Control' | trans}}</span>
								<div class="uk-form-controls uk-form-controls-text">
									<label><input type="checkbox" v-model="config.scaleControl"> {{'Show scale controls' | trans}}</label>
								</div>
							</div>
							<div class="uk-form-row">
								<span class="uk-form-label">{{'Street View' | trans}}</span>
								<div class="uk-form-controls uk-form-controls-text">
									<label><input type="checkbox" v-model="config.streetViewControl"> {{'Show street view controls' | trans}}</label>
								</div>
							</div>
							<div class="uk-form-row">
								<span class="uk-form-label">{{'Rotate Control' | trans}}</span>
								<div class="uk-form-controls uk-form-controls-text">
									<label><input type="checkbox" v-model="config.rotateControl"> {{'Show rotate controls' | trans}}</label>
								</div>
							</div>
							<div class="uk-form-row">
								<span class="uk-form-label">{{'Draggable' | trans}}</span>
								<div class="uk-form-controls uk-form-controls-text">
									<label><input type="checkbox" v-model="config.draggable"> {{'Move map on drag' | trans}}</label>
								</div>
							</div>
					
				</li>
				<li>

                    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
                        <div data-uk-margin>

                            <h2 class="uk-margin-remove uk-form-heading">{{ 'Style' | trans }}</h2>

                        </div>
                        <div data-uk-margin>

                            <button class="uk-button uk-button-primary" @click.prevent="save">{{ 'Save' | trans }}</button>

                        </div>
                    </div>
					<hr class=uk-article-divider>
					
					<div class="uk-form-row">
						<span class="uk-form-label">{{'Invert' | trans}}</span>
						<div class="uk-form-controls uk-form-controls-text">
							<label><input type="checkbox" v-model="config.styler_invert_lightness"> {{'Invert lightness' | trans}}</label>
						</div>
					</div>
					<div class="uk-form-row">
						<label class="uk-form-label">{{'Hue' | trans}}</label>
						<div class="uk-form-controls uk-form-controls-text">
							<input class="uk-form-width-small" type="text" size="7" v-model="config.styler_hue">(<?php echo __('e.g. %example%' , ['%example%' => '#ff0000']); ?>)
						</div>
					</div>
					
                    <div class="uk-form-row">
						<label class="uk-form-label" >{{'Saturation' | trans}}</label>
						<div class="uk-form-controls">
							<input class="uk-form-width-small" type="number" v-model="config.styler_saturation" min="-100" max="100" maxlength="3">  (<?php echo __('%from% to %to%' , ['%from%' => -100 , '%to%' => 100]); ?>)
						</div>
					</div>
					
					<div class="uk-form-row">
						<label class="uk-form-label">{{'Lightness' | trans}}</label>
						<div class="uk-form-controls">
							<input class="uk-form-width-small" type="text" v-model="config.styler_lightness" min="-100" max="100" maxlength="3"> (<?php echo __('%from% to %to%' , ['%from%' => -100 , '%to%' => 100]); ?>)
						</div>
					</div>
					
					<div class="uk-form-row">
						<label class="uk-form-label" >{{'Gamma' | trans}}</label>
							<div class="uk-form-controls">
								<input class="uk-form-width-small" type="text" v-model="config.styler_gamma" min="0" max="10" maxlength="2"> (<?php echo __('%from% to %to%' , ['%from%' => 0 , '%to%' => 10]); ?>)
							</div>
					</div>
					<h2 class="uk-form-heading">{{'Marker' | trans}}</h2>
					<hr class=uk-article-divider>
						<div class="uk-form-row">
							<label class="uk-form-label">{{'Enable Marker' | trans}}</label>
								<div class="uk-form-controls">
									<select class="uk-form-width-medium" v-model="config.marker">
										<option value="0">{{'Hide' | trans}}</option>
										<option value="1">{{'Show' | trans}}</option>
										<option value="2">{{'Show and enable Popup' | trans}}</option>
										<option value="3">{{'Show with opened Popup' | trans}}</option>
									</select>
								</div>
							<div class="uk-form-controls-condensed" v-if="config.marker != '0'">
							
								<div class="uk-form-row">
								<label class="uk-form-label">{{'Popup max width (px)' | trans}}</label>
									<div class="uk-form-controls uk-form-controls-text">
										<input class="uk-form-width-medium" type="number" v-model="config.popup_max_width" min="10" max="300"  maxlength="3"> (<?php echo __('%from% to %to%' , ['%from%' => 10 , '%to%' => 300]); ?>)
									</div>
								</div>
								<div class="uk-form-row">
									<label class="uk-form-label">{{'Marker name' | trans}}</label>
									<div class="uk-form-controls uk-form-controls-text">
										<input class="uk-form-width-large" type="text" v-model="config.name">
									</div>
								</div>
								<div class="uk-form-row">
									<span class="uk-form-label" data-uk-tooltip="{pos:'bottom-right', delay : '500' , animation : 'true'}" title="{{'Put here simple text or escape html code' | trans}}">{{'Content of the Info Window (Popup)' | trans}}</span>
									<div class="uk-form-controls uk-form-controls-text">
										<textarea  class="uk-form-width-large" v-model="config.content" rows="5"></textarea>
									</div>
								</div>

							</div>
						</div>

                </li>
            </ul>

        </div>
    </div>
    </form>
</div>
