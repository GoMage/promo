<?php
 /**
 * GoMage Ads & Promo Extension
 *
 * @category     Extension
 * @copyright    Copyright (c) 2010-2015 GoMage (http://www.gomage.com)
 * @author       GoMage
 * @license      http://www.gomage.com/license-agreement/  Single domain license
 * @terms of use http://www.gomage.com/terms-of-use
 * @version      Release: 1.2
 * @since        Class available since Release 1.0
 */
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Hide{

    
    const CLOSE_BUTTON = 0;
    const MOUSE_OUT = 1; 
   
    public static function toOptionArray($for_window = false)
    {
    	
    	$helper = Mage::helper('gomage_adspromo');
    	
    	$options = array();
    	$options[] = array('value' => self::CLOSE_BUTTON, 'label'=>$helper->__('Close Button'));
    	if (!$for_window)
    	    $options[] = array('value' => self::MOUSE_OUT, 'label'=>$helper->__('Mouse Out'));
    	 
        return $options;
    }

}
