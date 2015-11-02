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
	
class GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Category_Categories{

    
    public function toOptionArray($store_ids, $addEmpty = true)
    {
        $options = array();

        if ($addEmpty) {
            $options[] = array(
                'label' => '',
                'value' => '0'
            );
        }        
        
        $store_ids = explode(',', $store_ids);
        
        foreach ($store_ids as $store_id)
        {
            $collection = Mage::getModel('catalog/category')->getCollection()
                            ->setStoreId($store_id)                       
                            ->addAttributeToSelect('name'); 
    
                            
            $_root_category = Mage::getModel('core/store')->load($store_id)->getRootCategoryId();
                    
            $_root_level = Mage::getModel('catalog/category')->load($_root_category)->getLevel();                
                            
            $collection->addFieldToFilter(array(
                    array('attribute'=>'level', 'gt'=>$_root_level)                            
            ));                 
    
            foreach ($collection as $category) {
                
                if (!isset($options[$category->getId()]))
                {
                    $options[$category->getId()] = array(
                       'label' => $category->getName(),
                       'value' => $category->getId()
                    );
                }
                
            }
        }
        
        

        return $options;
    }

}