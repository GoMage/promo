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

class GoMage_Adspromo_Block_Adminhtml_Items_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct(){
    	
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'gomage_adspromo';
        $this->_controller = 'adminhtml_items';
        
        $this->_updateButton('save', 'label', $this->__('Save'));
        $this->_updateButton('delete', 'label', $this->__('Delete'));
		
		$adspromo = Mage::registry('gomage_adspromo');				
		
        $this->_addButton('saveandcontinue', array(
            'label'     => $this->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        
        $settings = array();
        
        $settings['show_type'] = GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Show::IMAGE;
        $settings['window_hide'] = GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Hide::CLOSE_BUTTON;
        $settings['image_open_link'] = GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Openlink::SAME_WINDOW;
        $settings['window_position'] = GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Position::CENTER;
        
        
        if (Mage::registry('gomage_adspromo'))
        {
             $settings['show_type'] = Mage::registry('gomage_adspromo')->getShowType();
             $settings['window_hide'] = Mage::registry('gomage_adspromo')->getWindowHide();
             $settings['image_open_link'] = Mage::registry('gomage_adspromo')->getImageOpenLink();
             $settings['window_position'] = Mage::registry('gomage_adspromo')->getWindowPosition();
        }     

        $settings['window_hide_options'] = GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Hide::toOptionArray();     
        $settings['window_hide_options_for_window'] = GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Hide::toOptionArray(true);
        
        $settings['image_open_link_options'] = GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Openlink::toOptionArray();
        $settings['image_open_link_options_for_image'] = GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Image_Openlink::toOptionArray(true);
        
        $settings['window_position_options'] = GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Position::toOptionArray();
        $settings['window_position_options_for_window'] = GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Window_Position::toOptionArray(true);
             
        if($adspromo)
        {
            $product_ids = split(",",$adspromo->getProductIds());
            foreach($product_ids as $_product_ids)
            {
                $products[$_product_ids]= 1;
            }
        }
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('window_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'window_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'window_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
            
            var AdsPromoAdmin = new AdsPromoAdminSettings(" . Mage::helper('core')->jsonEncode($settings) . ");
            var blockItems = \$H(".Mage::helper('core')->jsonEncode($products).");
            adspromo_products_gridJsObject.reloadParams = {'selected_products[]':blockItems.keys()};
            \$('product_ids').value = '".($adspromo ? $adspromo->getProductIds() : '')."';
            
        "; 
        
        
        
    }
    
    
    public function getHeaderText(){
    	
        if( Mage::registry('gomage_adspromo') && Mage::registry('gomage_adspromo')->getId() ) {
            return $this->__("Edit %s", $this->htmlEscape(Mage::registry('gomage_adspromo')->getTitle()));
        } else {
            return $this->__('Add Item');
        }
        
    }
}