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
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Position{

    
    const CENTER = 0;
    const WITH_PROMO_IMAGE = 1;
    const LEFT = 2;
    const RIGHT = 3;
    const TOP = 4;
    const BOTTOM = 5;
    /**
     * Options getter
     *
     * @return array
     */
    public static function toOptionArray($for_window = false)
    {
    	
    	$helper = Mage::helper('gomage_adspromo');
    	
    	$options = array();
    	$options[] = array('value' => self::CENTER, 'label'=>$helper->__('Center'));
    	
    	if ($for_window)
    	{
    	    $options[] = array('value' => self::LEFT, 'label'=>$helper->__('Left'));
            $options[] = array('value' => self::RIGHT, 'label'=>$helper->__('Right'));
            $options[] = array('value' => self::TOP, 'label'=>$helper->__('Top'));
            $options[] = array('value' => self::BOTTOM, 'label'=>$helper->__('Bottom'));
    	}
    	else 
    	{
    	    $options[] = array('value' => self::WITH_PROMO_IMAGE, 'label'=>$helper->__('With Promo Image'));
    	}    
    	
        return $options;
    }

}

