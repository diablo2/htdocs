/*
 * JQuery Form Builder - Field Name plugin.
 * 
 * Revision: @REVISION
 * Version: @VERSION
 * Copyright 2011 Author Name (email@domain.com)
 *
 * Licensed under Apache v2.0 http://www.apache.org/licenses/LICENSE-2.0.html
 *
 * Date: DD-MMM-2011
 */

var FbSelect = $.extend({}, $.fb.fbWidget.prototype, {
	options: { // default options. values are stored in widget's prototype
		name: 'Select',
		belongsTo: $.fb.formbuilder.prototype.options._standardFieldsPanel,
		_type: 'Select',
		_html: '<div><label><span></span></label></div> \
				<select class="span2" id="selectOption"> \
				<options></options> \
				</select>',
		_counterField: 'Select',
		_languages: [ 'en', 'zh_CN' ],
		settings: {
			en: {
				field1: 'Value',
				classes: [],
				styles: {
					fontFamily: 'default', // form builder default
					fontSize: 'default',
					fontStyles: [0, 0, 0] // bold, italic, underline					
				}				
			},
			zh_CN: {
				field1: '文字',
				classes: [],
				styles: {
					fontFamily: 'default', // form builder default
					fontSize: 'default',
					fontStyles: [0, 0, 0] // bold, italic, underline					
				}				
			},
			styles: {
				color: 'default',
				backgroundColor: 'default'
			}
		}
	},
	_init : function() {
		// calling base plugin init
		$.fb.fbWidget.prototype._init.call(this);
		// merge base plugin's options
		this.options = $.extend({}, $.fb.fbWidget.prototype.options, this.options);
	},
	_getWidget : function(event, fb) {
		var $jqueryObject = $(fb.target.options._html);
		fb.target._log('fbSelect._getWidget executing...');
		// write your code here
		$('label span', $jqueryObject).text(fb.settings.label);

		fb.target._log('fbSelect._getWidget executed.');
		return $jqueryObject;
	},
	_getFieldSettingsLanguageSection : function(event, fb) {
		// var $jqueryObjects = [];
		fb.target._log('fbSelect._getFieldSettingsLanguageSection executing...');
		// write your code here
		var $label = fb.target._label({ label: 'Label', name: 'field.label' })
                         .append('<input type="text" id="field.label" />');


		fb.target._log('fbSelect._getFieldSettingsLanguageSection executed.');
		return [fb.oneColumns.target($label)];
	},
	_getFieldSettingsGeneralSection : function(event, fb) {
		var $jqueryObjects = [];
		fb.target._log('fbSelect._getFieldSettingsGeneralSection executing...');
		// write your code here
		fb.target._log('fbSelect._getFieldSettingsGeneralSection executed.');
		return $jqueryObjects;
	}, 
	_languageChange : function(event, fb) {
		fb.target._log('fbSelect.languageChange executing...');
		// write your code here
		fb.target._log('fbSelect.languageChange executed.');
	}
});

$.widget('fb.fbSelect', FbSelect);
