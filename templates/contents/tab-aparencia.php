<?php 

// Update dates form
if($_POST['position']){
    update_option( 'position_geo_leads', $_POST['position']);
}

if($_POST['fadeout']){
    update_option( 'fade_geo_leads', $_POST['fadeout']);
}

if($_POST['delay']){
    update_option( 'delay_geo_leads', $_POST['delay']);
}

if($_POST['background']){
    update_option( 'background_geo_leads', $_POST['background']);
}

if($_POST['color']){
    update_option( 'color_geo_leads', $_POST['color']);
}

?>

<form class="geo-form" method="post">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label class="title-form" for="texto">Selecione a posição do widget: </label>
            <p class="subtitle-form">Posicione a barra do widget onde você deseja que apareça em seu site.</p>
            <select name="position" class="custom-select select-geo">
                <option value="geo-message--fixedtop" <?= get_option('position_geo_leads') == "geo-message--fixedtop" ? "selected" : "" ?> >Fixo no canto superior da tela.</option>
                <option value="geo-message--fixedbottom" <?= get_option('position_geo_leads') == "geo-message--fixedbottom" ? "selected" : "" ?> >Fixo no canto inferior da tela.</option>
            </select>
        </div>
        
        <div class="form-group col-md-12">
            <label class="title-form" for="fadeout">Efeito Fade out: </label>
            <p class="subtitle-form">Remover a barra após determinado tempo.</p>
            <select name="fadeout" id="fadeout" class="custom-select select-geo">
                <option value="1" <?= get_option('fade_geo_leads') == "1" ? "selected" : "" ?>>Não</option>
                <option value="2" <?= get_option('fade_geo_leads') == "2" ? "selected" : "" ?> >Sim</option>
            </select>
        </div>

        <div class="form-group col-md-12">
            <label class="title-form" for="delay">Tempo Fade out: </label>
            <p class="subtitle-form">Tempo em minutos que a barra vai ficar visível para o usúario</p>
            <input type="number" class="form-control input-geo" name="delay" value="<?= get_option('delay_geo_leads') ?>" id="delay" placeholder="Digite em minutos" autocomplete="off" readonly>
        </div>
        
        <div class="form-group col-md-4">
            <label class="title-form" for="color">Fonte: </label>
            <p class="subtitle-form">Selecione a cor que o texto irá exibir.</p>
            <input type="color" class="form-control input-geo" name="color" value="<?= get_option('color_geo_leads') ?>" id="color">
        </div>
        
        <div class="form-group col-md-4">
            <label class="title-form" for="background">Background: </label>
            <p class="subtitle-form">Selecione a cor de fundo do widget.</p>
            <input type="color" class="form-control input-geo" name="background" value="<?= get_option('background_geo_leads') ?>" id="background">
        </div>
        

    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>