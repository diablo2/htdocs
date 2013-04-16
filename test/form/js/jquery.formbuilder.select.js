/*
 * JQuery Form Builder - Select Basic plugin.
 * 
 * Revision: @REVISION
 * Version: @VERSION
 * Copyright 2011 Lim Chee Kin (limcheekin@vobject.com)
 *
 * Licensed under Apache v2.0 http://www.apache.org/licenses/LICENSE-2.0.html
 *
 * Date: 10-Feb-2011
 */

var FbSelect = $.extend({}, $.fb.fbWidget.prototype, {
	options: { // default options. values are stored in widget's prototype
		name: 'Select Basic',
		belongsTo: $.fb.formbuilder.prototype.options._standardFieldsPanel,
		_type: 'Select',
		_html : '<div><label><span></span></label></div> \
				<select class="span4" id="selectOption"> \
				<option value="First Choice">First Choice</option> \
				<option value="Second Choice">Second Choice</option> \
				<option value="Third Choice">Third Choice</option> \
				</select>',
		_counterField: 'label',
		_languages: [ 'en', 'zh_CN' ],
		settings: {
			en: {
				label: 'Select Basic',
				size: '',
				option: 'First Choice \nSecond Choice \nThird Choice',
				styles: {
					fontFamily: 'default', // form builder default
					fontSize: 'default',
					fontStyles: [0, 0, 0] // bold, italic, underline					
				}				
			},
			zh_CN : {
				label: '单行文字输入',
				value: '',
				description: '',				
				styles: {
					fontFamily: 'default', // form builder default
					fontSize: 'default',
					fontStyles: [0, 0, 0] // bold, italic, underline					
				}				
			},
			_persistable: true,
			required: true,
			restriction: 'no',
			styles : {
				label: {
				  color : 'default',
				  backgroundColor : 'default'
				},
			  value: {
				  color : 'default',
				  backgroundColor : 'default'
				},
				description: {
					color : '777777',
					backgroundColor : 'default'
			    }				
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
		$('label span', $jqueryObject).text(fb.settings.label);
		if (fb._settings.required) {
			$('label em', $jqueryObject).text('*');	
		}
		$('input', $jqueryObject).val(fb.settings.value);
		// $('.formHint', $jqueryObject).text(fb.settings.description);
		$('.selectOption', $jqueryObject).text(fb.settings.description);
		fb.target._log('fbSelect._getWidget executed.');
		return $jqueryObject;
	},
	_getFieldSettingsLanguageSection : function(event, fb) {
		fb.target._log('fbSelect._getFieldSettingsLanguageSection executing...');
		var $label = fb.target._label({ label: 'Label', name: 'field.label' })
                         .append('<input type="text" id="field.label" class="span12"/>');
    $('input', $label).val(fb.settings.label)
     .keyup(function(event) {
 	      var value = $(this).val();
	      fb.item.find('label span').text(value);
	      fb.settings.label = value;
	      fb.target._updateSettings(fb.item);
	      fb.target._updateName(fb.item, value);
         });
	  // var $value = fb.target._label({ label: 'Value', name: 'field.value' })
		 //                      .append('<input type="text" id="field.value" class="span12"/>');
		var $size = fb.target._label({ label: 'Size', name: 'field.size' })
		                    .append('<select id="field.size" class="span12"> \
		                    			<option value="span4">default</option> \
		                    			<option value="span1">1</option> \
		                    			<option value="span2">2</option> \
		                    			<option value="span3">3</option> \
		                    			<option value="span4">4</option> \
		                    			<option value="span5">5</option> \
		                    			<option value="span6">6</option> \
		                    			<option value="span7">7</option> \
		                    			<option value="span8">8</option> \
		                    			<option value="span9">9</option> \
		                    			<option value="span10">10</option> \
		                    			<option value="span11">11</option> \
		                    			<option value="span12">12</option> \
		                    		</select>');
		$('select', $size).val(fb.settings.size)
		 .change(function(event) {
		  var value = $(this).val();
		  fb.item.find('#selectOption').removeClass();
		  fb.item.find('#selectOption').addClass(value);
		  fb.settings.size = value;
		  fb.target._updateSettings(fb.item);
		});    
   		
	
		var $option = fb.target._label({label: 'Option', name: 'field.option'})
			.append('<textarea id="option" rows="4"></textarea>');
		$('textarea', $option).val(fb.settings.option)
			.keyup(function(event){
				var value = $(this).val().split('\n');
				fb.item.find('#selectOption option').remove();
				$option = "";
			  for ($i = 0 ; $i < value.length ; $i++){
			  	fb.item.find('#selectOption').append('<option value="'+value[$i]+'">'+value[$i]+'</option>');
			  	
			  	if ($i == value.length-1){
					$option += value[$i];
			  	} else {
			  		$option += value[$i] + "\n";
			  	}
			  }
			  	fb.settings.option = $option;
			  	fb.target._updateSettings(fb.item);
			});
    
		fb.target._log('fbSelect._getFieldSettingsLanguageSection executed.');
		return [fb.target._twoColumns($label, $size), fb.target._oneColumn($option)];
	},
	_getFieldSettingsGeneralSection : function(event, fb) {
		fb.target._log('fbSelect._getFieldSettingsGeneralSection executing...');
		
		var $textInput = fb.item.find('.textInput');
		var styles = fb.settings.styles;
		if (styles.value.color == 'default') {
			styles.value.color = $textInput.css('color');
		}
		if (styles.value.backgroundColor == 'default') {
			styles.value.backgroundColor = $textInput.css('backgroundColor');
		}		
		var $colorPanel = fb.target._labelValueDescriptionColorPanel(styles);
		
		$("input[id$='field.label.color']", $colorPanel).change(function(event) {
			var value = $(this).data('colorPicker').color;
			fb.item.css('color','#' + value);
			styles.label.color = value;
			fb.target._updateSettings(fb.item);
		});		

		$("input[id$='field.label.backgroundColor']", $colorPanel).change(function(event) {
			var value = $(this).data('colorPicker').color;
			fb.item.css('backgroundColor','#' + value);
			styles.label.backgroundColor = value;
			fb.target._updateSettings(fb.item);
		});				
		
		$("input[id$='field.value.color']", $colorPanel).change(function(event) {
			var value = $(this).data('colorPicker').color;
			$textInput.css('color','#' + value);
			styles.value.color = value;
			fb.target._updateSettings(fb.item);
		});		

		$("input[id$='field.value.backgroundColor']", $colorPanel).change(function(event) {
			var value = $(this).data('colorPicker').color;
			$textInput.css('backgroundColor','#' + value);
			styles.value.backgroundColor = value;
			fb.target._updateSettings(fb.item);
		});					
		
		$("input[id$='field.description.color']", $colorPanel).change(function(event) {
			var value = $(this).data('colorPicker').color;
			fb.item.find('.formHint').css('color','#' + value);
			styles.description.color = value;
			fb.target._updateSettings(fb.item);
		});		

		$("input[id$='field.description.backgroundColor']", $colorPanel).change(function(event) {
			var value = $(this).data('colorPicker').color;
			fb.item.find('.formHint').css('backgroundColor','#' + value);
			styles.description.backgroundColor = value;
			fb.target._updateSettings(fb.item);
		});				
		fb.target._log('fbSelect._getFieldSettingsGeneralSection executed.');
		return [ $colorPanel];
	}, 
	_languageChange : function(event, fb) {
		fb.target._log('fbSelect.languageChange executing...');
		var styles = fb.settings.styles;
		var fbStyles = fb.target._getFbLocalizedSettings().styles;
		var fontFamily = styles.fontFamily != 'default' ? styles.fontFamily : fbStyles.fontFamily;
		var fontSize = styles.fontSize != 'default' ? styles.fontSize : fbStyles.fontSize;
		var fontWeight = styles.fontStyles[0] == 1 ? 'bold' : 'normal';
    var fontStyle = styles.fontStyles[1] == 1 ? 'italic' : 'normal';
    var textDecoration = styles.fontStyles[2] == 1 ? 'underline' : 'none';
		
    fb.item.css('fontFamily', fontFamily);
		fb.item.find('label span').text(fb.settings.label)
		  .css('textDecoration', textDecoration);

		fb.item.find('label').css('fontWeight', fontWeight)
		  .css('fontStyle', fontStyle)
		  .css('fontSize', fontSize + 'px');
			
		fb.item.find('.textInput').val(fb.settings.value)
		  .css('fontWeight', fontWeight)
		  .css('fontStyle', fontStyle)
		  .css('textDecoration', textDecoration)
		  .css('fontFamily', fontFamily)
		  .css('fontSize', fontSize + 'px');

		fb.item.find('.formHint').text(fb.settings.description);
		
		fb.target._log('fbSelect.languageChange executed.');
	}
});

$.widget('fb.fbSelect', FbSelect);
