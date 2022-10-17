<?php

namespace TainacanPreset\Tainacan\Classes\Controller;

class Preset {

	public function __construct( )
	{
		$this->metadatum_section_repository = \Tainacan\Repositories\Metadata_Sections::get_instance();
		$this->collections_repository       = \Tainacan\Repositories\Collections::get_instance();
		$this->metadatum_repository         = \Tainacan\Repositories\Metadata::get_instance();
		$this->taxonomy_repository          = \Tainacan\Repositories\Taxonomies::get_instance();
		$this->term_repository              = \Tainacan\Repositories\Terms::get_instance();
	}

	public function execute($version)
	{
		global $data_sets;
		if(!isset($data_sets[$version]))
			return false;
		$data_preset = $data_sets[$version];
		$taxonomies = $this->create_taxonomies($data_preset);
		$collections = $this->create_collection($data_preset);
		foreach($collections as $slug => $collection) {
			$metadata_sections = $this->create_metadata_section($collection, $slug, $data_preset);
			$metadatas = $this->create_metadata($collection, $slug, $data_preset, $taxonomies, $metadata_sections, $collections);
		}

		return array(
			"collections" => $collections
		);
	}

	private function get_collection($collection_slug)
	{
		$wp_query = new \WP_Query( [
			'name' => $collection_slug,
			'posts_per_page' => 1,
			'post_type' => \Tainacan\Entities\Collection::get_post_type()
		] );
		if ( $wp_query->have_posts() )
		{
			foreach ( $wp_query->posts as $p )
			{
				return new \Tainacan\Entities\Collection($p->ID);
			}
		}
		return false;
	}

	private function exist_collection($collection)
	{
		$wp_query = new \WP_Query( [
			'name' => $collection['slug'],
			'posts_per_page' => 2,
			'post_type' => \Tainacan\Entities\Collection::get_post_type()
		] );
		if ( $wp_query->have_posts() )
		{
			/**
			 * Using WordPress Loop here would cause problems
			 *
			 * @see https://core.trac.wordpress.org/ticket/18408
			 */
			if(!$wp_query->found_posts > 1) return false;
			foreach ( $wp_query->posts as $p )
			{
				$result[] = new \Tainacan\Entities\Collection($p->ID);
			}
			return $result;
		}
		return false;
	}

	public function create_collection($data_preset)
	{
		$collections = array();
		$data_collections = $data_preset['collections'];
		foreach($data_collections as $slug => $data_collection)
		{
			$collection = $this->exist_collection($data_collection);
			if(!$collection)
			{
				$collection = new \Tainacan\Entities\Collection();
				$collection->set_name($data_collection['name']);
				$collection->set_status($data_collection['status']);
				$collection->set_slug($data_collection['slug']);
				$collection->set_description($data_collection['description']);
				if($collection->validate())
				{
					$collection = $this->collections_repository->insert( $collection );
					$collections[$slug] = $collection;
				}
			}
			else 
			{
				$collections[$slug] = $collection;
			}
		}
		return $collections;
	}

	public function create_metadata_section($collection, $slug, $data_preset)
	{
		$meta_sections = array();
		$metadata_sections = $data_preset['collections'][$slug]['metadata_sections'];
		foreach($metadata_sections as $metadata_section) {
			$section = new \Tainacan\Entities\Metadata_Section();
			$section->set_collection( $collection );
			$section->set_name($metadata_section["name"]);
			$section->set_description($metadata_section["description"]);
			$slug = $metadata_section['slug'];
			$section->set_slug($slug);
			if($section->validate()) {
				$section = $this->metadatum_section_repository->insert($section);
				$meta_sections[$slug] = $section;
			} else {
				echo "ERROS:\n" . json_encode($section->get_errors());
				return false;
			}
		}
		return $meta_sections;
	}

	public function create_metadata($collection, $slug, $data_preset, $taxonomies, $metadata_sections, $collections)
	{
		$metas = array();
		$metadatas = $data_preset['collections'][$slug]['metadatas'];
		foreach($metadatas as $metadata)
		{
			if( $metadata["metadata_type"] === 'Tainacan\\Metadata_Types\\Core_Description')
			{
				$core_description_metadatum = $collection->get_core_description_metadatum();
				$core_description_metadatum->set_name($metadata['name']);
				$core_description_metadatum->set_description($metadata['description']);
				$core_description_metadatum->set_status($metadata['status']);
				$core_description_metadatum->set_required($metadata['required']);
				$core_description_metadatum->set_collection_key($metadata['collection_key']);
				if($core_description_metadatum->validate()) {
					$core_description_metadatum = $this->metadatum_repository->insert($core_description_metadatum);
					$metas[] = $core_description_metadatum;
				}
				continue;
			}

			if($metadata["metadata_type"] === 'Tainacan\\Metadata_Types\\Core_Title')
			{
				$core_title_metadatum = $collection->get_core_title_metadatum();
				$core_title_metadatum->set_name($metadata['name']);
				$core_title_metadatum->set_description($metadata['description']);
				$core_title_metadatum->set_status($metadata['status']);
				$core_title_metadatum->set_required($metadata['required']);
				$core_title_metadatum->set_collection_key($metadata['collection_key']);
				if($core_title_metadatum->validate()) {
					$core_title_metadatum = $this->metadatum_repository->insert($core_title_metadatum);
					$metas[] = $core_title_metadatum;
				}
				continue;
			}

			if($metadata["metadata_type"] === 'Tainacan\\Metadata_Types\\Relationship')
			{
				$collection_slug = $metadata['metadata_type_options']['collection_id'];
				if ( isset($collections[$collection_slug]) )
				{
					$collection_id = $collections[$collection_slug]->get_id();
					$search = $collections[$collection_slug]->get_core_title_metadatum()->get_id();
					$metadata['metadata_type_options']['collection_id'] = $collection_id;
					$metadata['metadata_type_options']['search'] = $search;
				}
				else
				{
					$c = $this->get_collection($collection_slug);
					$collection_id = $c->get_id();
					$search = $c->get_core_title_metadatum()->get_id();
					$metadata['metadata_type_options']['collection_id'] = $collection_id;
					$metadata['metadata_type_options']['search'] = $search;
				}
			}

			$metadatum = new \Tainacan\Entities\Metadatum();
			$metadatum->set_collection( $collection );
			$metadatum->set_name($metadata["name"]);
			$metadatum->set_description($metadata["description"]);
			$metadatum->set_metadata_type($metadata["metadata_type"]);
			$metadatum->set_status($metadata["status"]);
			$metadatum->set_required($metadata["required"]);
			$metadatum->set_multiple($metadata["multiple"]);
			$metadatum->set_collection_key($metadata["collection_key"]);
			$metadata_section_slug = isset($metadata["metadata_section_slug"]) ? $metadata["metadata_section_slug"] : 'default_section';
			$metadata_section_id = isset($metadata_sections[$metadata_section_slug]) ? $metadata_sections[$metadata_section_slug]->get_id() : \Tainacan\Entities\Metadata_Section::$default_section_slug;
			$metadatum->set_metadata_section_id( $metadata_section_id );

			if(isset($metadata["metadata_type_options"])) {
				if($metadata["metadata_type"] === 'Tainacan\\Metadata_Types\\Taxonomy') {
					$taxonomy_slug = $metadata['taxonomy_slug'];
					$metadata["metadata_type_options"]["taxonomy_id"] = $taxonomies[$taxonomy_slug]->get_id();
				}
				$metadatum->set_metadata_type_options($metadata["metadata_type_options"]);
			}

			if($metadatum->validate()) {
				$metadatum = $this->metadatum_repository->insert($metadatum);
				$metas[] = $metadatum;
			} else {
				echo "ERROS:\n" . json_encode($metadatum->get_errors());
				return false;
			}
		}
		return $metas;
	}

	public function create_taxonomies($data_preset)
	{
		$taxonomies = $data_preset['taxonomies'];
		$taxs = array();
		foreach($taxonomies as $taxonomy) {
			$tax = $this->create_taxonomy($taxonomy);
			if($tax === false) {
				return false;
			}
			$taxs[$tax->get_slug()] = $tax;
		}
		return $taxs;
	}

	private function exist_taxonomy($taxonomy)
	{
		$wp_query = new \WP_Query( [
			'name' => $taxonomy['slug'],
			'posts_per_page' => 2,
			'post_type' => \Tainacan\Entities\Taxonomy::get_post_type()
		] );
		if ( $wp_query->have_posts() ) {
			/**
			 * Using WordPress Loop here would cause problems
			 *
			 * @see https://core.trac.wordpress.org/ticket/18408
			 */
			if(!$wp_query->found_posts > 1) return false;
			foreach ( $wp_query->posts as $p ) {
				$result[] = new \Tainacan\Entities\Taxonomy($p->ID);
			}
			return $result;
		}
		return false;
	}

	private function create_taxonomy($taxonomy)
	{
		$file_spec = dirname(__FILE__) . '/../../../app/data/preset/' .  $taxonomy['file'];
		$tax = $this->exist_taxonomy($taxonomy);

		if ($tax !== false && count($tax) == 1)
			$tax = $tax[0];
		else {
			$tax = new \Tainacan\Entities\Taxonomy();
			$tax->set_slug($taxonomy['slug']);
		}
		$tax->set_name($taxonomy['name']);
		$tax->set_description($taxonomy['description']);
		$tax->set_allow_insert($taxonomy['allow_insert']);
		$tax->set_status($taxonomy['status']);
		
		if ($tax->validate()) {
			$tax = $this->taxonomy_repository->insert($tax);
			$tax_db_identifier = $tax->get_db_identifier();
			
			$position = 0;
			$last_term = 0;
			$parent = array();

			if (($handle = fopen($file_spec, "r")) !== false)
			{
				$file = $handle;
				while ( ($values = fgetcsv($file, 0, ',', '"') ) !== false)
				{
					if ($values[$position] == '') // next degree
					{
						$position++;
						array_push($parent, $last_term);
					}
 
					while( $position > 0 && !($values[$position] != '' && $values[$position-1] == '' )) // back degree
					{
						$position--;
						array_pop($parent);
					}

					if ($position == 0 && $values[$position] == '') //incorrect formatted csv
					{
						return false;
					}

					$term = new \Tainacan\Entities\Term();
					$term->set_name($values[$position]);
					$term->set_description($values[$position+1]);
					$term->set_taxonomy($tax_db_identifier);
					if(end($parent)) $term->set_parent(end($parent));

					$term_exist = $this->term_repository->term_exists($term->get_name(), $tax, $term->get_parent(), true);
					
					if($term_exist === false)
					{
						if ($term->validate())
						{
							$term_insert = $this->term_repository->insert($term);
							$last_term = $term_insert->get_id();
						}
						else
						{
							return false;
						}
					}
					else
					{
						$last_term = $term_exist->term_id;
					}
					
				}
			}
			return $tax;
		}
		return false;
	}

}