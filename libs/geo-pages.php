<?php 

// Pages

function get_page_allowed($id){
    $pages = get_option( 'pages_geo_leads' );

    if($pages != NULL && in_array($id,$pages)):
        return TRUE;
    else: 
        return FALSE;
    endif;
}
