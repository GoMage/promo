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
	
class GoMage_Adspromo_Model_Observer{
		
    public function prepareWidgetsPluginConfig(Varien_Event_Observer $observer)
    {
        $config = $observer->getEvent()->getConfig();

        if ($config->getData('add_adspromo_widgets')) {            
            $settings['widget_window_url'] = $this->getWidgetWindowUrl($config);
            $config->addData($settings);
        }
        return $this;
    }	
    
    public function getWidgetWindowUrl($config)
    {
        $params = array();

        $skipped = is_array($config->getData('skip_widgets')) ? $config->getData('skip_widgets') : array();
        if ($config->hasData('widget_filters')) {
            $all = Mage::getModel('widget/widget')->getWidgetsXml();
            $filtered = Mage::getModel('widget/widget')->getWidgetsXml($config->getData('widget_filters'));
            $reflection = new ReflectionObject($filtered);
            foreach ($all as $code => $widget) {
                if (!$reflection->hasProperty($code)) {
                    $skipped[] = $widget->getAttribute('type');
                }
            }
        }

        if (count($skipped) > 0) {
            $params['skip_widgets'] = $this->encodeWidgetsToQuery($skipped);
        }
        
        return Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/widget/index', $params);
    }
    
    public function prepareWysiwygPluginConfig(Varien_Event_Observer $observer)
    {
        $config = $observer->getEvent()->getConfig();
        if ($config->getData('add_adspromo_variables')) {
                                    
            $config->setData('plugins', array());
            $settings = $this->getWysiwygPluginSettings($config);
            $config->addData($settings);
        }                
        return $this;
    } 
    
    public function getWysiwygPluginSettings($config)
    {
        $variableConfig = array();
        $onclickParts = array(
            'search' => array('html_id'),
            'subject' => 'MagentovariablePlugin.loadChooser(\''.$this->getVariablesWysiwygActionUrl().'\', \'{{html_id}}\');'
        );
        $variableWysiwygPlugin = array(array('name' => 'magentovariable',
            'src' => $this->getWysiwygJsPluginSrc(),
            'options' => array(
                'title' => Mage::helper('adminhtml')->__('Insert Variable...'),
                'url' => $this->getVariablesWysiwygActionUrl(),
                'onclick' => $onclickParts,
                'class'   => 'add-variable plugin'
        )));
        $configPlugins = $config->getData('plugins');
        $variableConfig['plugins'] = array_merge($configPlugins, $variableWysiwygPlugin);
        return $variableConfig;
    }
    
    public function getWysiwygJsPluginSrc()
    {
        return Mage::getBaseUrl('js').'mage/adminhtml/wysiwyg/tiny_mce/plugins/magentovariable/editor_plugin.js';
    }
    
    public function getVariablesWysiwygActionUrl()
    {
        return Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/system_variable/wysiwygPlugin');
    }
    
    static public function checkK($event)
    {			
		$key = Mage::getStoreConfig('gomage_activation/adspromo/key');			
		Mage::helper('gomage_adspromo')->a($key);			
	}
    
		
}