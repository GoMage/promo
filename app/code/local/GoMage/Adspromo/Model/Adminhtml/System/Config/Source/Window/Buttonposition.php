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
 * @since        Class available since Release 1.1
 */
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Buttonposition{
      
      const LEFT_TOP = 'aap-close-left-top'; 
      const LEFT_BOTTOM = 'aap-close-left-bottom'; 
      const RIGHT_TOP = 'aap-close-right-top'; 
      const RIGHT_BOTTOM = 'aap-close-right-bottom';
        
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
    	$helper = Mage::helper('gomage_adspromo');
    	
        return array(
            array('value' => self::LEFT_TOP, 'label'=>$helper->__('Left Top Corner')),                        
            array('value' => self::LEFT_BOTTOM, 'label'=>$helper->__('Left Bottom Corner')),            
            array('value' => self::RIGHT_TOP, 'label'=>$helper->__('Right Top Corner')),
            array('value' => self::RIGHT_BOTTOM, 'label'=>$helper->__('Right Bottom Corner')),            
        );
    }

}