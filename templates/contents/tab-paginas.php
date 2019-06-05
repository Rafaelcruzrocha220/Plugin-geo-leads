<?php 
if(isset($_POST['pages'])){
    update_option( 'pages_geo_leads', $_POST['pages']);
}

if(get_option( 'pages_geo_leads' ) != NULL){
    $pages_allowed = get_option( 'pages_geo_leads' );    
}else{
    $pages_allowed = [];
}

$args = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'exclude' => '',
	'include' => '',
	'meta_key' => '',
	'meta_value' => '',
	'authors' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
); 

$pages = get_pages($args); ?>
    <form method="post">
        <p class="subtitle-geo-leads"><?= __('Selecione apenas as páginas que vai exibir o widget.','geo-leads') ?></p>
        <?php if($pages) :
            foreach ($pages as $key => $page) : ?>
                <div class="form-check">
                    <input class="form-check-input checkbox-geo" name="pages[]" type="checkbox" value="<?= $page->ID; ?>" id="<?= $page->ID; ?>" <?= in_array($page->ID,$pages_allowed) ? "checked='checked'" : "" ?>>
                    <label class="form-check-label" for="<?= $page->ID; ?>">
                        <?= $page->post_title; ?>
                    </label>
                </div>
            <?php endforeach;
        else: ?>
                <div class="form-check">
                    <label class="form-check-label" for="defaultCheck1">
                        Não existe nenhuma página criada.
                    </label>
                </div>
        <?php endif;?>  
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>




