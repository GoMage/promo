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
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Effect{
    
    const DEF = 4;
    const APPEAR = 1;    
    const BLIND = 2;    
    const GROW = 5;
    const MORPH = 6;
   

    public function toOptionArray()
    {
    	
    	$helper = Mage::helper('gomage_adspromo');
    	
        return array(                  
            array('value' => self::DEF, 'label'=>$helper->__('Default')),                  
            array('value' => self::APPEAR, 'label'=>$helper->__('Appear')),            
            array('value' => self::BLIND, 'label'=>$helper->__('Blind')),            
            array('value' => self::GROW, 'label'=>$helper->__('Grow')),
            array('value' => self::MORPH, 'label'=>$helper->__('Morph')),
        );
    }

}