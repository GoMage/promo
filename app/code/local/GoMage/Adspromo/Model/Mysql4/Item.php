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

class GoMage_Adspromo_Model_Mysql4_Item extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('gomage_adspromo/item', 'id');
    }
    
    protected function _afterLoad(Mage_Core_Model_Abstract $object)
    {
        $storesArray = explode(',', $object->getData('store_ids'));
        $object->setData('store_id_arr', $storesArray);
        return parent::_afterLoad($object);
    }
    
}