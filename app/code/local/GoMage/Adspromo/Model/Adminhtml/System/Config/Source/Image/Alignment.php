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
 * @since        Class available since Release 1.0
 */
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Alignment{

    const LEFT = 0;
    const RIGHT = 1;
    const TOP = 2;
    const BOTTOM = 3;
    const LEFT_TOP_CORNER = 4;
    const LEFT_BOTTOM_CORNER = 5;
    const RIGHT_TOP_CORNER = 6;
    const RIGHT_BOTTOM_CORNER = 7;

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
    	
    	$helper = Mage::helper('gomage_adspromo');
    	
        return array(
            array('value' => self::LEFT, 'label'=>$helper->__('Left')),
            array('value' => self::RIGHT, 'label'=>$helper->__('Right')),
            array('value' => self::TOP, 'label'=>$helper->__('Top')),
            array('value' => self::BOTTOM, 'label'=>$helper->__('Bottom')),
            array('value' => self::LEFT_TOP_CORNER, 'label'=>$helper->__('Left Top Corner')),
            array('value' => self::LEFT_BOTTOM_CORNER, 'label'=>$helper->__('Left Bottom Corner')),
            array('value' => self::RIGHT_TOP_CORNER, 'label'=>$helper->__('Right Top Corner')),
            array('value' => self::RIGHT_BOTTOM_CORNER, 'label'=>$helper->__('Right Bottom Corner')),            
        );
    }

}