<?php

functions ds_theme_assets(){
    wp_enqueue_script(
        'ds-script',
        get_template_directory_uri(). '/js/custom.js',
        array(),
        '1.0',
        'all'
    ):
}

add_action('wp_enqueue_scripts','ds_theme_assets');

?>
