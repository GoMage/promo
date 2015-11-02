<?php
 /**
 * GoMage Ads & Promo Extension
 *
 * @category     Extension
 * @copyright    Copyright (c) 2010-2015 GoMage (http://www.gomage.com)
 * @author       GoMage
 * @license      http://www.gomage.com/license-agreement/  Single domain license
 * @terms of use http://www.gomage.com/terms-of-use
 * @version      Release: 1.3
 * @since        Class available since Release 1.1
 */

class GoMage_Adspromo_IndexController extends Mage_Core_Controller_Front_Action
{       
    public function clickAction(){        
        $result = array();    
        if ($id = $this->getRequest()->getParam('id')){
        	$item = Mage::getModel('gomage_adspromo/item')->load($id);
        	
        	if (!$this->getRequest()->getParam('is_window')){
	        	$result['url'] = $item->getImageOpenLinkUrl();
	        	$result['new_window'] = ($item->getImageOpenLink() == GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Openlink::NEW_WINDOW);	        	
        	}else{
        		if ($this->getCookie()->get() && $item->isWindow() && $item->getWindowLoaded() == 1){
	        		$key = 'gomage-ads-window-' . $item->getId();
           			$shows_count = intval($this->getCookie()->get($key));
	        		$shows_count++;
	        		$window_reset = intval($item->getWindowResetCookies());
	        		if ($window_reset){
	        			$this->getCookie()->set($key, $shows_count, 3600 * 24 * $window_reset);
	        		}else{
	        			$this->getCookie()->set($key, $shows_count, true);
	        		}
	        	}
        	}

        	$item->setData('image_clicks', intval($item->getData('image_clicks')) + 1);
        	$item->save();
        	
        }
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));
    }
    
    public function getCookie()
    {
        return Mage::getSingleton('core/cookie');
    } 
}
