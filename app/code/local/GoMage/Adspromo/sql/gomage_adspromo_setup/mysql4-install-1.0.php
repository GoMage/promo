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

$installer = $this;

$installer->startSetup();

$installer->run("CREATE TABLE `{$this->getTable('gomage_adspromo_entity')}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `store_ids` varchar(255) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `show` smallint(1) DEFAULT NULL,
  `cat_applay_to` smallint(1) DEFAULT NULL,
  `categories` text,
  `page_applay_to` smallint(1) DEFAULT NULL,
  `pages` text,
  `image_alignment` int(2) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `image_width` int(11) DEFAULT NULL,
  `image_height` int(11) DEFAULT NULL,
  `image_effect` int(2) DEFAULT NULL,
  `alternative_image` varchar(255) DEFAULT NULL,
  `alternative_image_width` int(11) DEFAULT NULL,
  `alternative_image_height` int(11) DEFAULT NULL,
  `alternative_image_effect` int(2) DEFAULT NULL,
  `image_indent` int(3) NOT NULL DEFAULT '0',    
  `image_open_link` smallint(1) NOT NULL DEFAULT '0',
  `image_open_link_url` text,
  `image_button_color` varchar(20) DEFAULT NULL,
  `window_effect` int(2) DEFAULT NULL,  
  `window_loaded` smallint(1) NOT NULL DEFAULT '0',
  `window_show` smallint(1) NOT NULL DEFAULT '0',
  `window_hide` smallint(1) NOT NULL DEFAULT '0',
  `window_close_selected` smallint(1) NOT NULL DEFAULT '1',
  `window_position` smallint(1) NOT NULL DEFAULT '0',
  `window_indent` int(3) NOT NULL DEFAULT '0',
  `window_width` int(11) DEFAULT NULL,
  `window_height` int(11) DEFAULT NULL,
  `window_backgroundview` smallint(1) NOT NULL DEFAULT '0',
  `window_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1;");

$installer->endSetup(); 