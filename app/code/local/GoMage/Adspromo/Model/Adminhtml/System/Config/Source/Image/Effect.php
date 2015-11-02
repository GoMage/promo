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
 * @since        Class available since Release 1.0
 */
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Effect{

    const NONE = 0;
    const DEF = 4;
    const APPEAR = 1;    
    const BLIND = 2;    
    const GROW = 5;
    const MORPH = 6;
   

    public function toOptionArray($with_no = false)
    {
    	
    	$helper = Mage::helper('gomage_adspromo');
    	
    	$options = array();
    	if ($with_no)
    	{
    	    $options[] = array('value' => self::NONE, 'label'=>$helper->__('No')); 
    	}
    	
    	$options[] = array('value' => self::DEF, 'label'=>$helper->__('Default'));
    	$options[] = array('value' => self::APPEAR, 'label'=>$helper->__('Appear'));
    	$options[] = array('value' => self::BLIND, 'label'=>$helper->__('Blind'));    	 
    	$options[] = array('value' => self::GROW, 'label'=>$helper->__('Grow'));  
    	$options[] = array('value' => self::MORPH, 'label'=>$helper->__('Morph'));
    	
        return $options;
    }

}