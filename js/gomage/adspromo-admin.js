 /**
 * GoMage Ads & Promo Extension
 *
 * @category     Extension
 * @copyright    Copyright (c) 2010-2015 GoMage (http://www.gomage.com)
 * @author       GoMage
 * @license      http://www.gomage.com/license-agreement/  Single domain license
 * @terms of use http://www.gomage.com/terms-of-use
 * @version      Release: 1.3
 * @since        Class available since Release 1.0
 */

Validation.add('gomage-validate-number-range-99', 'range from 0 to 99',		
function(v) {
	return (Validation.get('IsEmpty').test(v)
			|| (!isNaN(parseNumber(v)) && !/^\s+$/.test(parseNumber(v))))
			&& !((parseNumber(v) > 99) || (parseNumber(v) < 0));
			
});

Validation.add('gomage-validate-number',
		'Please use only numbers (0-9) in this field.', function(v) {
			return Validation.get('IsEmpty').test(v)
					|| (!isNaN(parseNumber(v)) && !/^\s+$/
							.test(parseNumber(v)));
		});

function adspromo_setactive(control, element_id, endbled_value, disabled_value)
{
	if (control.value == endbled_value)
	{
		$(element_id).enable();
	}	
	if (control.value == disabled_value)
	{
		$(element_id).selectedIndex = -1;
		$(element_id).disable();
	}	
}

document.observe("dom:loaded", function() {
	AdsPromoAdmin.setShowType(AdsPromoAdmin.show_type);
	AdsPromoAdmin.setImageOpenLink();
	AdsPromoAdmin.setWindowPosition();
	AdsPromoAdmin.setWindowLoaded();
	AdsPromoAdmin.setpercentRange('image_indent_type', 'image_indent');
	AdsPromoAdmin.setpercentRange('window_indent_type', 'window_indent');
});


AdsPromoAdminSettings = Class.create({
	show_type: '1',
	window_hide: null,
	window_hide_options: null,
	window_hide_options_for_window: null,
	image_open_link: null,
	image_open_link_options: null,
	image_open_link_options_for_image: null,
	window_position: null,
	window_position_options: null,
	window_position_options_for_window: null,
	
	initialize:function(data){
	
		if(data && (typeof data.show_type != 'undefined')){
			this.show_type = data.show_type;
		}
		
		if(data && (typeof data.window_hide != 'undefined')){
			this.window_hide = data.window_hide;
		}
		
		if(data && (typeof data.window_hide_options != 'undefined')){
			this.window_hide_options = data.window_hide_options;
		}
		
		if(data && (typeof data.window_hide_options_for_window != 'undefined')){
			this.window_hide_options_for_window = data.window_hide_options_for_window;
		}
				
		if(data && (typeof data.image_open_link != 'undefined')){
			this.image_open_link = data.image_open_link;
		}
				
		if(data && (typeof data.image_open_link_options != 'undefined')){
			this.image_open_link_options = data.image_open_link_options;
		}
		
		if(data && (typeof data.image_open_link_options_for_image != 'undefined')){
			this.image_open_link_options_for_image = data.image_open_link_options_for_image;
		}
				
		if(data && (typeof data.window_position != 'undefined')){
			this.window_position = data.window_position;
		}
		
		if(data && (typeof data.window_position_options != 'undefined')){
			this.window_position_options = data.window_position_options;
		}
		
		if(data && (typeof data.window_position_options_for_window != 'undefined')){
			this.window_position_options_for_window = data.window_position_options_for_window;
		}
		
	},
	
	setShowType:function(show_type){
		
		this.show_type = show_type;
								
		switch (this.show_type)
		{		
			case '2':	//window		
				$$('a[name="image_section"]')[0].up('li').hide();			
				$$('a[name="window_section"]')[0].up('li').show();
				
				$('window_show').up('tr').hide();
				this.changeOptions('window_hide', this.window_hide_options_for_window, this.window_hide);
				this.changeOptions('window_position', this.window_position_options_for_window, this.window_position);
				this.setWindowPosition();
				break;
			case '3':   //image + window
				$$('a[name="image_section"]')[0].up('li').show();			
				$$('a[name="window_section"]')[0].up('li').show();
				
				$('window_show').up('tr').show();
				this.changeOptions('window_hide', this.window_hide_options, this.window_hide);
				this.changeOptions('image_open_link', this.image_open_link_options, this.image_open_link);
				this.setImageOpenLink();
				this.changeOptions('window_position', this.window_position_options, this.window_position);
				this.setWindowPosition();
				break;			
			case '1':
			default:   //image	
				$$('a[name="image_section"]')[0].up('li').show();			
				$$('a[name="window_section"]')[0].up('li').hide();
				
				$('window_show').up('tr').hide();				
				this.changeOptions('image_open_link', this.image_open_link_options_for_image, this.image_open_link);
				this.setImageOpenLink();
				break;								
		}
	},

	setImageOpenLink: function(){
		if ($('image_open_link').value == '2')
		{		
			$('image_open_link_url').value = '';
			$('image_open_link_url').up('tr').hide();
		}
		else
		{
			$('image_open_link_url').up('tr').show();
		}	
	},
	
	setWindowPosition: function(){
		if ($('window_position').value == '0')
		{								
			$('window_indent').value = '0';
			$('window_indent').up('tr').hide();
			$('window_indent_type').up('tr').hide();
		}
		else
		{
			$('window_indent').up('tr').show();
			$('window_indent_type').up('tr').show();
		}	
	},
	
	setWindowLoaded: function(){
		if ($('window_loaded').value == '0')
		{								
			$('window_shows_count').value = '1';
			$('window_shows_count').up('tr').hide();			
			$('window_reset_cookies').value = '1';
			$('window_reset_cookies').up('tr').hide();
		}
		else
		{
			$('window_shows_count').up('tr').show();			
			$('window_reset_cookies').up('tr').show();
		}	
	}, 
	
	changeOptions: function(control_id, data, default_value){
		 var control = $(control_id);
		 if (control)
		 {	 			                		 
			 control.options.length = 0;			     					 
			 data.each(function(option, i) 
             {				                  
				 control.options[control.options.length] = new Option(option.label, option.value, false, option.value == default_value);
			 });	 		     					 
		 }
	},
	
	setpercentRange: function(parent_id, control_id){
		if ($(parent_id).value == '0'){
			$(control_id).addClassName("gomage-validate-number-range-99");
		}else{
			$(control_id).removeClassName("gomage-validate-number-range-99");
		}
	}
	
});	

var blockItems = $H({});

function registerBlockItem(grid, element, checked){	
    if(checked){
        blockItems.set(element.value, 0);        
    }else{
        blockItems.unset(element.value);
    }
    $('product_ids').value = blockItems.keys();
    grid.reloadParams = {'selected_products[]':blockItems.keys()};
}

var tabIndex = 1000;

function BlockItemRowInit(grid, row){
    var checkbox = $(row).getElementsByClassName('checkbox')[0];
    if(checkbox){        
        if (checkbox.checked){
        	blockItems.set(checkbox.value, 0);
        	$('product_ids').value = blockItems.keys();
        	grid.reloadParams = {'selected_products[]':blockItems.keys()};
        }
    }
}

function BlockItemRowClick(grid, event){
    var trElement = Event.findElement(event, 'tr');
    var isInput   = Event.element(event).tagName == 'INPUT';
    if(trElement){
        var checkbox = Element.getElementsBySelector(trElement, 'input');
        if(checkbox[0]){
            var checked = isInput ? checkbox[0].checked : !checkbox[0].checked;
            adspromo_products_gridJsObject.setCheckboxChecked(checkbox[0], checked);
        }
    }
}