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
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Openlink{

     
    const SAME_WINDOW = 0;
    const NEW_WINDOW = 1;
    const PROMO_WINDOW = 2;
   
    /**
     * Options getter
     *
     * @return array
     */
    public static function toOptionArray($for_image = false)
    {
    	
    	$helper = Mage::helper('gomage_adspromo');
    	
    	$options = array();
    	if ($for_image)
    	{
        	$options[] = array('value' => self::SAME_WINDOW, 'label'=>$helper->__('Same Window'));
        	$options[] = array('value' => self::NEW_WINDOW, 'label'=>$helper->__('New Window'));
    	}	
        else
        {
    	   $options[] = array('value' => self::PROMO_WINDOW, 'label'=>$helper->__('Promo Window'));
        }    
        
    	return $options;
    }

}