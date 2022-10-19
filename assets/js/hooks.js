if(wp && wp.hooks) {
    /**
     * @collectionsPresets array [ { name: string, description: string, endpoint: string, slug: string } ]
     */
    function getTainacanCollectionsPresets (collectionsPresets) {
        collectionsPresets.push({
            name: "INBCM",
            description: "Descrição do que é o INBCM",
            endpoint: "http://localhost/wp-json/tainacanpreset/v1/execute/inbcm",
            slug: "inbcm-mapper"
        });
        collectionsPresets.push({
            name: "Gestão de acervo",
            description: "Gestão de acervo",
            endpoint: "http://localhost/wp-json/tainacanpreset/v1/execute/manage_collection",
            slug: "mgnts-collections",
            onSucess: function () { return "sucesso" ;},
            onError: function () { return "sem sucesso" ;}
        });
        return collectionsPresets;
    }
    wp.hooks.addFilter("tainacan_collections_presets", "tainacan-hooks", getTainacanCollectionsPresets);
}