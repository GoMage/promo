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

class GoMage_Adspromo_Block_Adminhtml_Items_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    
    public function __construct(){
    	
        parent::__construct();
        $this->setId('gomage_adspromo_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($this->__('Ads & Promo Information'));
        
    }
    
    protected function _prepareLayout(){
         
        $this->addTab('main_section', array(
            'label'     =>  $this->__('Item information'),
            'title'     =>  $this->__('Item information'),
            'content'   =>  $this->getLayout()->createBlock('gomage_adspromo/adminhtml_items_edit_tab_main')->toHtml(),
        ));
        
        $this->addTab('image_section', array(
            'label'     =>  $this->__('Promo Image Settings'),
            'title'     =>  $this->__('Promo Image Settings'),
            'content'   =>  $this->getLayout()->createBlock('gomage_adspromo/adminhtml_items_edit_tab_image')->toHtml(),
        ));
        
        $this->addTab('window_section', array(
            'label'     =>  $this->__('Promo Window Settings'),
            'title'     =>  $this->__('Promo Window Settings'),
            'content'   =>  $this->getLayout()->createBlock('gomage_adspromo/adminhtml_items_edit_tab_window')->toHtml(),
        ));
        
        $this->addTab('advanced_section', array(
            'label'     =>  $this->__('Display Settings'),
            'title'     =>  $this->__('Display Settings'),
            'content'   =>  $this->getLayout()->createBlock('gomage_adspromo/adminhtml_items_edit_tab_advanced')->toHtml(),
        ));
        
        $this->addTab('products_section', array(
            'label'     =>  $this->__('Promo Products'),
            'title'     =>  $this->__('Promo Products'),
            'content'   =>  $this->getLayout()->createBlock('gomage_adspromo/adminhtml_items_edit_tab_products')->toHtml(),
        ));
        	        
        
        if($tabId = addslashes(htmlspecialchars($this->getRequest()->getParam('tab')))){
        	
        	$this->setActiveTab($tabId);
        }
        
        
        return parent::_beforeToHtml();
        
    }
       
}