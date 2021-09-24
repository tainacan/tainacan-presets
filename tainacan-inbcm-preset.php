<?php

add_action( 'init', function() {
    global $cidades_brasileiras, $estados_brasileiros;
    $cidades = file_get_contents( plugin_dir_url(__FILE__) . 'metadata_type/cidades.json' );
    $cidades_brasileiras = json_decode( $cidades );

    $estados = file_get_contents( plugin_dir_url(__FILE__) . 'metadata_type/estados.json' );
    $estados_brasileiros = json_decode( $estados );
} );

?>
