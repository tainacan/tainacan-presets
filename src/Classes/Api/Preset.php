<?php

namespace INBCM\Preset\Tainacan\Classes\Api;
use \INBCM\Preset\Tainacan\Classes\Controller;

const TAINACAN_PRESET_REST_NAMESPACE = 'tainacanpreset/v1';

class Preset extends \WP_REST_Controller {

	private static $instance = null;

	protected function __construct() {
		$this->namespace = TAINACAN_PRESET_REST_NAMESPACE;
		$this->rest_base = 'execute';
		add_action('rest_api_init', [$this, 'registerRoutes'] );
	}

	public static function getInstance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	function registerRoutes() {
		register_rest_route(
			$this->namespace, $this->rest_base . "/(?P<slug>[a-zA-Z0-9-_]+)", 
			array(
				array(
					'methods'             => \WP_REST_Server::CREATABLE,
					'callback'            => array($this, 'execute'),
					'permission_callback' => array($this, 'execute_permissions_check')
				)
			)
		);
	}

	function execute( $request ) {
		$slug = ( isset($request['slug']) ) ? $request['slug'] : false;
		$preset = new Controller\Preset();
		$execute = $preset->execute($slug);
		if ($slug == false || $execute == false || empty($execute) ) {
			return new \WP_REST_Response([
				'error_message' => "An error occurred when trying to run the preset",
				'slug' => $slug
			], 400);
		}

		return new \WP_REST_Response(array("sucess" => true, "presets" => $execute), 200);
	}

	function execute_permissions_check() {
		return true;
	}
}