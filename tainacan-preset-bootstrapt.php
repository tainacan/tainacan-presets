<?php
/*
Plugin Name: Tainacan IBRAM pre-configurações
Plugin URI: https://tainacan.org/
Description: Plugin for tainacan mappers and presets for IBRAM
Author: Vinícius Nunes
Version: 0.0.1
Text Domain: tainacan-preset-ibram
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
namespace TainacanPreset\Tainacan;

require_once __DIR__.'/app/config.php';
require_once __DIR__.'/vendor/autoload.php';

class TainacanPresetBootstrapt {

	public function __construct() {
		$this->init();
		$this->initActions();
		$this->initFilters();
	}

	function init() {
		\TainacanPreset\Tainacan\Classes\Api\Preset::getInstance();
	}

	function initActions() {
		add_action('tainacan-register-mappers', [$this, 'actionRegisterExposerMapper']);
		add_action('admin_enqueue_scripts', [$this, 'actionTainacanCollectionsPresetsHooksInit']);
	}

	function initFilters () {
		add_filter('tainacan-admin-ui-options', [$this, 'filterAddAdminPage']);
		add_filter( 'tainacan-api-prepare-items-args', [$this, 'filterRequestParams'], 10, 2);
	}

	function actionRegisterExposerMapper($exposers) {
		$exposers->register_mapper('TainacanPreset\Tainacan\Classes\Mapper\MapperINBCM');
	}

	function actionTainacanCollectionsPresetsHooksInit( $hook ) {
		wp_enqueue_script( 'tainacan-collections-presets-hooks', plugin_dir_url( __FILE__ ) .'/assets/js/hooks.js', ['wp-hooks'] );
	}

	function filterAddAdminPage($options) {
		$admin_options = [
			'managecollection' => true,
			'tainacanHeaderExtraLabel' => 'Gestão Acervo'
		];
		$options = array_merge($options, $admin_options);
		return $options;
	}

	function filterRequestParams ( $args, $request ) {
		global $data_sets;
		$slugs = array();
		if( isset( $data_sets['manage_collection']['collections'] ) ) {
			$slugs = array_merge($slugs, array_keys($data_sets['manage_collection']['collections']) );
		}
		if( isset( $data_sets['manage_collection']['taxonomies'] ) ) {
			$slugs = array_merge($slugs, array_keys($data_sets['manage_collection']['taxonomies']) );
		}

		$post_ids = array();
		foreach($slugs as $slug) {
			$post = get_page_by_path( $slug, OBJECT, [\Tainacan\Entities\Collection::$post_type, \Tainacan\Entities\Taxonomy::$post_type] );
			if($post) $post_ids[] = $post->ID;
		}

		if( isset($request['managecollection']) && $request['managecollection'] == true ) {
			$args = array_merge( ['post__in' => $post_ids], $args);
		} else {
			$args = array_merge( ['post__not_in' => $post_ids], $args);
		}

		return $args;
	}

}

$tainacanMapperBootstrapt = new \TainacanPreset\Tainacan\TainacanPresetBootstrapt();
