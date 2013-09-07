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
 * @since        Class available since Release 1.1
 */
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Heighttype{
    
    const MANUALLY = 0;
    const AUTOMATICALLY = 1;
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
    	
    	$helper = Mage::helper('gomage_adspromo');
    	
        return array(
            array('value' => self::MANUALLY, 'label'=>$helper->__('Manually')),
            array('value' => self::AUTOMATICALLY, 'label'=>$helper->__('Automatically')),            
        );
    }

}
