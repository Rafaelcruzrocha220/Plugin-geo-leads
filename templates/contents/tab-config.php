<?php $exampleText = "Há %num pessoas em %cidade assistindo esse vídeo agora.";

// Update dates form
if($_POST['texto']){
    update_option( 'text_geo_leads', $_POST['texto']);
}

if($_POST['min']){
    update_option( 'min_geo_leads', $_POST['min']);
}

if($_POST['max']){
    update_option( 'max_geo_leads', $_POST['max']);
}

// Update dates form
if($_POST['texto']){ update_option( 'text_geo_leads', $_POST['texto']); }

// Text option
if($_POST['text_option']){ update_option( 'text_geo_option', $_POST['text_option']); }

// Verify pages allowed
if(get_option( 'pages_geo_leads' ) != NULL){ $pages_allowed = get_option( 'pages_geo_leads' );}else{$pages_allowed = [];}

// Update text by pages
foreach ($pages_allowed as $page_key => $page) {
    if($_POST['texto_'. $page .'']) :
        update_option( 'text_geo_leads_' . $page . '', $_POST['texto_'. $page .'']);
    endif;
}

?>

<form method="post">
    <div class="form-row">
       
        
        <div class="form-group col-md-12">
            <label class="title-form" for="min">Número mínimo: </label>
            <p class="subtitle-form">Adicione o <b>mínimo de pessoas</b> que podem estar dísponiveis para assistir ao vídeo.</p>
            <input type="number" class="form-control input-geo" name="min" value="<?= get_option('min_geo_leads') ?>" id="min" placeholder="Digite o mínimo" autocomplete="off">
        </div>

        <div class="form-group col-md-12">
            <label class="title-form" for="min">Número máximo: </label>
            <p class="subtitle-form">Adicione o <b>máximo de pessoas</b> que podem estar dísponiveis para assistir ao vídeo.</p>
            <input type="number" class="form-control input-geo" name="max" value="<?= get_option('max_geo_leads') ?>" id="min" placeholder="Digite o máximo" autocomplete="off">
        </div>
        <div class="form-group col-md-12">
            <label class="title-form" for="texto">Exibir texto: </label>
            <p class="subtitle-form">Selecione a forma que os textos vai exibir no widget.</p>
            <select id="text_option" name="text_option" class="custom-select select-geo">
                <option value="all_pages" <?= get_option('text_geo_option') != "text_per_pages" ? "selected" : "" ?> >Todas as páginas</option>
                <option value="text_per_pages" <?= get_option('text_geo_option') == "text_per_pages" ? "selected" : "" ?> >Texto por página.</option>
            </select>
        </div>

        <div id="todas_paginas" class="form-group col-md-12">
            <label class="title-form" for="texto">Adicione seu texto: </label>
            <p class="subtitle-form">Insira <b>%cidade</b> no texto para exibir a cidade e <b>%num</b> para exibir número de pessoas.</p>
            <input type="text" class="form-control input-geo" name="texto" id="texto" value="<?= get_option('text_geo_leads') ?>" placeholder="<?= $exampleText?>" autocomplete="off">
        </div>

        <div id="texto_por_pagina" class="col-md-12">
            <?php 
            if($pages_allowed) : 
                foreach ($pages_allowed as $page_key => $page) : ?>
                    <div class="form-group">
                        <label class="title-form" for="texto"><?= get_post($page)->post_title ?>: </label>
                        <p class="subtitle-form">Insira <b>%cidade</b> no texto para exibir a cidade e <b>%num</b> para exibir número de pessoas.</p>
                        <input type="text" class="form-control input-geo" name="texto_<?=$page?>" id="texto" value="<?= get_option('text_geo_leads_' . $page . '') ?>" placeholder="<?= $exampleText?>" autocomplete="off">
                    </div>
            <?php endforeach;
            else: ?>
                <div class="form-group"><p class="subtitle-form"><?= __('Você ainda não adicionou páginas permitidas para o plugin.','geo-leads')?></p></div>
            <?php endif; ?>
        </div>
        
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<!-- Sends wordpress option -->
