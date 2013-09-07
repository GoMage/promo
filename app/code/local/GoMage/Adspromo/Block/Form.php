<?php
 /**
 * GoMage Ads & Promo Extension
 *
 * @category     Extension
 * @copyright    Copyright (c) 2010-2011 GoMage (http://www.gomage.com)
 * @author       GoMage
 * @license      http://www.gomage.com/license-agreement/  Single domain license
 * @terms of use http://www.gomage.com/terms-of-use
 * @version      Release: 1.1
 * @since        Class available since Release 1.0
 */
	
class GoMage_Adspromo_Block_Form extends Mage_Core_Block_Template{

    protected $_image_items = null; 
    protected $_window_items = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('gomage/adspromo/form.phtml');
        
        $items = Mage::getResourceModel('gomage_adspromo/item_collection')
                    ->addFieldToFilter('status', 1);
                            
        $this->setAdspromoItems($items);                 
    }
    
    public function getAdspromoImageItems()
    {
         if ($this->_image_items)
           return $this->_image_items;

         $this->_image_items = array();
         
         foreach ($this->getAdspromoItems() as $item)
         {
             if ($item->isActive() && $item->isImage())
             {
                 $this->_image_items[] = $item;
             }    
         } 
         
         return $this->prepareStylesItems($this->_image_items);
    }
    
    public function getAdspromoWindowItems()
    {
         if ($this->_window_items)
           return $this->_window_items;

         $this->_window_items = array();
         
         foreach ($this->getAdspromoItems() as $item)
         {
             if ($item->isActive() && $item->isWindow())
             {
                 $this->_window_items[] = $item;
             }    
         }  
         
         return $this->prepareStylesItems($this->_window_items);
    }
    
    
    public function prepareStylesItems($items)
    {            
        foreach ($items as $item)
        {

           $styles = array();
           $styles_window = array();
            
           switch ($item->getImageAlignment())
           {
               case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Alignment::RIGHT :
                   
                   $styles['right'] = 0;
                   if ($image_indent = $item->getImageIndent())
                   {
                       $styles['top'] = $image_indent . $item->getImageIndentSymbol();
                   }
                   $styles_window['right'] = 0;
                   if ($window_indent = $item->getWindowIndent())
                   {
                       $styles_window['top'] = $window_indent . $item->getWindowIndentSymbol();
                   }
                   if ($item->getImage())
                   {
                       $item->setData('effect_width', $item->getImageWidth());
                       $item->setData('effect_height', $item->getImageHeight());
                       $item->setData('effect_width_hide', 0);
                       $item->setData('effect_height_hide', $item->getImageHeight());
                   }
                   if ($item->getAlternativeImage())
                   {
                       $item->setData('alt_effect_width', $item->getAlternativeImageWidth());
                       $item->setData('alt_effect_height', $item->getAlternativeImageHeight());
                       $item->setData('alt_effect_width_hide', 0);
                       $item->setData('alt_effect_height_hide', $item->getAlternativeImageHeight());
                   }
                   if ($item->isWindow())
                   {
                       $item->setData('window_effect_width', $item->getWindowWidth());
                       $item->setData('window_effect_height', $item->getWindowHeight());
                       $item->setData('window_effect_width_hide', 0);
                       $item->setData('window_effect_height_hide', $item->getWindowWidth());
                   }
                   break;
                   
               case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Alignment::TOP :
                   $styles['top'] = 0;
                   if ($image_indent = $item->getImageIndent())
                   {
                       $styles['left'] = $image_indent . $item->getImageIndentSymbol();
                   }
                   $styles_window['top'] = 0;
                   if ($window_indent = $item->getWindowIndent())
                   {
                       $styles_window['left'] = $window_indent . $item->getWindowIndentSymbol();
                   }                   
                   if ($item->getImage())
                   {
                       $item->setData('effect_width', $item->getImageWidth());
                       $item->setData('effect_height', $item->getImageHeight());
                       $item->setData('effect_width_hide', $item->getImageWidth());
                       $item->setData('effect_height_hide', 0);
                   }
                   if ($item->getAlternativeImage())
                   {
                       $item->setData('alt_effect_width', $item->getAlternativeImageWidth());
                       $item->setData('alt_effect_height', $item->getAlternativeImageHeight());
                       $item->setData('alt_effect_width_hide', $item->getAlternativeImageWidth());
                       $item->setData('alt_effect_height_hide', 0);
                   } 
                   if ($item->isWindow())
                   {
                       $item->setData('window_effect_width', $item->getWindowWidth());
                       $item->setData('window_effect_height', $item->getWindowHeight());
                       $item->setData('window_effect_width_hide', $item->getWindowWidth());
                       $item->setData('window_effect_height_hide', 0);
                   }                   
                   break;
                   
               case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Alignment::BOTTOM :
                   $styles['bottom'] = 0;
                   if ($image_indent = $item->getImageIndent())
                   {
                       $styles['left'] = $image_indent . $item->getImageIndentSymbol();
                   }
                   $styles_window['bottom'] = 0;
                   if ($window_indent = $item->getWindowIndent())
                   {
                       $styles_window['left'] = $window_indent . $item->getWindowIndentSymbol();
                   }  
                   if ($item->getImage())
                   {
                       $item->setData('effect_width', $item->getImageWidth());
                       $item->setData('effect_height', $item->getImageHeight());
                       $item->setData('effect_width_hide', $item->getImageWidth());
                       $item->setData('effect_height_hide', 0);
                   }
                   if ($item->getAlternativeImage())
                   {
                       $item->setData('alt_effect_width', $item->getAlternativeImageWidth());
                       $item->setData('alt_effect_height', $item->getAlternativeImageHeight());
                       $item->setData('alt_effect_width_hide', $item->getAlternativeImageWidth());
                       $item->setData('alt_effect_height_hide', 0);
                   }  
                   if ($item->isWindow())
                   {
                       $item->setData('window_effect_width', $item->getWindowWidth());
                       $item->setData('window_effect_height', $item->getWindowHeight());
                       $item->setData('window_effect_width_hide', $item->getWindowWidth());
                       $item->setData('window_effect_height_hide', 0);
                   }                  
                   break;

               case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Alignment::LEFT_TOP_CORNER :
                   $styles['left'] = 0;
                   $styles['top'] = 0;  
                   $styles_window['left'] = 0;
                   $styles_window['top'] = 0;  
                   if ($item->getImage())
                   {
                       $item->setData('effect_width', $item->getImageWidth());
                       $item->setData('effect_height', $item->getImageHeight());
                       $item->setData('effect_width_hide', 0);
                       $item->setData('effect_height_hide', 0);
                   }
                   if ($item->getAlternativeImage())
                   {
                       $item->setData('alt_effect_width', $item->getAlternativeImageWidth());
                       $item->setData('alt_effect_height', $item->getAlternativeImageHeight());
                       $item->setData('alt_effect_width_hide', 0);
                       $item->setData('alt_effect_height_hide', 0);
                   }  
                   if ($item->isWindow())
                   {
                       $item->setData('window_effect_width', $item->getWindowWidth());
                       $item->setData('window_effect_height', $item->getWindowHeight());
                       $item->setData('window_effect_width_hide', 0);
                       $item->setData('window_effect_height_hide', 0);
                   }              
                   break;

               case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Alignment::LEFT_BOTTOM_CORNER :
                   $styles['left'] = 0;
                   $styles['bottom'] = 0;
                   $styles_window['left'] = 0;
                   $styles_window['bottom'] = 0;
                   if ($item->getImage())
                   {
                       $item->setData('effect_width', $item->getImageWidth());
                       $item->setData('effect_height', $item->getImageHeight());
                       $item->setData('effect_width_hide', 0);
                       $item->setData('effect_height_hide', 0);
                   }
                   if ($item->getAlternativeImage())
                   {
                       $item->setData('alt_effect_width', $item->getAlternativeImageWidth());
                       $item->setData('alt_effect_height', $item->getAlternativeImageHeight());
                       $item->setData('alt_effect_width_hide', 0);
                       $item->setData('alt_effect_height_hide', 0);
                   }                    
                   break;    
                   
               case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Alignment::RIGHT_TOP_CORNER :                    
                   $styles['right'] = 0;
                   $styles['top'] = 0;
                   $styles_window['right'] = 0;
                   $styles_window['top'] = 0;
                   if ($item->getImage())
                   {
                       $item->setData('effect_width', $item->getImageWidth());
                       $item->setData('effect_height', $item->getImageHeight());
                       $item->setData('effect_width_hide', 0);
                       $item->setData('effect_height_hide', 0);
                   }
                   if ($item->getAlternativeImage())
                   {
                       $item->setData('alt_effect_width', $item->getAlternativeImageWidth());
                       $item->setData('alt_effect_height', $item->getAlternativeImageHeight());
                       $item->setData('alt_effect_width_hide', 0);
                       $item->setData('alt_effect_height_hide', 0);
                   }
                   break;

               case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Alignment::RIGHT_BOTTOM_CORNER :                    
                   $styles['right'] = 0;
                   $styles['bottom'] = 0;
                   $styles_window['right'] = 0;
                   $styles_window['bottom'] = 0;
                   if ($item->getImage())
                   {
                       $item->setData('effect_width', $item->getImageWidth());
                       $item->setData('effect_height', $item->getImageHeight());
                       $item->setData('effect_width_hide', 0);
                       $item->setData('effect_height_hide', 0);
                   }
                   if ($item->getAlternativeImage())
                   {
                       $item->setData('alt_effect_width', $item->getAlternativeImageWidth());
                       $item->setData('alt_effect_height', $item->getAlternativeImageHeight());
                       $item->setData('alt_effect_width_hide', 0);
                       $item->setData('alt_effect_height_hide', 0);
                   }
                   break;    

               case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Alignment::LEFT :    
               default:               
                   $styles['left'] = 0;
                   if ($image_indent = $item->getImageIndent())
                   {
                       $styles['top'] = $image_indent . $item->getImageIndentSymbol();
                   }
                   $styles_window['left'] = 0;
                   if ($window_indent = $item->getWindowIndent())
                   {
                       $styles_window['top'] = $window_indent . $item->getWindowIndentSymbol();
                   }
                   if ($item->getImage())
                   {
                       $item->setData('effect_width', $item->getImageWidth());
                       $item->setData('effect_height', $item->getImageHeight());
                       $item->setData('effect_width_hide', 0);
                       $item->setData('effect_height_hide', $item->getImageHeight());
                   }
                   if ($item->getAlternativeImage())
                   {
                       $item->setData('alt_effect_width', $item->getAlternativeImageWidth());
                       $item->setData('alt_effect_height', $item->getAlternativeImageHeight());
                       $item->setData('alt_effect_width_hide', 0);
                       $item->setData('alt_effect_height_hide', $item->getAlternativeImageHeight());
                   }
                  break;
           } 

           foreach ($styles as $key => $value)
           {
               $item->setData($key, $value);
           }
           
           if ($item->getShowType() == GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Show::WINDOW)
           {
               $styles_window = array();
               switch ($item->getWindowPosition())
               {
                   case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Position::LEFT :
                       $styles_window['left'] = 0;
                       if ($window_indent = $item->getWindowIndent())
                       {
                           $styles_window['top'] = $window_indent . $item->getWindowIndentSymbol();
                       }                   
                   break;
                   case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Position::RIGHT :
                       $styles_window['right'] = 0;
                       if ($window_indent = $item->getWindowIndent())
                       {
                           $styles_window['top'] = $window_indent . $item->getWindowIndentSymbol();
                       }
                   break;
                   case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Position::TOP :
                       $styles_window['top'] = 0;
                       if ($window_indent = $item->getWindowIndent())
                       {
                           $styles_window['left'] = $window_indent . $item->getWindowIndentSymbol();
                       }  
                   break;
                   case GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Position::BOTTOM :
                       $styles_window['bottom'] = 0;
                       if ($window_indent = $item->getWindowIndent())
                       {
                           $styles_window['left'] = $window_indent . $item->getWindowIndentSymbol();
                       }                   
                   break;
               }
                          
           }
           
           foreach ($styles_window as $key => $value)
           {
               $item->setData('window_' . $key, $value);
           }
           
           $_style = "";
           $styles['position'] = 'fixed';
           foreach ($styles as $key => $value)
           {
              $_style .= $key . ":" . $value . ";";
           }
                      
           $item->setAdsImageStyles($_style);
            
        }
        
        return $items;
    }
	
    public function getAdsImageConfigs()
    {
        $configs = array();
        
        foreach ($this->getAdspromoImageItems() as $item)
        {
            $key = 'gomage-ads-baseimage-' . $item->getId();
            $configs[$key]['id'] = $item->getId();  
            $configs[$key]['image_effect'] = $item->getImageEffect();
            
            $configs[$key]['effect_width'] = $item->getData('effect_width');
            $configs[$key]['effect_height'] = $item->getData('effect_height');
            $configs[$key]['effect_width_hide'] = $item->getData('effect_width_hide');
            $configs[$key]['effect_height_hide'] = $item->getData('effect_height_hide');
               
            if ($item->getAlternativeImage() || ($item->isWindow() && ($item->getWindowShow() == GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Show::MOUSE_OVER)))
            {                                             
               $configs[$key]['alternative_image_effect'] = $item->getAlternativeImageEffect();
               $configs[$key]['alternative_window'] = $item->isWindow() && ($item->getWindowShow() == GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Show::MOUSE_OVER);
                   
               if ($item->getAlternativeImage())
               {
                   $configs[$key]['alt_effect_width'] = $item->getData('alt_effect_width');
                   $configs[$key]['alt_effect_height'] = $item->getData('alt_effect_height');
                   $configs[$key]['alt_effect_width_hide'] = $item->getData('alt_effect_width_hide');
                   $configs[$key]['alt_effect_height_hide'] = $item->getData('alt_effect_height_hide');
               }
               
            }
        } 

        return Mage::helper('core')->jsonEncode($configs);
    }
    
    public function getAdsWindowConfigs()
    {
        $configs = array();        
        $processor = Mage::helper('cms')->getBlockTemplateProcessor();
        
        foreach ($this->getAdspromoWindowItems() as $item)
        {            
           $key = 'gomage-ads-window-' . $item->getId();
           $configs[$key]['id'] = $item->getId();  
           $configs[$key]['title'] = $this->stripTags($item->getTitle(), null, true);
           $configs[$key]['window_loaded'] = $item->getWindowLoaded();
           $configs[$key]['window_show'] = $item->getWindowShow();
           $configs[$key]['window_hide'] = $item->getWindowHide();
           $configs[$key]['window_close_selected'] = $item->getWindowCloseSelected();
           $configs[$key]['window_position'] = $item->getWindowPosition();
           $configs[$key]['window_width'] = $item->getWindowWidth() + intval($item->getWindowBorderSize())*2 + intval($item->getWindowIndentText())*2;
           $configs[$key]['window_border_size'] = intval($item->getWindowBorderSize())*2 + intval($item->getWindowIndentText())*2;
           $configs[$key]['window_height_type'] = $item->getWindowHeightType();
           $configs[$key]['window_height'] = $item->getWindowHeight()+ intval($item->getWindowBorderSize())*2 + intval($item->getWindowIndentText())*2;           
           $configs[$key]['window_backgroundview'] = ($item->getWindowBackgroundview() ? 1 : null);                                                                                        
           $configs[$key]['window_content'] = $processor->filter($item->getWindowContent());
           
           $configs[$key]['top'] = $item->getWindowTop();
           $configs[$key]['right'] = $item->getWindowRight();
           $configs[$key]['bottom'] = $item->getWindowBottom();
           $configs[$key]['left'] = $item->getWindowLeft();

           $configs[$key]['window_timer'] = null;
           $configs[$key]['image_exists'] = $item->isImage();
           $configs[$key]['window_effect'] = $item->getWindowEffect();
           $configs[$key]['window_button_position'] = $item->getWindowButtonPosition();
           $configs[$key]['image_button_color'] = $item->getImageButtonColor();
           
           $configs[$key]['image_alignment'] = $item->getImageAlignment();           
           $configs[$key]['only_window'] = ($item->getShowType() == GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Show::WINDOW ? 1 : 0);
                      
           if ($this->getCookie()->get() && $item->getWindowLoaded() == 1){
           		$shows_count = intval($this->getCookie()->get($key));
           		$window_shows_count = intval($item->getWindowShowsCount());
           		if ($shows_count && ($shows_count >= $window_shows_count)){
           			$configs[$key]['window_loaded'] = 0;
           		}           		
           }                       
        } 
        
        return Mage::helper('core')->jsonEncode($configs);
    }
    
    public function getCookie()
    {
        return Mage::getSingleton('core/cookie');
    } 
    
}