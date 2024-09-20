<?php

function interfolio_excerpt_length( $length ) {
    if ( is_admin() ) {
            return $length;
    }
    return 30;
}
add_filter( 'excerpt_length', 'interfolio_excerpt_length', 999 );


function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
