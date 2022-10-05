<?php
    global $data_sets;
    $data_sets['inbcm'] = array(
        'taxonomies' => array(
            "tax_preset_denominacao" => array(
                "name" => "Denominação",
                "description" => "Informação do nome que identifica o objeto.",
                "slug" => "tax_preset_denominacao",
                "status" => "publish",
                "allow_insert" => "yes",
                "file" => "INBCM/files/tax_preset_denominacao.csv"
            ),
            "tax_preset_autor" => array(
                "name" => "Autor",
                "slug" => "tax_preset_autor",
                "description" => "Informação do nome do autor do objeto (individual ou coletivo).",
                "status" => "publish",
                "allow_insert" => "yes",
                "file" => "INBCM/files/tax_preset_autor.csv"
            ),
            "tax_preset_classificacao" => array(
                "name" => "Classificação",
                "slug" => "tax_preset_classificacao",
                "description" => "Informação da classificação do objeto segundo o \"Thesaurus para Acervos Museológicos\" ou outros vocabulários controlados.",
                "status" => "publish",
                "allow_insert" => "yes",
                "file" => "INBCM/files/tax_preset_classificacao.csv"
            ),
            "tax_preset_material_tecnica" => array(
                "name" => "Material/Técnica",
                "slug" => "tax_preset_material_tecnica",
                "description" => "Informação dos materiais do suporte que compõem o objeto e a técnica empregada na sua manufatura.",
                "status" => "publish",
                "allow_insert" => "yes",
                "file" => "INBCM/files/tax_preset_material_tecnica.csv"
            )
        ),
        'collection' => array(
            "inbcm" => array(
                'name' => 'INBCM',
                'description' => 'description',
                'status' => 'publish',
                "metadata_sections" => array(),
                'metadatas' => array(
                    array(
                        "name" => "Número de registro",
                        "description" => "Registro individual definido pelo museu para identificação e controle do objeto dentro do acervo.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "yes"
                    ),

                    array(
                        "name" => "Outros números",
                        "description" => "Registro de numerações anteriores e demais números atribuídas ao objeto, tais como números antigos e números patrimoniais.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),

                    array(
                        "name" => "Situação",
                        "description" => "Indicação sobre a situação em que se encontra o objeto, o seu status dentro do acervo do museu, com a marcação das opções: 1-localizado; 2-não localizado; 3-excluído.",
                        "metadata_type" => "Tainacan\Metadata_Types\Selectbox",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "options" => "1-localizado,2-não localizado,3-excluído",
                            "options_separator" =>	[",","Tab","Enter"]
                        )
                    ),

                    array(
                        "name" => "Denominação",
                        "description" => "Informação do nome que identifica o objeto.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Taxonomy",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "taxonomy_slug" => "tax_preset_denominacao",
                        "metadata_type_options" => array(
                            "allow_new_terms" => "yes",
                            "input_type" => "tainacan-taxonomy-radio",
                            "taxonomy_id" => 0,
                            "visible_options_list" => false
                        )
                    ),
                    // Título para web
                    array(
                        "name" => "Título",
                        "description" => "Informação da denominação dada ao objeto atribuído pelo autor, curador ou pelo profissional da documentação.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),

                    array(
                        "name" => "Autor",
                        "description" => "Informação do nome do autor do objeto (individual ou coletivo).",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Taxonomy",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "taxonomy_slug" => "tax_preset_autor",
                        "metadata_type_options" => array(
                            "allow_new_terms" => "yes",
                            "input_type" => "tainacan-taxonomy-radio",
                            "taxonomy_id" => 0,
                        )
                    ),

                    array(
                        "name" => "Classificação",
                        "description" => "Informação da classificação do objeto segundo o \"Thesaurus para Acervos Museológicos\" ou outros vocabulários controlados.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Taxonomy",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "taxonomy_slug" => "tax_preset_classificacao",
                        "metadata_type_options" => array(
                            "allow_new_terms" => "yes",
                            "input_type" => "tainacan-taxonomy-radio",
                            "taxonomy_id" => 0,
                        )
                    ),

                    array(
                        "name" => "Resumo descritivo",
                        "description" => "Informação do resumo da descrição textual do objeto, apresentando as características que o identifique inequivocamente e sua função original.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Textarea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),

                    array(
                        "name" => "Dimensões",
                        "description" => "Informação das dimensões físicas do objeto, considerando-se as medidas bidimensionais (altura x largura); tridimensionais (altura x largura x profundidade); circulares (diâmetro x espessura) e peso.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Textarea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    // Altura
                    // Largura
                    // Profundidade
                    // Diâmetro
                    // Espessura
                    // Peso
                    array(
                        "name" => "Material/Técnica",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Taxonomy",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "taxonomy_slug" => "tax_preset_material_tecnica",
                        "metadata_type_options" => array(
                            "allow_new_terms" => "yes",
                            "input_type" => "tainacan-taxonomy-radio",
                            "taxonomy_id" => 0,
                        )
                    ),
                    // Material
                    // Técnica
                    array(
                        "name" => "Estado de Conservação",
                        "description" => "Indicação do estado de conservação em que se encontra o objeto na data da inserção das informações. Considerar as opções: Bom, Regular e Ruim.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Selectbox",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "options" => "Bom,Regular,Ruim",
                            "options_separator" =>	[",","Tab","Enter"]
                        )
                    ),

                    array(
                        "name" => "Local de produção",
                        "description" => "Informação da indicação geográfica do local onde o objeto foi confeccionado.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Textarea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),

                    array(
                        "name" => "Data de produção",
                        "description" => "Informação da data ou período de confecção/produção/manufatura do objeto.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Textarea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),

                    array(
                        "name" => "Condições de reprodução",
                        "description" => "Informação para descrever as condições de reprodução do objeto, indicando se há alguma restrição que possa impedir a reprodução/divulgação da imagem do objeto nos meios ou ferramentas de divulgação.",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Textarea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
    
                )
            )
        )
    );