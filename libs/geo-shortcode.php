<?php

require_once dirname( __FILE__ ) . "/geo-user.php";

function geo_leads_shortcode( $paramns ){

    $atts = shortcode_atts( array('type' => ''), $paramns );
    $type = $paramns['type'];
    $location = get_location();

    switch ($type) {
        case 'city':
            return $location['geoplugin_city'];

        case 'region':
            return $location['geoplugin_region'];

        case 'regionCode':
            return $location['geoplugin_regionCode'];

        default:
           return;
    }

}

function geo_leads_title_shortcode() {
    $title = get_the_title();

    $short_city = "[geo_leads_info type='city']";
    $short_region = "[geo_leads_info type='region']";
    $short_regionCode = "[geo_leads_info type='regionCode']";

    if (strpos($title, $short_city) !== false) {
        $cidade = do_shortcode( $short_city );
        $title_update = str_replace($short_city,$cidade,$title);

        echo "<script>document.title = '" . $title_update . "';</script>";
    }

    else if (strpos($title, $short_region) !== false){
        $estado = do_shortcode( $short_region );
        $title_update = str_replace($short_region,$estado,$title);
         
        echo "<script>document.title = '" . $title_update . "';</script>";
    }
    
    else if (strpos($title, $short_regionCode) !== false){
        $sigla = do_shortcode( $short_regionCode );
        $title_update = str_replace($short_regionCode,$sigla,$title);
         
        echo "<script>document.title = '" . $title_update . "';</script>";
    }
    else return $title;
}
