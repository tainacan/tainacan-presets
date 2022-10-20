if(wp && wp.hooks) {
    /**
     * @collectionsPresets array [ { name: string, description: string, endpoint: string, slug: string } ]
     */
    function getTainacanCollectionsPresets (collectionsPresets) {
        const endpointUrl = location.protocol + '//' + location.host;
        const endpointAPIbase = 'wp-json/tainacanpreset/v1/execute';
        collectionsPresets.push({
            name: "INBCM",
            description: "Descrição do que é o INBCM",
            endpoint: `${endpointUrl}/${endpointAPIbase}/inbcm`,
            slug: "inbcm-mapper"
        });
        collectionsPresets.push({
            name: "Gestão de acervo",
            description: "Gestão de acervo",
            endpoint: `${endpointUrl}/${endpointAPIbase}/manage_collection`,
            slug: "mgnts-collections",
            onSuccess: function (response) { return "Success"; },
            onError: function (response) { return "Error"; }
        });
        return collectionsPresets;
    }
    wp.hooks.addFilter("tainacan_collections_presets", "tainacan-hooks", getTainacanCollectionsPresets);
}
