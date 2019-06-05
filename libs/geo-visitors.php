<?php 

// Create cookies

function get_visitors($numberVisitors){
    if($_COOKIE['visitors']) :
        $visitors = $_COOKIE['visitors'];
    else : 
        $visitors = $numberVisitors;
    endif;

    return $visitors;
}

function rand_visitors(){
    $min = get_option('min_geo_leads');
    $max = get_option('max_geo_leads');
    
    if($min && $max) :
        $random = rand($min,$max);
    else :
        $random = rand(1,10);
    endif;
    
    return $random;
}

function create_cookie_views(){
    $cookie_name = "visitors";
    $rand = rand_visitors();
    
    // Expirar em três minutos
    $expiry = time() + 2 * 60;
    $path = parse_url(get_option('siteurl'), PHP_URL_PATH);
    $host = parse_url(get_option('siteurl'), PHP_URL_HOST);
    
    setcookie($cookie_name, $rand, $expiry, $path, $host);
    
    return $rand;
}

