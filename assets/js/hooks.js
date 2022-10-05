console.log("wp_enqueue_script");
if(wp && wp.hooks) {
    console.log("hooks start");
    /**
     * @collectionsPresets array [ { name: string, description: string, endpoint: string, slug: string } ]
     */
    function getTainacanCollectionsPresets (collectionsPresets) {
        collectionsPresets.push({
            name: "INBCM",
            description: "Descrição do que é o INBCM",
            endpoint: "localhost",
            slug: "inbcm-mapper"
        });
        collectionsPresets.push({
            name: "Gestão de acervo",
            description: "Gestão de acervo",
            endpoint: "http://localhost/wp-json/tainacanpreset/v1/execute/manage_collection",
            slug: "mgnts-collections"
        });
        console.log("collectionsPresets", collectionsPresets);
        return collectionsPresets;
    }
    wp.hooks.addFilter("tainacan_collections_presets", "tainacan-hooks", getTainacanCollectionsPresets);
}