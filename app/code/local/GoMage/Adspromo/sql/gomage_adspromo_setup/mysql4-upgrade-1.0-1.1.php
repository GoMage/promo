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
 * @since        Class available since Release 1.1
 */

$installer = $this;
$installer->startSetup();

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `image_indent_type` int(2) DEFAULT 0;
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `product_ids` text;
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `image_clicks` int(11) NOT NULL DEFAULT '0';
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `window_border_size` int(5) NOT NULL DEFAULT '0';
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `window_border_color` varchar(10) NOT NULL default '';
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `window_indent_text` int(5) NOT NULL DEFAULT '0';
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `window_button_position` varchar(50) DEFAULT NULL;
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `window_indent_type` int(2) DEFAULT '0';
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `window_shows_count` int(11) DEFAULT '1';
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `window_height_type` int(2) DEFAULT '0';
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}`
  ADD COLUMN `window_reset_cookies` int(5) DEFAULT '1';
");

$installer->run("
ALTER TABLE `{$this->getTable('gomage_adspromo_entity')}` 
  CHANGE COLUMN `show` `show_type` SMALLINT(1) DEFAULT NULL;
");

  

$installer->endSetup();
