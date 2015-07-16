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

class GoMage_Adspromo_Block_Adminhtml_Items_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	
    public function __construct(){
    	
        parent::__construct();
        $this->setId('gomageadspromoGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        
    }
    
    protected function _prepareCollection(){
    	
        $collection = Mage::getModel('gomage_adspromo/item')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
        
    }
    
    protected function _prepareColumns(){
    	
    	$this->addColumn('id', array(
            'header'    => $this->__('ID'),
            'align'     => 'left',
            'index'     => 'id',
            'type'  	=> 'number',
            'width' 	=> '50px',
        ));
    	
        $this->addColumn('title', array(
            'header'    => $this->__('Title'),
            'align'     => 'left',
            'index'     => 'title',
        ));
        
        
        $this->addColumn('start_date', array(
            'header'    => $this->__('Start Date'),
            'align'     => 'left',
            'index'     => 'start_date',
        	'type'      => 'date',
			'default'   => '--',
        ));

        $this->addColumn('end_date', array(
            'header'    => $this->__('End Date'),
            'align'     => 'left',
            'index'     => 'end_date',
        	'type'      => 'date',
			'default'   => '--',
        ));
        
        $this->addColumn('show_type', array(
            'header'    => $this->__('Display'),
            'align'     => 'left',
            'index'     => 'show_type',
        	'type'      => 'options',	
        	'options'	=> GoMage_Adspromo_Model_Adminhtml_System_Config_Source_Show::toOptionHash(),		
        ));         
        
        $this->addColumn('image_clicks', array(
            'header'    => $this->__('Clicks'),
            'align'     => 'left',
            'index'     => 'image_clicks',
        	'type'  	=> 'number',
        ));
        
        $this->addColumn('store_id_arr', array(
            'header'        => $this->__('Store'),
            'align'         => 'left',
            'index'         => 'store_id_arr',
            'type'          => 'store',
        	'store_all'     => true,
            'store_view'    => true,
            'sortable'      => false,
            'filter_index'  => 'store_id_arr', 
        	'filter_condition_callback'
                                => array($this, '_filterStoreCondition'),           
        ));
        
        $this->addColumn('status', array(
            'header'    => $this->__('Status'),
            'align'     => 'left',
            'index'     => 'status',
            'type'      => 'options',
            'options'   => array(
            	0=>$this->__('Disabled'),
            	1=>$this->__('Enabled'),
            ),
            
        ));
	    
        $this->addColumn('action', array(
            'header'    =>  $this->__('Action'),
            'width'     =>  '100',
            'type'      =>  'action',
            'getter'    =>  'getId',
            'actions'   =>  array(
                array(
                    'caption'   =>  $this->__('Edit'),
                    'url'       =>  array('base'=> '*/*/edit'),
                    'field'     =>  'id'
                )
            ),
            'filter'    =>  false,
            'sortable'  =>  false,
            'index'     =>  'stores',
            'is_system' =>  true,
        ));
        
        return parent::_prepareColumns();
        
    }
    
    protected function _prepareMassaction(){
        
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('id');                
        
        $this->getMassactionBlock()->addItem('delete', array(
            'label'     =>  $this->__('Delete Item(s)'),
            'url'       =>  $this->getUrl('*/*/massDelete'),
            'confirm'   =>  $this->__('Are you sure?')
        ));
        
        $this->getMassactionBlock()->addItem('enable', array(
            'label'     =>  $this->__('Enable Item(s)'),
            'url'       =>  $this->getUrl('*/*/massEnable')            
        ));
        
        $this->getMassactionBlock()->addItem('disable', array(
            'label'     =>  $this->__('Disable Item(s)'),
            'url'       =>  $this->getUrl('*/*/massDisable')            
        ));
        
        return $this;
        
    }
    
    
    protected function _afterLoadCollection(){
        
        $this->getCollection()->walk('afterLoad');
        parent::_afterLoadCollection();
        
    }
    
    protected function _filterStoreCondition($collection, $column){
        
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }
        
        $this->getCollection()->addStoreFilter($value);
        
    }
    
    public function getRowUrl($row){
        
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
        
    }
    
}