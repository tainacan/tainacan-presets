<?php
/*
Plugin Name: Tainacan Mappers IBRAM INBCM
Plugin URI: tainacan.org
Description: Plugin for tainacan mappers IBRAM INBCM
Author: Media Lab / UFG
Version: 0.0.1
Text Domain: tainacan-mappers-ibram-inbcm
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
namespace Tainacan\IBRAM\Mappers;

class TainacanMapperBootstrapt {

	public function __construct() {
		add_action("tainacan-register-mappers", [$this, "registerExposerMapper"]);
	}

	function registerExposerMapper($exposers) {
		require_once( plugin_dir_path(__FILE__) . 'class-tainacan-inbcm-ibram.php' );
		$exposers->register_mapper('Tainacan\IBRAM\Mappers\Mapper_Inbcm_Ibram');
	}
}

$tainacanMapperBootstrapt = new \Tainacan\IBRAM\Mappers\TainacanMapperBootstrapt();
