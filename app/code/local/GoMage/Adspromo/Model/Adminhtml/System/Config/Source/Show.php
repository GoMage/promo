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
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Show{

    
    const IMAGE = 1;
    const WINDOW = 2;
    const IMAGE_AND_WINDOW = 3;
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
    	
    	$helper = Mage::helper('gomage_adspromo');
    	
        return array(
            array('value' => self::IMAGE, 'label'=>$helper->__('Promo Image')),
            array('value' => self::WINDOW, 'label'=>$helper->__('Promo Window')),
            array('value' => self::IMAGE_AND_WINDOW, 'label'=>$helper->__('Promo Image and Window')),
        );
    }

}