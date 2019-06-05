<?php require_once WP_PLUGIN_DIR . "/plugin-geo-leads/libs/geo-user.php"; 

$info = get_location();

?>

<div class="row">
    <!-- IP -->
    <div class="form-group col-md-12">
        <label class="title-form" for="delay"><b><?= __('Seu IP','geo-leads') ?></b>:</label>
        <input type="text" class="form-control input-geo" name="delay" value="<?= $info['geoplugin_request'] ?>" id="delay" readonly>
    </div>
    <!-- Regiao -->
    <div class="form-group col-md-12">
        <label class="title-form" for="delay"><b><?= __('Região','geo-leads') ?></b>:</label>
        <input type="text" class="form-control input-geo" name="delay" value="<?= $info['geoplugin_region'] ?>" id="delay" readonly>
    </div>
    <!-- Uf -->
    <div class="form-group col-md-12">
        <label class="title-form" for="delay"><b><?= __('UF','geo-leads') ?></b>:</label>
        <input type="text" class="form-control input-geo" name="delay" value="<?= $info['geoplugin_regionCode'] ?>" id="delay" readonly>
    </div>
    <!-- Cidade -->
    <div class="form-group col-md-12">
        <label class="title-form" for="delay"><b><?= __('Cidade','geo-leads') ?></b>:</label>
        <input type="text" class="form-control input-geo" name="delay" value="<?= $info['geoplugin_city'] ?>" id="delay" readonly>
    </div>
    <!-- Pais -->
    <div class="form-group col-md-12">
        <label class="title-form" for="delay"><b><?= __('Pais','geo-leads') ?></b>:</label>
        <input type="text" class="form-control input-geo" name="delay" value="<?= $info['geoplugin_countryName'] ?>" id="delay" readonly>
    </div>
    <!-- Latitude -->
    <div class="form-group col-md-12">
        <label class="title-form" for="delay"><b><?= __('Latitude','geo-leads') ?></b>:</label>
        <input type="text" class="form-control input-geo" name="delay" value="<?= $info['geoplugin_latitude'] ?>" id="delay" readonly>
    </div>
    <!-- Longitude -->
    <div class="form-group col-md-12">
        <label class="title-form" for="delay"><?= __('Longitude','geo-leads') ?></b>:</label>
        <input type="text" class="form-control input-geo" name="delay" value=" <?= $info['geoplugin_longitude'] ?>" id="delay" readonly>
    </div>
</div>
