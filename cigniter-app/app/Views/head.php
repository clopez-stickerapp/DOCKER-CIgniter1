<?php
    $cave = $session->getTempdata("whichCave") ?? 'cave';
    $arr = explode('/', $_SERVER['REQUEST_URI']);
    $site = end($arr);
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title><?= $cave == 'cave' ? 'The Cave' : 'The Laser Cave'; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= link_tag('public/css/laser_style.css'); ?>
    <?= link_tag('public/css/jquery-ui-1.8.4.custom.css'); ?>
    <?= link_tag('public/images/icon.gif', 'shortcut icon', 'image/x-icon'); ?>
    
    <?= script_tag("public/js/jquery-1.4.2.min.js"); ?>
    <?= script_tag("public/js/jquery-ui-1.8.4.custom.min.js"); ?>
    <?= script_tag("public/js/jquery.bgiframe.js"); ?>
    <?= script_tag("public/js/jquery.dimensions.js"); ?>
    <?= script_tag("public/js/jquery.tooltip.min.js"); ?>
</head>
<body>
<div id="wrapper">
	<div id="header">
        <a id="logo" href="<?= base_url(); ?>"><?= $cave == 'cave' ? 'The Cave' : 'The Laser Cave'; ?></a>
        
        <ul id="nav">
            <li><a href="<?= base_url(); ?>ladda_upp" class="<?= $site == 'ladda_upp'?'active':''; ?>">Ladda upp</a></li>
            <li><a href="<?= base_url(); ?>ordrar" class="<?= $site == 'ordrar'?'active':''; ?>">Ordrar</a></li>
            <?php if($cave == 'laser'): ?>
                <li><a href="<?= base_url(); ?>ordrar/pp_klar" class="<?= $site == 'ladda_upp'?'active':''; ?>">PP Klar</a></li>
            <?php endif; ?>
            <li><a href="<?= base_url(); ?>ordrar/printad" class="<?= $site == 'printad'?'active':''; ?>">Printade</a></li>
            <?php if($cave == 'laser'): ?>
                <li><a href="<?= base_url(); ?>ordrar/laser_klar" class="<?= $site == 'ladda_upp'?'active':''; ?>">Laser Klar</a></li>
            <?php endif; ?>
            <li><a href="<?= base_url(); ?>ordrar/klar" class="<?= $site == 'klar'?'active':''; ?>">Klara</a></li>
            <li><a href="<?= base_url(); ?>ordrar/arkiverad" class="<?= $site == 'arkiverad'?'active':''; ?>">Arkiv</a></li>
        </ul>
        
        <a class="settings" href="<?= base_url() ?>settings">Inställningar</a>
	</div>
    <div id="content_wrapper">
    	<div id="content">
        	<?= $session->getTempdata('message'); ?>
        	<?php $session->remove('message'); ?>
