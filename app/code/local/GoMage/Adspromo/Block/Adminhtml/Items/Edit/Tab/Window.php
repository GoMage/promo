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

class GoMage_Adspromo_Block_Adminhtml_Items_Edit_Tab_Window 
      extends Mage_Adminhtml_Block_Widget_Form
{
	
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }
	
    protected function _prepareForm()
    {
        
        $form = new Varien_Data_Form();
        
        if(Mage::registry('gomage_adspromo')){
        	$item = Mage::registry('gomage_adspromo');
        }else{
        	$item = Mage::getModel('gomage_adspromo/item');
        }
        
        $this->setForm($form);
        
        $fieldset = $form->addFieldset('window_settings', array('legend' => $this->__('Promo Window Settings')));
                        
        $fieldset->addField('window_loaded', 'select',
            array(
                'name'   => 'window_loaded',
                'label'  => $this->__('Show Promo Window when Page is Loaded'),                
                'values' => Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray(), 
            )
        );
        
        $fieldset->addField('window_show', 'select',
            array(
                'name'   => 'window_show',
                'label'  => $this->__('Show Promo Window'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_window_show')->toOptionArray(), 
            )
        );
        
        $fieldset->addField('window_hide', 'select',
            array(
                'name'   => 'window_hide',
                'label'  => $this->__('Hide Promo Window'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_window_hide')->toOptionArray(), 
            )
        );
        
        $fieldset->addField('window_close_selected', 'select',
            array(
                'name'   => 'window_close_selected',
                'label'  => $this->__('Close Promo Window when another selected'),                
                'values' => Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray(), 
            )
        );
        
        $window_position = $fieldset->addField('window_position', 'select',
            array(
                'name'   => 'window_position',
                'label'  => $this->__('Promo Window Position'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_window_position')->toOptionArray(), 
            )
        );        
        $window_position->setOnchange('AdsPromoAdmin.setWindowPosition()');
        
        $fieldset->addField('window_indent', 'text', array(
            'name'      => 'window_indent',
            'label'     => $this->__('Promo Window Indent'),
            'title'     => $this->__('Promo Window Indent'),
 		    'class'     => 'gomage-validate-number-range-100',
            'note'	    => $this->__('range from 0 to 100'),     	
        ));
        
        $fieldset->addField('window_width', 'text', array(
            'name'      => 'window_width',
            'label'     => $this->__('Promo Window Width, px'),
            'title'     => $this->__('Promo Window Width, px'),
 		    'class'     => 'gomage-validate-number',                             	
        ));
        
        $fieldset->addField('window_height', 'text', array(
            'name'      => 'window_height',
            'label'     => $this->__('Promo Window Height, px'),
            'title'     => $this->__('Promo Window Height, px'),
 		    'class'     => 'gomage-validate-number',                             	
        ));
        
        $fieldset->addField('window_backgroundview', 'select',
            array(
                'name'   => 'window_backgroundview',
                'label'  => $this->__('Background View'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_window_backgroundview')->toOptionArray(), 
            )
        );
        
        $fieldset->addField('image_button_color', 'select',
            array(
                'name'   => 'image_button_color',
                'label'  => $this->__('Close Button Color'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_image_buttoncolor')->toOptionArray(), 
            )
        );
        
        $fieldset->addField('window_effect', 'select',
            array(
                'name'   => 'window_effect',
                'label'  => $this->__('Promo Window Effect'),                
                'values' => Mage::getModel('gomage_adspromo/adminhtml_system_config_source_window_effect')->toOptionArray(), 
            )
        );
        
        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig(
            array('tab_id' => $this->getTabId(),                                    
                  'add_widgets'              => true,                    
                  'add_adspromo_widgets'     => true,
                  'add_variables' 		     => true, 
                  'add_adspromo_variables'   => true,
                  'files_browser_window_url' => Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg_images/index'),
                  'directives_url'           => Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive'), 
                 )
        );
        
        $contentField = $fieldset->addField('window_content', 'editor', array(
            'name'      => 'window_content',
            'style'     => 'height:20em;',
            'label'     => $this->__('Promo Window Content'),
            'title'     => $this->__('Promo Window Content'),
            'config'    => $wysiwygConfig, 		                                 	
        ));

        $renderer = $this->getLayout()->createBlock('adminhtml/widget_form_renderer_fieldset_element')
                    ->setTemplate('gomage/adspromo/content.phtml');
        $contentField->setRenderer($renderer);
        
        
        $form->setValues($item->getData());        
        
                
        return parent::_prepareForm();
        
    }   
    
}