document.observe("dom:loaded", function() {
  $$('img.gomage-ads-baseimage').invoke('observe', 'mouseover', baseImageHide);  
  $$('img.gomage-ads-alternativeimage').invoke('observe', 'mouseout', baseImageShow);  
  AdsCreateWindows();
});


function createImageEffect(image, effect, show, key, base)
{
	if (show)
	{
		switch (effect)
		{
			case '0':
				
			break;	
		  	case '1':
		  		new Effect.Appear(image.id);
		  	break;		  	
		  	case '2':
		  		new Effect.BlindDown(image.id);	
		  	break;
		  	case '4':		  				  		
		  		image.show();
		  	break;
		  	case '5':		  				  		
		  		new Effect.Grow(image.id);
		  	break;
		  	case '6':
		  		var _w = 0;
		  		var _h = 0;
		  		if (base)
		  		{
		  			_w = gomage_image_configs[key]['effect_width'];
		  			_h = gomage_image_configs[key]['effect_height'];
		  		}	
		  		else
		  		{
		  			_w = gomage_image_configs[key]['alt_effect_width'];
		  			_h = gomage_image_configs[key]['alt_effect_height'];
		  		}	
		  		new Effect.Morph(image.id, {
		  			style: {
		  			width: _w + 'px',
		  			height: _h + 'px'
		  			},
		  			beforeStart: function(){		  				
		  				if (base)
		  				{
		  					image.setStyle({
			  					width: gomage_image_configs[key]['effect_width_hide'] + 'px',
					  			height: gomage_image_configs[key]['effect_height_hide'] + 'px'
			  				});
		  				}	
		  				else
		  				{
		  					image.setStyle({
			  					width: gomage_image_configs[key]['alt_effect_width_hide'] + 'px',
					  			height: gomage_image_configs[key]['alt_effect_height_hide'] + 'px'
			  				});
		  				}	
		  				image.show();		  				
		  			}, 
	  			    afterFinish: function(){} 
		  			});
		  	break;
	   		
		}
	}			
}

function baseImageHide(event)
{	
	var baseimage = Event.element(event);
	var alternativeimage = $(baseimage).up('div.gomage-ads-image-container').select('img.gomage-ads-alternativeimage')[0];
		
	if (gomage_image_configs[baseimage.id])
	{			
		
		if (gomage_image_configs[baseimage.id]['alternative_window'])
		{
			var alternativewindow_id = 'gomage-ads-window-' + gomage_image_configs[baseimage.id]['id'];
										
			switch (gomage_image_configs[baseimage.id]['image_effect'])
			{
				case '0': 
					ShowAdsWindow(alternativewindow_id);
				break;	
			  	case '1':
			  		new Effect.Fade(baseimage.id, {beforeStart: function(){}, afterFinish: function(){ ShowAdsWindow(alternativewindow_id) } });
			  	break;		  	
			  	case '2':
			  		new Effect.BlindUp(baseimage.id, {beforeStart: function(){}, afterFinish: function(){ ShowAdsWindow(alternativewindow_id) } });
			  	break;			
			  	case '4':		  		
			  		baseimage.hide();
			  		ShowAdsWindow(alternativewindow_id);
			  	break;
			  	case '5':
			  		new Effect.Shrink(baseimage.id, {beforeStart: function(){}, afterFinish: function(){ ShowAdsWindow(alternativewindow_id) } });			  		
			  	break;
			  	case '6':
			  		new Effect.Morph(baseimage.id, 
			  			{
				  		  style: {
				  			width: gomage_image_configs[baseimage.id]['effect_width_hide'] + 'px',
				  			height: gomage_image_configs[baseimage.id]['effect_height_hide'] + 'px'
				  		  },		
			  			  beforeStart: function(){}, 
			  			  afterFinish: function(){
			  				baseimage.hide();
			  				baseimage.setStyle({
			  					width: gomage_image_configs[baseimage.id]['effect_width'] + 'px',
					  			height: gomage_image_configs[baseimage.id]['effect_height'] + 'px'
			  				});
			  				ShowAdsWindow(alternativewindow_id);
			  			  } 
			  			});
			  	break;
		   		
			}
		}	
		else if (alternativeimage)
		{	
			switch (gomage_image_configs[baseimage.id]['image_effect'])
			{
				case '0':
					createImageEffect(alternativeimage, gomage_image_configs[baseimage.id]['alternative_image_effect'], true, baseimage.id, false);
				break;	
			  	case '1':
			  		new Effect.Fade(baseimage.id, 
		  				{
		  			      beforeStart: function(){}, 
		  			      afterFinish: function(){ 
		  			    	createImageEffect(alternativeimage, gomage_image_configs[baseimage.id]['alternative_image_effect'], true, baseimage.id, false); 
		  			      }
		  			    });
			  	break;		  	
			  	case '2':
			  		new Effect.BlindUp(baseimage.id, 
			  			{
			  			  beforeStart: function(){}, 
			  			  afterFinish: function(){ 
			  				createImageEffect(alternativeimage, gomage_image_configs[baseimage.id]['alternative_image_effect'], true, baseimage.id, false);
			  			  } 
			  			});
			  	break;			  	
			  	case '4':		  		
			  		baseimage.hide();
			  		createImageEffect(alternativeimage, gomage_image_configs[baseimage.id]['alternative_image_effect'], true, baseimage.id, false);
			  	break;
			  	case '5':
			  		new Effect.Shrink(baseimage.id, 
			  			{
			  			  beforeStart: function(){}, 
			  			  afterFinish: function(){ 
			  				createImageEffect(alternativeimage, gomage_image_configs[baseimage.id]['alternative_image_effect'], true, baseimage.id, false);
			  			  } 
			  			});
			  	break;
			  	case '6':
			  		new Effect.Morph(baseimage.id, 
			  			{
				  		  style: {
				  			width: gomage_image_configs[baseimage.id]['effect_width_hide'] + 'px',
				  			height: gomage_image_configs[baseimage.id]['effect_height_hide'] + 'px'
				  		  },		
			  			  beforeStart: function(){}, 
			  			  afterFinish: function(){
			  				baseimage.hide();
			  				baseimage.setStyle({
			  					width: gomage_image_configs[baseimage.id]['effect_width'] + 'px',
					  			height: gomage_image_configs[baseimage.id]['effect_height'] + 'px'
			  				});
			  				createImageEffect(alternativeimage, gomage_image_configs[baseimage.id]['alternative_image_effect'], true, baseimage.id, false);
			  			  } 
			  			});
			  	break;
		   		
			}
		}
	}	
	
}

function baseImageShow(event)
{
	var alternativeimage = Event.element(event);
	var baseimage = $(alternativeimage).up('div.gomage-ads-image-container').select('img.gomage-ads-baseimage')[0];
	
	if (gomage_image_configs[baseimage.id])
	{	
		switch (gomage_image_configs[baseimage.id]['alternative_image_effect'])
		{
			case '0':
				createImageEffect(baseimage, gomage_image_configs[baseimage.id]['image_effect'], true, baseimage.id, true);
			break;
		  	case '1':
		  		new Effect.Fade(alternativeimage.id, 
		  				{
		  			      beforeStart: function(){}, 
		  			      afterFinish: function(){ 
		  			    	createImageEffect(baseimage, gomage_image_configs[baseimage.id]['image_effect'], true, baseimage.id, true); 
		  			      }
		  			    });
		  	break;		  	
		  	case '2':
		  		new Effect.BlindUp(alternativeimage.id, 
		  			{
		  			   beforeStart: function(){}, 
		  			   afterFinish: function(){ 
		  				 createImageEffect(baseimage, gomage_image_configs[baseimage.id]['image_effect'], true, baseimage.id, true);
		  			   } 
		  			});
		  	break;		  	
		  	case '4':
		  		alternativeimage.hide();
		  		createImageEffect(baseimage, gomage_image_configs[baseimage.id]['image_effect'], true, baseimage.id, true);
		  	break;	
		  	case '5':
		  		new Effect.Shrink(alternativeimage.id, 
		  			{
		  			   beforeStart: function(){}, 
		  			   afterFinish: function(){ 
		  				 createImageEffect(baseimage, gomage_image_configs[baseimage.id]['image_effect'], true, baseimage.id, true);
		  			   } 
		  			});
		  	break;
		  	case '6':
		  		new Effect.Morph(alternativeimage.id, 
		  			{
			  		   style: {
			  			width: gomage_image_configs[baseimage.id]['alt_effect_width_hide'] + 'px',
			  			height: gomage_image_configs[baseimage.id]['alt_effect_height_hide'] + 'px'
			  		   },	
		  			   beforeStart: function(){}, 
		  			   afterFinish: function(){ 
		  				 alternativeimage.hide();
		  				 alternativeimage.setStyle({
			  					width: gomage_image_configs[baseimage.id]['alt_effect_width'] + 'px',
					  			height: gomage_image_configs[baseimage.id]['alt_effect_height'] + 'px'
			  			 });  
		  				 createImageEffect(baseimage, gomage_image_configs[baseimage.id]['image_effect'], true, baseimage.id, true);
		  			   } 
		  			});
		  	break;
		}		
	}	
}

function getAdsWindowEffect(show, effect)
{	
	switch (effect)
	{
	  	case '1':
	  		return (show ? Effect.Appear : Effect.Fade);	  		
	  	break;		  	
	  	case '2':
	  		return (show ? Effect.BlindDown : Effect.BlindUp);	  		
	  	break;	  	
	  	case '5':
	  		return (show ? Effect.Grow : Effect.Shrink);	  
	  	break;
	  	case '6':
	  		return (show ? Effect.SlideDown : Effect.SlideUp);
	  	break;	
	  	default:
	  		return (show ? Element.show : Element.hide);	
	}	
	
}

function getAdsWindowEffectOptions(show, effect, key)
{
	if (effect == '6' && gomage_window_configs[key]['window_position'] != '0')
	{
		if (gomage_window_configs[key]['only_window'] == '1')
		{
			switch (gomage_window_configs[key]['window_position'])
			{
				case '2':
				case '3':	
					return {scaleY: false, scaleX: true};
				break;
				default:
					return {scaleY: true, scaleX: false};		
			}
		}	
		else
		{	
			switch (gomage_window_configs[key]['image_alignment'])
			{
				case '0':
				case '1':
					return {scaleY: false, scaleX: true};
				break;
				case '2':
				case '3':
					return {scaleY: true, scaleX: false};
				break;
				default:
					return {scaleY: true, scaleX: true};		
			}
		}
	}
	else
	{
		return {};
	}	
	
}

function AdsCreateWindows()
{	
	for (var key in gomage_window_configs) 
	{		
		var tmp_win = new Window(key, 
				{ads_id: gomage_window_configs[key]['id'],
			     className: "gomage_aap",
			     additionClass: (gomage_window_configs[key]['window_position'] == '0' ? "" : "gomage_aap_dialog_not_center"),
			     Buttoncolor: gomage_window_configs[key]['image_button_color'],
			     title: gomage_window_configs[key]['title'], 
			     width: gomage_window_configs[key]['window_width'], 
			     height: gomage_window_configs[key]['window_height'], 
			     top: (gomage_window_configs[key]['top'] != null ? gomage_window_configs[key]['top'] : undefined), 
			     right: (gomage_window_configs[key]['right'] != null ? gomage_window_configs[key]['right'] : undefined),
			     bottom: (gomage_window_configs[key]['bottom'] != null ? gomage_window_configs[key]['bottom'] : undefined), 
			     left: (gomage_window_configs[key]['left'] != null ? gomage_window_configs[key]['left'] : undefined),
			     showEffect: getAdsWindowEffect(true, gomage_window_configs[key]['window_effect']),
			     hideEffect: getAdsWindowEffect(false, gomage_window_configs[key]['window_effect']),
			     showEffectOptions: getAdsWindowEffectOptions(true, gomage_window_configs[key]['window_effect'], key),
			     hideEffectOptions: getAdsWindowEffectOptions(false, gomage_window_configs[key]['window_effect'], key)
		}); 
		tmp_win.getContent().innerHTML = gomage_window_configs[key]['window_content'];				
		
		if (gomage_window_configs[key]['window_loaded'] == '1')
		{	
			if ($('gomage-ads-baseimage-' + gomage_window_configs[key]['id']))
			{	
				$('gomage-ads-baseimage-' + gomage_window_configs[key]['id']).hide();
			}	
			if (gomage_window_configs[key]['window_position'] == '0')
				tmp_win.showCenter(gomage_window_configs[key]['window_backgroundview']);
			else	
				tmp_win.show(gomage_window_configs[key]['window_backgroundview']);
		}
		
		if (gomage_window_configs[key]['window_hide'] == '1')
		{		
			
			tmp_win.element.onmouseout = function(){ 				 		
				    						if (gomage_window_configs[this.id])
				    						{	
				    							gomage_window_configs[this.id]['window_timer'] = setTimeout(HideAdsWindow, 100);
				    						}	
			                             };
			                             
			tmp_win.element.onmouseover = function(){ 							
											if (gomage_window_configs[this.id])
											{	
												clearTimeout(gomage_window_configs[this.id]['window_timer']);
											}	
			                             };				
		}
		
		if (gomage_window_configs[key]['image_exists'])
		{
			tmp_win.options.onClose = function()
			{				
				baseimage = $('gomage-ads-baseimage-' + this.ads_id);
				if (gomage_image_configs[baseimage.id])
				{	
					switch (gomage_image_configs[baseimage.id]['image_effect'])
					{
						case '0':
							 baseimage.show();		
						break;	
					  	case '1':
					  		 new Effect.Appear(baseimage.id);
					  	break;		  	
					  	case '2':
					  		 new Effect.BlindDown(baseimage.id);
					  	break;					  	
					  	case '4':		  		
					  		 baseimage.show();
					  	break;
					  	case '5':
					  		 new Effect.Grow(baseimage.id);
					  	break;
					  	case '6':
					  		createImageEffect(baseimage, gomage_image_configs[baseimage.id]['image_effect'], true, baseimage.id, true);
					  	break;					  	
					}		
				}
				
			};	
		}	
		
	}	
}

var timer = null;


function HideAdsWindow()
{
	Windows.windows.each( 
			function(w) 
			{
				if (w.getId() && w.isVisible())
				{							
					if (gomage_window_configs[w.getId()]['window_timer'])
					{
						gomage_window_configs[w.getId()]['window_timer'] = false;
						Windows.close(w.getId());						
					}	
				}	
			} 
	);
}


function ShowAdsWindow(id)
{
	var win = Windows.getWindow(id);
	if (win)
	{		
		if (!win.isVisible())
		{
			Windows.windows.each( 
					function(w) 
					{
						if ((w.getId() != id) && w.isVisible())
						{							
							if (gomage_window_configs[w.getId()]['window_close_selected'] == '1')
							{
								Windows.close(w.getId());
							}	
						}	
					} 
			);
			
			if (gomage_window_configs[id]['window_position'] == '0')
				win.showCenter(gomage_window_configs[id]['window_backgroundview']);
			else	
				win.show(gomage_window_configs[id]['window_backgroundview']);		
		}	
	}		
}