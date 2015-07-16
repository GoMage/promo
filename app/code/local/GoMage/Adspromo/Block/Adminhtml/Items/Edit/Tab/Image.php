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

class GoMage_Adspromo_Block_Adminhtml_Items_Edit_Tab_Image extends Mage_Adminhtml_Block_Widget_Form
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
        
        $fieldset = $form->addFieldset('image_settings', array('legend' => $this->__('Promo Image Settings')));
        
        $this->_setFieldset(array(), $fieldset);
        
        $fieldset->addField('image_alignment', 'select',
            array(
                'name'   => 'image_alignment',
                'label'  => $this->__('Promo Image Alignment'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_image_alignment')->toOptionArray(), 
            )
        );
        
        $fieldset->addField('image', 'adspromoimg',
            array(
                'name'   => 'image',
                'label'  => $this->__('Image'),                                 
            )
        );
        
        $fieldset->addField('image_width', 'text', array(
            'name'      => 'image_width',
            'label'     => $this->__('Image Width, px'),
            'title'     => $this->__('Image Width, px'),
 		    'class'     => 'gomage-validate-number',                             	
        ));
        
        $fieldset->addField('image_height', 'text', array(
            'name'      => 'image_height',
            'label'     => $this->__('Image Height, px'),
            'title'     => $this->__('Image Height, px'),
 		    'class'     => 'gomage-validate-number',                             	
        ));
        
        $fieldset->addField('image_effect', 'select',
            array(
                'name'   => 'image_effect',
                'label'  => $this->__('Image Effect'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_image_effect')->toOptionArray(true), 
            )
        );
        
        $fieldset->addField('alternative_image', 'adspromoimg',
            array(
                'name'   => 'alternative_image',
                'label'  => $this->__('Alternative Image'), 
                'note'	 => $this->__('Will be shown when mouse over is image'),                                  
            )
        );
        
        $fieldset->addField('alternative_image_width', 'text', array(
            'name'      => 'alternative_image_width',
            'label'     => $this->__('Alternative Image Width, px'),
            'title'     => $this->__('Alternative Image Width, px'),
 		    'class'     => 'gomage-validate-number',                             	
        ));
        
        $fieldset->addField('alternative_image_height', 'text', array(
            'name'      => 'alternative_image_height',
            'label'     => $this->__('Alternative Image Height, px'),
            'title'     => $this->__('Alternative Image Height, px'),
 		    'class'     => 'gomage-validate-number',                             	
        ));
        
        $fieldset->addField('alternative_image_effect', 'select',
            array(
                'name'   => 'alternative_image_effect',
                'label'  => $this->__('Alternative Image Effect'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_image_effect')->toOptionArray(), 
            )
        );
        
        $image_indent_type = $fieldset->addField('image_indent_type', 'select',
            array(
                'name'   => 'image_indent_type',
                'label'  => $this->__('Set Promo Image Indent in'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_image_indent_type')->toOptionArray(), 
            )
        );
        $image_indent_type->setOnchange("AdsPromoAdmin.setpercentRange('image_indent_type', 'image_indent')");
                                
        $fieldset->addField('image_indent', 'text', array(
            'name'      => 'image_indent',
            'label'     => $this->__('Promo Image Indent'),
            'title'     => $this->__('Promo Image Indent'),
        	'class'     => 'gomage-validate-number', 		       	
        ));
                        
        $image_open_link = $fieldset->addField('image_open_link', 'select',
            array(
                'name'   => 'image_open_link',
                'label'  => $this->__('Open Promo Image Link in'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_image_openlink')->toOptionArray(), 
            )
        );
        
        $image_open_link->setOnchange('AdsPromoAdmin.setImageOpenLink()');
        
        $fieldset->addField('image_open_link_url', 'text', array(
            'name'      => 'image_open_link_url',
            'label'     => $this->__('Promo Image Link'),
            'title'     => $this->__('Promo Image Link'), 		             	
        ));
                
        $form->setValues($item->getData());        
        
                
        return parent::_prepareForm();
        
    }
    
    protected function _getAdditionalElementTypes()
    {        
        return array(
            'adspromoimg' => Mage::getConfig()->getBlockClassName('gomage_adspromo/adminhtml_helper_image')
        );
    } 
    
}