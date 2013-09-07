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
	
class GoMage_Adspromo_Block_Header extends Mage_Core_Block_Template{
    
    protected $_items = null;
    
    public function __construct()
    {
        parent::__construct();
        $items = $this->getItems();
        if (count($items)){
        	$this->setTemplate('gomage/adspromo/header/styles.phtml');
        } 

    }
    
    public function getItems(){
        
        if (is_null($this->_items)){
            $collection = Mage::getResourceModel('gomage_adspromo/item_collection')
                    		->addFieldToFilter('status', 1);
            
            foreach ($collection as $item){                                              
                if ($item->isActive() && $item->isWindow()){                    
                   $this->_items[] = $item;                                 
                }
            }                   
        }

        return $this->_items;
    }     
}