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

class GoMage_Adspromo_Block_Adminhtml_Items_Edit_Tab_Main extends Mage_Adminhtml_Block_Widget_Form
{
	
    protected function _prepareForm()
    {
        
        $form = new Varien_Data_Form();
        
        if(Mage::registry('gomage_adspromo')){
        	$item = Mage::registry('gomage_adspromo');
        }else{
        	$item = new Varien_Object();
        }
        
        $this->setForm($form);
        $fieldset = $form->addFieldset('main_fieldset', array('legend' => $this->__('Item information')));
                        
        $fieldset->addField('status', 'select',
            array(
                'name'   => 'status',
                'label'  => $this->__('Status'),                
                'values' => Mage::getModel('adminhtml/system_config_source_enabledisable')->toOptionArray(), 
            )
        );

        $show_type = $fieldset->addField('show_type', 'select',
            array(
                'name'   => 'show_type',
                'label'  => $this->__('Show'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_show')->toOptionArray(), 
            )
        ); 
        
        $show_type->setOnchange('AdsPromoAdmin.setShowType(this.value)');
     	     	
    	$fieldset->addField('title', 'text', array(
            'name'      => 'title',
            'label'     => $this->__('Title'),
            'title'     => $this->__('Title'),
            'required'  => true,  
 		    'note'	    => $this->__('For internal use.'),    	
        ));
        
        $fieldset->addField('store_ids', 'multiselect', array(
            'label'     => $this->__('Store View'),
            'required'  => true,
            'name'      => 'store_ids[]',
            'values'    => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_store')->getStoreValuesForForm(),
        ));             
        
        $fieldset->addField('start_date', 'date', array(
            'label'     => $this->__('Active From'),
            'name'      => 'start_date', 
            'format'    => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'image'     => $this->getSkinUrl('images/grid-cal.gif'),            
        ));
        
        $fieldset->addField('end_date', 'date', array(
            'label'     => $this->__('Active To'),
            'name'      => 'end_date', 
            'format'    => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'image'     => $this->getSkinUrl('images/grid-cal.gif'),            
        ));
        
        $fieldset->addField('product_ids', 'hidden', array(
            'name'      => 'product_ids',                                    
        ));
        
        
        $form->setValues($item->getData());        
        
        return parent::_prepareForm();
        
    }
        
}