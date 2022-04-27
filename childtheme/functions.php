<?php
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');
function enqueue_parent_styles() {
    /* hent parent stylesheet i parenttemaets mappe */
    
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('parent-style', get_template_directory_uri().'/forside.css');
    /* forside.css er hentet for at overskrive style.css når styling kun gælder for forsiden */
}
?>