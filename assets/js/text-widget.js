(function($) {
    $(document).ready(function(){
        text_option = $("#text_option");
        
        inputDelayFade(text_option);
        
        text_option.change(function(){
            inputDelayFade(text_option);
        })
    });

    function inputDelayFade(text_option){
        value = text_option.val();
        field_all_pages = $("#todas_paginas");
        field_per_pages = $("#texto_por_pagina");

        if(value == "text_per_pages"){
            field_per_pages.css('display','block');
            field_all_pages.css('display','none');
        }
        else{
            field_per_pages.css('display','none');
            field_all_pages.css('display','block');
        }
    }
})( jQuery );