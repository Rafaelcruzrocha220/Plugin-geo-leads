<?php $exampleText = "Há %num pessoas em %cidade assistindo esse vídeo agora.";


?>

<div class="row">
    <p class="subtitle-geo-leads"><?= __('Exiba a informação do usuário em títulos de post ou páginas,em contéudo ou em outras áreas do site utilizando de shortcodes.','geo-leads') ?></p>
    <!-- City -->
    <div class="form-group col-md-12">
        <label class="title-form" for="delay"><b><?= __('Cidade','geo-leads') ?></b>:</label>
        <input type="text" class="form-control input-geo" name="delay" value="[geo_leads_info type='city']" id="delay" readonly>
    </div>
    <!-- Region -->
    <div class="form-group col-md-12">
        <label class="title-form" for="delay"><b><?= __('Estado','geo-leads') ?></b>:</label>
        <input type="text" class="form-control input-geo" name="delay" value="[geo_leads_info type='region']" id="delay" readonly>
    </div>
    <!-- Region code -->
    <div class="form-group col-md-12">
        <label class="title-form" for="delay"><b><?= __('Estado sigla','geo-leads') ?></b>:</label>
        <input type="text" class="form-control input-geo" name="delay" value="[geo_leads_info type='regionCode']" id="delay" readonly>
    </div>
</div>


