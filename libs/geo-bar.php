<?php 

function get_text($visitors,$city,$page){
    // Verificar opção de exibição texto
    $option_text = get_option('text_geo_option');
    
    if($option_text == "all_pages") :
        $text = get_option('text_geo_leads');
    else :
        $text = get_option('text_geo_leads_' . $page . '');
    endif;
    
    // Fazer replace do texto para exibir
    if($text) :
        $text = str_replace("%cidade","<strong>" . $city['geoplugin_city'] . "</strong>",$text);
        $text = str_replace("%num","<span id='visitors'>" . $visitors . "</span>",$text);
    else:
        $text = "Há <span id='visitors'>" . $visitors . "</span> pessoas em <strong>" . $city['geoplugin_city'] . "</strong> assistindo esse vídeo agora.";
    endif;
    
    return $text;
}

function get_style_bar(){
    $style = get_option( 'position_geo_leads' );
    $style_padrao = "geo-message--fixedtop";

    if($style) :
        return $style;
    else : 
        return $style_padrao;
    endif;
}

function get_color_bar(){
    $color = get_option('color_geo_leads');
    $color_padrao = "#ffffff";
    
    if($color):
        return $color;
    else : 
        return $color_padrao;
    endif;
}

function get_background_bar(){
    $color = get_option('background_geo_leads');
    $color_padrao = "#000000";
    
    if($color):
        return $color;
    else : 
        return $color_padrao;
    endif;
}

function get_fade_out(){
    $delay = get_option('delay_geo_leads');
    $fade = get_option('fade_geo_leads');

    if($fade && $fade != 1){
        $delay = $delay * 1000 * 60;
        
        echo "
        <script>
            (function($) {
                $(window).load(function(){
                    setTimeout(function(){ 
                        $('.geo-message').fadeOut();
                    
                        navFix = $('.geo-message');
                        isTop = navFix.css('top');

                        if(isTop == '0px'){
                            $('html').css('margin-top','0');
                        }
                        
                    }, {$delay});
                });
            })( jQuery );
        </script>
        ";

    }
}

// Styles bar geo leads

function create_bar($num,$page){
    // Datas text
    $visitors = get_visitors($num);
    $city = get_location();
    $style = get_style_bar();
    $text = get_text($visitors,$city,$page);
    $color = get_color_bar();
    $background = get_background_bar();
    
    // Create bar
    $bar = "<div style='color:{$color};background-color:{$background}' class='geo-message {$style}'>{$text}</div>";

    return $bar;
}