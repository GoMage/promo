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
 * @since        Class available since Release 1.0
 */

class GoMage_Adspromo_Block_Adminhtml_Items_Edit_Tab_Advanced extends Mage_Adminhtml_Block_Widget_Form
{
	
	
    protected function _prepareForm()
    {
        
        $form = new Varien_Data_Form();
        
        if(Mage::registry('gomage_adspromo')){
        	$item = Mage::registry('gomage_adspromo');
        }else{
        	$item = Mage::getModel('gomage_adspromo/item');
        }
        
        $this->setForm($form);
        
        $fieldset_category = $form->addFieldset('category_settings', array('legend' => $this->__('Category Settings')));
                        
        
        $cat = $fieldset_category->addField('cat_applay_to', 'select',
            array(
                'name'   => 'cat_applay_to',
                'label'  => $this->__('Apply to'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_category_applayto')->toOptionArray(), 
            )
        ); 
        
        $cat->setOnchange('adspromo_setactive(this, \'categories\', ' . GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Category_Applayto::SELECTED_CATEGORIES . ', ' . GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Category_Applayto::ALL_CATEGORIES . ')'); 
        
        $store_ids = ($item->getData('store_ids') ? $item->getData('store_ids') : Mage_Catalog_Model_Abstract::DEFAULT_STORE_ID );        
        $fieldset_category->addField('categories', 'multiselect',
            array(
                'name'   => 'categories[]',
                'label'  => $this->__('Categories'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_category_categories')->toOptionArray($store_ids, true),
                'disabled' => (($item->getData('cat_applay_to') == GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Category_Applayto::ALL_CATEGORIES) || !$item->getData('cat_applay_to')),                  
            )
        );

        $fieldset_page = $form->addFieldset('page_settings', array('legend' => $this->__('Page Settings')));
        
        $page = $fieldset_page->addField('page_applay_to', 'select',
            array(
                'name'   => 'page_applay_to',
                'label'  => $this->__('Apply to'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_page_applayto')->toOptionArray(), 
            )
        );
        
        $page->setOnchange('adspromo_setactive(this, \'pages\', ' . GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Page_Applayto::SELECTED_PAGES . ', ' . GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Page_Applayto::ALL_PAGES . ')');
        
        $fieldset_page->addField('pages', 'multiselect',
            array(
                'name'   => 'pages[]',
                'label'  => $this->__('Pages'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_page_pages')->toOptionArray(), 
                'disabled' => (($item->getData('page_applay_to') == GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Page_Applayto::ALL_PAGES) || !$item->getData('page_applay_to')),
            )
        );
        

        $form->setValues($item->getData());        
        
                
        return parent::_prepareForm();
        
    }
    
  
}