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

class GoMage_Adspromo_Block_Adminhtml_Items extends Mage_Adminhtml_Block_Widget_Grid_Container
{
      public function __construct()
      { 
        $this->_controller = 'adminhtml_items';
        $this->_blockGroup = 'gomage_adspromo';
        $this->_headerText = $this->__('Manage Ads & Promo');
        $this->_addButtonLabel = $this->__('Add Item');
        parent::__construct();
      }
}