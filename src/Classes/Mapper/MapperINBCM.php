<?php

namespace INBCM\Preset\Tainacan\Classes\Mapper;

/**
 * Support IBRAM INBCM Mapping 
 * http://purl.org/dc/elements/1.1/
 *
 */
class MapperINBCM extends \Tainacan\Mappers\Mapper {
	public $slug = 'inbcm-ibram';
	public $name = 'INBCM - IBRAM';
	public $allow_extra_metadata = true;
	public $context_url = '';
	public $header = '<?xml version="1.0"?>';
	public $prefixes = [
		'' => ''
	];
	public $metadata = [
		'numero-registro' => [
			'label' => 'Número de registro',
			'metadata_type' => 'Tainacan\\Metadata_Types\\Text',
		],
		'outros-numeros' => [
			'label' => 'Outros números',
			'metadata_type' => 'Tainacan\\Metadata_Types\\Numeric',
		],
		'situacao' => [
			'label' => 'Situação',
		],
		'denominacao' => [
			'label' => 'Denominação'
		],
		'titulo' => [
			'label' => 'Título'
		],
		'autor' => [
			'label' => 'Autor'
		],
		'classificacao' => [
			'label' => 'Classificação'
		],
		'resumo-descritivo' => [
			'label' => 'Resumo descritivo'
		],
		'dimensoes' => [
			'label' => 'Dimensões'
		],
		'dimensoes-altura' => [
			'label' => 'Dimensões - altura'
		],
		'dimensoes-largura' => [
			'label' => 'Dimensões - largura'
		],
		'dimensoes-diametro' => [
			'label' => 'Dimensões - diâmetro'
		],
		'dimensoes-espessura' => [
			'label' => 'Dimensões - espessura'
		],
		'dimensoes-profundidade-comprimento' => [
			'label' => 'Dimensões - profundidade/comprimento'
		],
		'dimensoes-peso' => [
			'label' => 'Dimensões - peso'
		],
		'material-tecnica' => [
			'label' => 'Material/Técnica'
		],
		'estado-conservacao' => [
			'label' => 'Estado de conservação'
		],
		'local-producao' => [
			'label' => 'Local de produção'
		],
		'data-producao' => [
			'label' => 'Data de produção'
		],
		'condicoes-reproducao' => [
			'label' => 'Condições de reprodução'
		],
		'midias-relacionadas' => [
			'label' => 'Mídias relacionadas'
		]
	];
}
