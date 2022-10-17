<?php

namespace TainacanPreset\Tainacan\Classes\Entities;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Class that represents the Collection entity
 */
class Metadata {

	protected
		$name,
		$description,
		$type,
		$options;

	public function __construct(
		$name,
		$description,
		$type,
		$options
		)
	{
		$this->name = $name;
		$this->description = $description;
		$this->type = $type;
		$this->options = $options;
	}

	public function __get($name)
	{
		if (property_exists($this, $name)) {
			return $this->$name;
		}
		throw new \Exception( "the property $name was not found in the entity" );
	}

	public function __set($name, $value)
	{
		if (property_exists($this, $name)) {
			$this->$name = $value;
		}
		throw new \Exception( "the property $name was not found in the entity" );
	}

}
