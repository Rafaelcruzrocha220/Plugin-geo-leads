<?php

function get_ip(){
    
    if (!empty($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != "::1" && $_SERVER['REMOTE_ADDR'] != "127.0.0.1")
    {
        //check for ip from share internet
        $ip = $_SERVER["REMOTE_ADDR"];

    }
    else if($_SERVER['REMOTE_ADDR'] == "::1" OR $_SERVER['REMOTE_ADDR'] == "127.0.0.1")
    {
        $json = file_get_contents('https://geoip-db.com/json');
        $data = json_decode($json);
        $ip = $data->IPv4;
        
    }
    
    return $ip;
}

function get_location(){
    $ipv4 = get_ip();

    $ip = filter_var($ipv4, FILTER_VALIDATE_IP);
    $ip = ($ip === false) ? '0.0.0.0' : $ip;

    $locationArray = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip));
    
    return $locationArray;
}
