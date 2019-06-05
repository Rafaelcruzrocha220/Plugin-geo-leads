<?php 

function template_menu_geo_leads(){ ?>
    <section id="tabs" class="project-tab">
        <div style="max-width: 970px;" class="container">
            <div class="row">
                <div class="col-md-12"><h3 class="title-geo-leads"><?= __('Geo leads','geo-leads') ?></h3></div>
                <div class="col-md-12"><p class="subtitle-geo-leads"><?= __('Adicione um widget em seu site para gerar leads, baseado na localização atual do usúario e também em quantas pessoas estão assistindo o mesmo vídeo próximo a sua região.','geo-leads') ?></p></div>
                <div class="col-md-12">
                    <nav id="navbar" class="disable-nav">
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-config-tab" data-toggle="tab" href="#nav-config" role="tab" aria-controls="nav-config" aria-selected="true">Configurações</a>
                            <a class="nav-item nav-link" id="nav-aparencia-tab" data-toggle="tab" href="#nav-aparencia" role="tab" aria-controls="nav-aparencia" aria-selected="false">Aparência</a>
                            <a class="nav-item nav-link" id="nav-paginas-tab" data-toggle="tab" href="#nav-paginas" role="tab" aria-controls="nav-paginas" aria-selected="false">Páginas</a>
                            <a class="nav-item nav-link" id="nav-shortcode-tab" data-toggle="tab" href="#nav-shortcode" role="tab" aria-controls="nav-shortcode" aria-selected="false">Shortcode</a>
                            <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">Informações</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- Tab configurações -->
                        <div class="tab-pane fade show active" id="nav-config" role="tabpanel" aria-labelledby="nav-config-tab">
                            <?php include dirname(__FILE__) . '/contents/tab-config.php'?>
                        </div>
                        <div class="tab-pane fade" id="nav-aparencia" role="tabpanel" aria-labelledby="nav-aparencia-tab">
                            <?php include dirname(__FILE__) . '/contents/tab-aparencia.php'?>
                        </div>
                        <div class="tab-pane fade" id="nav-paginas" role="tabpanel" aria-labelledby="nav-paginas-tab">
                            <?php include dirname(__FILE__) . '/contents/tab-paginas.php'?>
                        </div>
                        <div class="tab-pane fade" id="nav-shortcode" role="tabpanel" aria-labelledby="nav-shortcode-tab">
                            <?php include dirname(__FILE__) . '/contents/tab-shortcode.php'?>
                        </div>
                        <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                            <?php include dirname(__FILE__) . '/contents/tab-info.php'?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }