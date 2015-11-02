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
 * @since        Class available since Release 1.1
 */

class GoMage_Adspromo_Block_Adminhtml_Items_Edit_Tab_Products extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('adspromo_products_grid');
        $this->setDefaultSort('entity_id');
        $this->setUseAjax(true);
        $this->setCheckboxCheckCallback('registerBlockItem');
        $this->setRowInitCallback('BlockItemRowInit');
        $this->setRowClickCallback('BlockItemRowClick');
    }

    protected function _addColumnFilterToCollection($column)
    {
        if ($column->getId() == 'in_adspromo') {
            $itemIds = $this->_getSelectedItems();
            if (empty($itemIds)) {
                $itemIds = 0;
            }
            if ($column->getFilter()->getValue()) {
                $this->getCollection()->addFieldToFilter('entity_id', array('in'=>$itemIds));
            }
            elseif(!empty($itemIds)) {
                $this->getCollection()->addFieldToFilter('entity_id', array('nin'=>$itemIds));
            }
        }
        else {
            parent::_addColumnFilterToCollection($column);
        }
        return $this;
    }

    protected function _prepareCollection()
    {
        if (Mage::registry('gomage_adspromo') && Mage::registry('gomage_adspromo')->getId()) {
            $this->setDefaultFilter(array('in_adspromo'=>1));
        }
        
        $collection = Mage::getModel('catalog/product')->getCollection()        
            ->addAttributeToSelect('name')
            ->addAttributeToSelect('sku')
            ->addAttributeToSelect('price');
                    			
        $this->setCollection($collection);
        
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('in_adspromo', array(
            'header_css_class' => 'a-center',
            'type'      => 'checkbox',
            'name'      => 'in_adspromo',
            'values'    => $this->_getSelectedItems(),
            'align'     => 'center',
            'index'     => 'entity_id',
            'use_index' => true,
        ));
        
        $this->addColumn('entity_id', array(
            'header'    => Mage::helper('catalog')->__('ID'),
            'sortable'  => true,
            'width'     => '60',
            'index'     => 'entity_id'
        ));
        $this->addColumn('name', array(
            'header'    => Mage::helper('catalog')->__('Name'),
            'index'     => 'name',                    
        ));
        $this->addColumn('sku', array(
            'header'    => Mage::helper('catalog')->__('SKU'),
            'width'     => '80',
            'index'     => 'sku'
        ));
       
        $this->addColumn('price', array(
            'header'    => Mage::helper('catalog')->__('Price'),
            'type'  => 'currency',
            'width'     => '1',
            'currency_code' => (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE),
            'index'     => 'price'
        ));
                
        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }

    protected function _getSelectedItems()
    {
        $products = $this->getRequest()->getPost('selected_products');
        if (is_null($products)) {
            if (Mage::registry('gomage_adspromo') && Mage::registry('gomage_adspromo')->getId()){
                $products = explode(',', Mage::registry('gomage_adspromo')->getData('product_ids'));
            }else{
                $products = array();
            }    
        }
        return $products;
    }

}