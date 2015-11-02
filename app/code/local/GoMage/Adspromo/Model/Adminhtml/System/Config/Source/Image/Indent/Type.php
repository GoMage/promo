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
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Indent_Type{

    const PERCENT = 0;
    const PIXELS  = 1;
    
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
    	
    	$helper = Mage::helper('gomage_adspromo');
    	
        return array(
            array('value' => self::PERCENT, 'label'=>$helper->__('Percent')),
            array('value' => self::PIXELS, 'label'=>$helper->__('Pixels')),                        
        );
    }

}