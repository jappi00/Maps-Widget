module.exports = {
	
	name: 'maps-settings',
    el: '#settings',
	
    data: function () {
		
		var s = window.$data;

		if ((!s.config.locale) || (s.config.locale === null) || (s.config.locale =="en_EN")) s.config.locale = s.options.locale;

        return s;


    },

    methods: {

        save: function () {
			
			if ((!this.config.locale) || (!this.config.locale === null))  {
				this.config.locale = 'en_GB';
				this.config.language = 'en';
				this.config.region = 'GB';
			}
			else {
				var loc = this.config.locale;
				if (loc.length < 3){
					this.config.language = loc;
					this.config.region = loc.toUpperCase();
				}
				else{
					var locArr = loc.split("_");
					this.config.language = locArr[0];
					this.config.region = locArr[1];
				}
				
			}
			
			
            this.$http.post('admin/system/settings/config', {name: 'maps', config: this.config}).then(function () {
                    this.$notify('Settings saved.');
                }, function (data) {
                    this.$notify(data, 'danger');
                }
            );
        }
    }

};

Vue.ready(module.exports);