<?php
/*
Plugin Name: Tainacan INBCM
Plugin URI: https://tainacan.org/
Description: Plugin for tainacan mappers IBRAM INBCM
Author: Vinícius Nunes
Version: 0.0.1
Text Domain: tainacan-mappers-ibram-inbcm
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
namespace INBCM\Preset\Tainacan;

require_once __DIR__.'/app/config.php';
require_once __DIR__.'/vendor/autoload.php';

class TainacanINBCMBootstrapt {

	public function __construct() {
		add_action("tainacan-register-mappers", [$this, "registerExposerMapper"]);
	}

	function registerExposerMapper($exposers) {
		$exposers->register_mapper('INBCM\Preset\Tainacan\Classes\Mapper\MapperINBCM');
	}
}

$tainacanMapperBootstrapt = new \INBCM\Preset\Tainacan\TainacanINBCMBootstrapt();
