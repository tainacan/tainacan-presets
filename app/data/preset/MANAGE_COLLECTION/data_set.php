<?php
    global $data_sets;
    $data_sets['manage_collection'] = array(
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
            "movimentacao" => array(
                "name" => "Movimentação",
                "description" => "Movimentação",
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
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
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
                        "multiple" => "yes",
                        "collection_key" => "no",
                        "taxonomy_slug" => "tax_motivo_movimentacao",
                        "metadata_type_options" => array(
                            "allow_new_terms" => "no",
                            "input_type" => "tainacan-taxonomy-selectbox",
                            // "taxonomy_id" => 0,
                            "visible_options_list" => false
                        )
                    ),
                    array(
                        "name" => "Responsável por acompanhar movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Notas/Observações sobre a movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Data de Saída (inicial)",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "no",
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
                        "required" => "no",
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
                        "name" => "Relacionamento com objeto(s) do acervo",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Relacionamento com outros registros de movimentação",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
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
                            "options" => "à mão\ncarrinho\ntransportadora\nautomóvel\npróprio",
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
                        "name" => "Finalidade",
                        "description" => "",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no",
                        "metadata_section_slug" => "emprestimo_entrada"
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
                    )
                )
            ),
            "conservacao" => array(
                "name" => "Conservação",
                "description" => "Conservação",
                "status" => "publish",
                "metadata_sections" => array(),
                "metadatas" => array(
                    array(
                        "name" => "Título",
                        "description" => "Título (denominação da ação)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
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
                        "required" => "no",
                        "multiple" => "no",
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
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
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
                        "required" => "no",
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
                        "name" => "Fotografias do processo executado",
                        "description" => "Fotografias do processo executado",
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
                    )
                    // Fotografias do processo executado (Permitir inserção de fotografias das atividades)
                    // Relacionamento com objeto da coleção de acervo museológico: Permitir relacionamento com o objeto no acervo;
                    // Relacionamento com outros itens da mesma coleção de conservação: Permitir relacionamento com os registros anteriores de conservação;
                    // Relacionamento com itens de movimentação: Permitir Relacionamento com os registros de movimentação (Adepender do processo é necessário o deslocamento do objeto)
                )
            ),
            "restauracao" => array(
                "name" => "Restauração",
                "description" => "",
                "status" => "publish",
                "metadata_sections" => array(),
                "metadatas" => array(
                    array(
                        "name" => "Título",
                        "description" => "Título (denominação da ação)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
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
                        "required" => "no",
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
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
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
                        "required" => "no",
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
                    )
                    // • Anexos: O processo pode gerar arquivos como imagens, e documentos (Word/PDF), então espera-se que seja possível anexar tais documentos ao registro.
                    // • Relacionamento com objeto da coleção de acervo museológico: Permitir relacionamento com o objeto no acervo;
                    // • Relacionamento com outros itens da mesma coleção de restauração: Permitir relacionamento com os registros anteriores de restauração;
                    // • Relacionamento com itens de movimentação: Permitir Relacionamento com os registros de movimentação (Adepender do processo é necessário o deslocamento do objeto);
                    // • Relacionamento com itens de conservação: Permitir Relacionamento com os registros de conservação.
                )
            ),
            "descarte" => array(
                "name" => "Descarte",
                "description" => "",
                "status" => "publish",
                "metadata_sections" => array(),
                "metadatas" => array(
                    array(
                        "name" => "Título",
                        "description" => "Título (denominação da ação)",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Text",
                        "status" => "publish",
                        "required" => "yes",
                        "multiple" => "no",
                        "collection_key" => "no"
                    ),
                    array(
                        "name" => "Data do descarte;",
                        "description" => "Data do descarte;",
                        "metadata_type" => "Tainacan\\Metadata_Types\\Date",
                        "status" => "publish",
                        "required" => "no",
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
                        "metadata_type" => "Tainacan\\Metadata_Types\\TextArea",
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
                        "required" => "no",
                        "multiple" => "no",
                        "collection_key" => "no"
                    )
                    // • Relacionamento com objeto da coleção de acervo museológico: Permitir relacionamento com o objeto no acervo;
                    // • Relacionamento com itens de movimentação: Permitir Relacionamento com os registros de movimentação.
                )
            )
        )
    );