(function($) {
    $(document).ready(function(){
        fadeInput = $("#fadeout");
        $("#navbar").removeClass('disable-nav');
        inputDelayFade(fadeInput);
        
        fadeInput.change(function(){
            inputDelayFade(fadeInput);
        })
    });

    function inputDelayFade(fade){
        delayInput = $("#delay");
        value = fade.val();
                
        if(value == 2){
            delayInput.removeAttr('readonly');
        }else if(value == 1){
            delayInput.attr('readonly','true');
            delayInput.val('0');
        }
    }
})( jQuery );