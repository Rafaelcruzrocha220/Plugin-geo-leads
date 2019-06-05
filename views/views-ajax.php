<?php 

function call_ajax_wp(){
    $dir = admin_url("admin-ajax.php?action=my_action");
    $rand = rand(1,5);
    $delay = $rand * 1000 * 60;

    echo "<script>
        jQuery(document).ready(function($) {
            setInterval(function(){ 
                $.ajax({
                    url: '{$dir}',
                    method: 'POST',
                    data: {id:'teste'},
                    success: function(response){
                        console.log(response);
                        var size = response.length - 1;
                        var number = response.substring(0,size);

                        $('#visitors').html(number);
                    },
                    error: function(error){
                        alert(error);
                    }
                });
            }, {$delay});
        });
    </script>";
}

call_ajax_wp();