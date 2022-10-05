<?php
require_once("../../../wp-load.php");

require_once __DIR__.'/app/config.php';
require_once __DIR__.'/vendor/autoload.php';


use \INBCM\Preset\Tainacan\Classes\Controller;
use \INBCM\Preset\Tainacan\Classes\Api;

echo "start main process!\n\n";
$preset = new Controller\Preset();
// $preset->execute('INBCM');
$preset->execute('manage_collection');
