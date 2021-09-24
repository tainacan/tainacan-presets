<?php

namespace INBCM\Preset\Tainacan\Classes\Controller;

class Preset {

	public function __construct( )
	{
		$this->collections_repository = \Tainacan\Repositories\Collections::get_instance();
		$this->metadatum_repository   = \Tainacan\Repositories\Metadata::get_instance();
		$this->taxonomy_repository    = \Tainacan\Repositories\Taxonomies::get_instance();
		$this->term_repository        = \Tainacan\Repositories\Terms::get_instance();
	}

	public function execute($version)
	{
		global $data_sets;
		if(!isset($data_sets[$version]))
			return;
		$data_preset = $data_sets[$version];
		$taxonomies = $this->create_taxonomies($data_preset);
		$collection = $this->create_collection($data_preset);
		$metadatas = $this->create_metadata($collection, $data_preset, $taxonomies);
		if($metadatas !== false) {
			$this->published_collection($collection, $data_preset);
		}
	}

	public function create_collection($data_preset)
	{
		$data_collection = $data_preset['collection'];
		$collection = new \Tainacan\Entities\Collection();
		$collection->set_name($data_collection['name']);
		$collection->set_description($data_collection['description']);
		if($collection->validate()) {
			$collection = $this->collections_repository->insert( $collection );
			return $collection;
		}
		return false;
	}

	public function published_collection($collection, $data_preset) 
	{
		$data_collection = $data_preset['collection'];
		$collection->set_status($data_collection['status']);
		if($collection->validate()) {
			$collection = $this->collections_repository->insert( $collection );
			return $collection;
		}
	}

	public function create_metadata($collection, $data_preset, $taxonomies)
	{
		$metas = array();
		$metadatas = $data_preset['collection']['metadatas'];
		foreach($metadatas as $metadata) {
			$metadatum = new \Tainacan\Entities\Metadatum();
			$metadatum->set_collection( $collection );
			$metadatum->set_name($metadata["name"]);
			$metadatum->set_description($metadata["description"]);
			$metadatum->set_metadata_type($metadata["metadata_type"]);
			$metadatum->set_status($metadata["status"]);
			$metadatum->set_required($metadata["required"]);
			$metadatum->set_multiple($metadata["multiple"]);
			$metadatum->set_collection_key($metadata["collection_key"]);

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
			if($wp_query->found_posts != 1) return false;
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
		//$tax = $this->taxonomy_repository->fetch(['name' => $taxonomy['slug']], 'OBJECT');
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