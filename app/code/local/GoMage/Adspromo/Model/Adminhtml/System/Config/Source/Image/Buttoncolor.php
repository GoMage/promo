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
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Buttoncolor{

      const BLACK = 'black'; 
      const BLUE = 'blue'; 
      const BROWN = 'brown'; 
      const GRAY = 'gray';
      const GREEN = 'green';
      const LIGHT_BLUE = 'light_blue'; 
      const LIGHT_GREEN = 'light_green';
      const ORANGE = 'orange'; 
      const RED = 'red';
      const PINK = 'pink'; 
      const VIOLET = 'violet';
      const YELLOW = 'yellow'; 
        
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
    	$helper = Mage::helper('gomage_adspromo');
    	
        return array(
            array('value' => self::BLACK, 'label'=>$helper->__('Black')),                        
            array('value' => self::BLUE, 'label'=>$helper->__('Blue')),            
            array('value' => self::BROWN, 'label'=>$helper->__('Brown')),
            array('value' => self::GRAY, 'label'=>$helper->__('Gray')),
            array('value' => self::GREEN, 'label'=>$helper->__('Green')),
            array('value' => self::LIGHT_BLUE, 'label'=>$helper->__('Light-Blue')),
            array('value' => self::LIGHT_GREEN, 'label'=>$helper->__('Light-Green')),
            array('value' => self::ORANGE, 'label'=>$helper->__('Orange')),
            array('value' => self::RED, 'label'=>$helper->__('Red')),
            array('value' => self::PINK, 'label'=>$helper->__('Pink')),
            array('value' => self::VIOLET, 'label'=>$helper->__('Violet')),
            array('value' => self::YELLOW, 'label'=>$helper->__('Yellow')),
        );
    }

}