<?php
 /**
 * GoMage Ads & Promo Extension
 *
 * @category     Extension
 * @copyright    Copyright (c) 2010-2011 GoMage (http://www.gomage.com)
 * @author       GoMage
 * @license      http://www.gomage.com/license-agreement/  Single domain license
 * @terms of use http://www.gomage.com/terms-of-use
 * @version      Release: 1.0
 * @since        Class available since Release 1.0
 */

class GoMage_Adspromo_Model_Item extends Mage_Core_Model_Abstract
{
			
    public function _construct()
    {
        parent::_construct();
        $this->_init('gomage_adspromo/item');
    }
    
    public function getBaseImageUrl()
    {
       if ($image = $this->getImage())
       { 
           $path_info = pathinfo($image);        
           $cache_name = $path_info['filename'] . '_' . $this->getData('image_width') . '_' . $this->getData('image_height') . '.' . $path_info['extension'];
                      
           if (file_exists(Mage::getBaseDir ( 'media' ) . DS . "adspromo" . DS . "cache" . DS . $cache_name))
           {
               return Mage::getBaseUrl('media') . 'adspromo/cache/' . $cache_name; 
           }
           else
           {
               return Mage::getBaseUrl('media') . 'adspromo/' . $image;
           }        
       }
    }
    
    public function getAlternativeImageUrl()
    {
       if ($image = $this->getAlternativeImage())
       { 
           $path_info = pathinfo($image);        
           $cache_name = $path_info['filename'] . '_' . $this->getData('alternative_image_width') . '_' . $this->getData('alternative_image_height') . '.' . $path_info['extension'];
                      
           if (file_exists(Mage::getBaseDir ( 'media' ) . DS . "adspromo" . DS . "cache" . DS . $cache_name))
           {
               return Mage::getBaseUrl('media') . 'adspromo/cache/' . $cache_name; 
           }
           else
           {
               return Mage::getBaseUrl('media') . 'adspromo/' . $image;
           }        
       }
    }
    
    public function isImage()
    {
        return ($this->getShow() != GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Show::WINDOW);
    }
    
    public function isWindow()
    {
        return ($this->getShow() != GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Show::IMAGE);
    }
    
    public function isActive()
    {   
        $h = Mage::helper('gomage_adspromo');
		if(!in_array(Mage::app()->getStore()->getWebsiteId(), $h->getAvailavelWebsites())) return false;
				             
        if ($this->getStartDate() && (strtotime($this->getStartDate()) > strtotime(Mage::getModel('core/date')->gmtDate('Y-m-d'))) )
            return false;

        if ($this->getEndDate() && (strtotime($this->getEndDate()) < strtotime(Mage::getModel('core/date')->gmtDate('Y-m-d'))) )
            return false;
            
        if (!in_array(Mage::app()->getStore()->getId(), explode(',', $this->getStoreIds())))
            return false;  

        if (($this->getPageApplayTo() == GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Page_Applayto::SELECTED_PAGES)
             && !Mage::registry('current_category') )
        {          
              if (!$this->getPages()) return false;     
              
              $pages = explode(',', $this->getPages());
              if (Mage::app()->getFrontController()->getRequest()->getRequestedRouteName() == 'cms')
              {
                  if (!in_array(Mage::getSingleton('cms/page')->getIdentifier(), $pages))
                      return false;
              }
              else 
              {
                  if (!(in_array(Mage::app()->getFrontController()->getRequest()->getRequestedRouteName(), $pages)
                      || in_array(Mage::app()->getFrontController()->getRequest()->getRequestedControllerName(), $pages)))
                      return false;
              }
                
        }

        if (($this->getCatApplayTo() == GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Category_Applayto::SELECTED_CATEGORIES)
             && Mage::registry('current_category') )
        {          
              if (!$this->getCategories()) return false;                

              $categories = explode(',', $this->getCategories());
              if (!in_array(Mage::registry('current_category')->getId(), $categories))
                  return false;
        }
                
        return true;
    }
    
    public function getImageWidth()
    {
        if  ($this->getData('image_width')) 
           return $this->getData('image_width');

        if ($image = $this->getImage())
        { 
           $path_info = pathinfo($image);        
           $cache_name = $path_info['filename'] . '_' . $this->getData('image_width') . '_' . $this->getData('image_height') . '.' . $path_info['extension'];
           $cache_name = Mage::getBaseDir ( 'media' ) . DS . "adspromo" . DS . "cache" . DS . $cache_name; 
           $image = Mage::getBaseDir ( 'media' ) . DS . "adspromo" . DS . $image;
           if (file_exists($cache_name))
               $imageObj = new Varien_Image ($cache_name);
           else
               $imageObj = new Varien_Image ($image);
                      
           return $imageObj->getOriginalWidth();        
        }

        return 0;
    }
    
    public function getImageHeight()
    {
        if  ($this->getData('image_height')) 
           return $this->getData('image_height');

        if ($image = $this->getImage())
        { 
           $path_info = pathinfo($image);        
           $cache_name = $path_info['filename'] . '_' . $this->getData('image_width') . '_' . $this->getData('image_height') . '.' . $path_info['extension'];
           $cache_name = Mage::getBaseDir ( 'media' ) . DS . "adspromo" . DS . "cache" . DS . $cache_name; 
           $image = Mage::getBaseDir ( 'media' ) . DS . "adspromo" . DS . $image;
           if (file_exists($cache_name))
               $imageObj = new Varien_Image ($cache_name);
           else
               $imageObj = new Varien_Image ($image);
               
           return $imageObj->getOriginalHeight();        
        }

        return 0;
    }
    
    public function getAlternativeImageWidth()
    {
        if  ($this->getData('alternative_image_width')) 
           return $this->getData('alternative_image_width');

        if ($image = $this->getAlternativeImage())
        { 
           $path_info = pathinfo($image);        
           $cache_name = $path_info['filename'] . '_' . $this->getData('alternative_image_width') . '_' . $this->getData('alternative_image_height') . '.' . $path_info['extension'];
           $cache_name = Mage::getBaseDir ( 'media' ) . DS . "adspromo" . DS . "cache" . DS . $cache_name; 
           $image = Mage::getBaseDir ( 'media' ) . DS . "adspromo" . DS . $image;
           if (file_exists($cache_name))
               $imageObj = new Varien_Image ($cache_name);
           else
               $imageObj = new Varien_Image ($image);
                          
           return $imageObj->getOriginalWidth();        
        }

        return 0;    
    }
    
    public function getAlternativeImageHeight()
    {
        if  ($this->getData('alternative_image_height')) 
           return $this->getData('alternative_image_height');

        if ($image = $this->getAlternativeImage())
        { 
           $path_info = pathinfo($image);        
           $cache_name = $path_info['filename'] . '_' . $this->getData('alternative_image_width') . '_' . $this->getData('alternative_image_height') . '.' . $path_info['extension'];
           $cache_name = Mage::getBaseDir ( 'media' ) . DS . "adspromo" . DS . "cache" . DS . $cache_name; 
           $image = Mage::getBaseDir ( 'media' ) . DS . "adspromo" . DS . $image;
           if (file_exists($cache_name))
               $imageObj = new Varien_Image ($cache_name);
           else
               $imageObj = new Varien_Image ($image);
                          
           return $imageObj->getOriginalHeight();        
        }

        return 0;    
    }
            
}


