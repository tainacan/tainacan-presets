<?php
    global $data_sets;
    $data_sets['manage_collection'] = array(
        'verifiers' => array(
            'exist' => array(
                'collections' => array(
                    'acervomuseologico'
                )
            )
        ),
        'taxonomies' => array(
            "tax_motivo_movimentacao" => array(
                "name" => "Motivo da Movimentação",
                "slug" => "tax_motivo_movimentacao",
                "description" => "Motivo da Movimentação.",
                "status" => "publish",
                "allow_insert" => "yes",
                "file" => "MANAGE_COLLECTION/files/tax_motivo_movimentacao.csv"
            )
        ),
        'collections' => array(
            "gestaomovimentacao" => array(
                "name" => "Movimentação",
                "description" => "Movimentação",
                "slug" => "gestaomovimentacao",
                "status" => "publish",
                "metadata_sections" => array(
                    array(
                        "description" => "Empréstimo de saída",
                        "name" => "Empréstimo de saída",
                        "slug" => "emprestimo_saida",
                        "status" => "publish"
                    ),
                    array(
                        "description" => "Empréstimo de entrada",
                        "name" => "Empréstimo de entrada",
                        "slug" => "emprestimo_entrada",
                        "status" => "publish"
                    ),
                    array(
                        "description" => "Exposição",
                        "name" => "Exposição",
                        "slug" => "exposicao",
                        "status" => "publish"
                    ),
                    array(
                        "description" => "Atendimento de pesquisa",
                        "name" => "Atendimento de pesquisa",
                        "slug" => "atendimento_pesquisa",
                        "status" => "publish"
                    ),
                    array(
                        "description" => "Documentação",
                        "name" => "Documentação",
                        "slug" => "documentacao",
                        "status" => "publish"
                    ),
                ),
                "metadatas" => array(
                    array(
                        "name" => "Título",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Core_Title",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Tipo da movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Selectbox",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "options" => "Interno\nExterno",
                            "options_separator" => [","]
                        )
                    ),
                    array(
                        "name" => "Motivo da Movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Taxonomy",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "taxonomy_slug" => "tax_motivo_movimentacao",
                        "metadata_type_options" => array(
                            "allow_new_terms" => "no",
                            "input_type" => "tainacan-taxonomy-radio",
                            "visible_options_list" => false
                        )
                    ),
                    array(
                        "name" => "Responsável por acompanhar movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "yes",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Notas/Observações sobre a movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Core_Description",
                        "status" => "publish",
                        "required" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Data de Saída (inicial)",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Data de Retorno (final)",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Local de habitual (armazenamento/exposição)",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Local atual (local em que a obra está armazenada/exposta)",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Outros registros de movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"gestaomovimentacao",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    ),
                    array(
                        "name" => "Método (método utilizado na movimentação)",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Selectbox",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "options" => "à mão\ncarrinho\ntransportadora\nautomóvel próprio",
                            "options_separator" => [","]
                        )
                    ),
                    array(
                        "name" => "Link do processo no SEI",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Finalidade",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "emprestimo_saida"
                    ),
                    array(
                        "name" => "Título da exposição",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "exposicao"
                    ),
                    array(
                        "name" => "Data de início da exposição",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "exposicao"
                    ),
                    array(
                        "name" => "Data de fim da exposição",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "exposicao"
                    ),
                    array(
                        "name" => "Dados do organizador/curadoria",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "exposicao"
                    ),
                    array(
                        "name" => "Local da exposição",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "exposicao"
                    ),
                    array(
                        "name" => "Nota/Observações sobre a exposição",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "exposicao"
                    ),
                    array(
                        "name" => "Dados do pesquisador",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "atendimento_pesquisa"
                    ),
                    array(
                        "name" => "Dados da pesquisa",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "atendimento_pesquisa"
                    ),
                    array(
                        "name" => "Finalidade",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "atendimento_pesquisa"
                    ),
                    array(
                        "name" => "Finalidade (Inventário/Fotografia)",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "documentacao"
                    ),
                    array(
                        "name" => "Objeto do acervo museológico",
                        "description" => "objeto da coleção de acervo museológico",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"acervomuseologico",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    )

                )
            ),
            "gestaoconservacao" => array(
                "name" => "Conservação",
                "description" => "Conservação",
                "slug" => "gestaoconservacao",
                "status" => "publish",
                "metadata_sections" => array(),
                "metadatas" => array(
                    array(
                        "name" => "Título",
                        "description" => "Título (denominação da ação)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Core_Title",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Dados do responsável pelo procedimento",
                        "description" => "Dados do responsável pelo procedimento",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "yes",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Análise da condição do objeto",
                        "description" => "Análise da condição do objeto (avaliação e o tratamento adequado)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Notas/Observações sobre a conservação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Core_Description",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Data de ínicio do procedimento",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Data de fim do procedimento",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Atividades de conservação",
                        "description" => "Atividades de conservação (higienização, acondicionamento, embalagem, etc.)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Data da próxima avaliação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Conservações relacionadas",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"gestaoconservacao",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    ),
                    array(
                        "name" => "Itens da movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"gestaomovimentacao",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    ),
                    array(
                        "name" => "Objeto do acervo museológico",
                        "description" => "objeto da coleção de acervo museológico",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"acervomuseologico",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    )
                    // Fotografias do processo executado (Permitir inserção de fotografias das atividades)
                )
            ),
            "gestaorestauracao" => array(
                "name" => "Restauração",
                "description" => "",
                "slug" => "gestaorestauracao",
                "status" => "publish",
                "metadata_sections" => array(),
                "metadatas" => array(
                    array(
                        "name" => "Título",
                        "description" => "Título (denominação da ação)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Core_Title",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Dados do responsável pelo procedimento",
                        "description" => "Dados do responsável pelo procedimento. (Possibilidade do procedimento ser realizado por agente externo)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Tratamento realizado",
                        "description" => "Tratamento realizado (Ações executadas no restauro do objeto)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Notas/Observações sobre a restauração",
                        "description" => "Notas/Observações sobre a restauração",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Core_Description",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Finalidade",
                        "description" => "Finalidade",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Data de ínicio do procedimento",
                        "description" => "Data de ínicio do procedimento",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Data de fim do procedimento",
                        "description" => "Data de fim do procedimento",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Link para o processo no SEI",
                        "description" => "Link para o processo no SEI",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Restaurações relacionadas",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"gestaorestauracao",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    ),
                    array(
                        "name" => "Itens da movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"gestaomovimentacao",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    ),
                    array(
                        "name" => "Itens da conservação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"gestaoconservacao",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    ),
                    array(
                        "name" => "Objeto do acervo museológico",
                        "description" => "objeto da coleção de acervo museológico",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"acervomuseologico",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    )
                    // • Anexos: O processo pode gerar arquivos como imagens, e documentos (Word/PDF), então espera-se que seja possível anexar tais documentos ao registro.
                )
            ),
            "gestaodescarte" => array(
                "name" => "Descarte",
                "description" => "",
                "slug" => "gestaodescarte",
                "status" => "publish",
                "metadata_sections" => array(),
                "metadatas" => array(
                    array(
                        "name" => "Título",
                        "description" => "Título (denominação da ação)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Core_Title",
                        "status" => "publish",
                        "required" => "yes",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Data do descarte;",
                        "description" => "Data do descarte;",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Modalidade do descarte",
                        "description" => "Modalidade do descarte (alienação, doação, permuta, transferência, destruição, repatriação)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Motivo do descarte",
                        "description" => "Motivo do descarte",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Nota/observação sobre o descarte",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Core_Description",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Dados do responsável pelo descarte",
                        "description" => "Dados do responsável pelo descarte",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "itens de movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"gestaomovimentacao",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    ),
                    array(
                        "name" => "Objeto do acervo museológico",
                        "description" => "objeto da coleção de acervo museológico",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Relationship",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "metadata_type_options" => array(
                            "accept_draft_items" => "no",
                            "collection_id" => 	"acervomuseologico",
                            "display_in_related_items" => "no",
                            "search" => ""
                        )
                    )
                )
            )
        )
    );