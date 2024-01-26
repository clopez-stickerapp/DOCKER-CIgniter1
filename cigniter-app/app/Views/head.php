<?php
    $session = session();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>The Cave</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= link_tag('public/css/style.css'); ?>
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
        <a id="logo" href="<?= base_url(); ?>">The Cave</a>
        
        <ul id="nav">
            <li><a href="<?= base_url(); ?>ladda_upp">Ladda upp</a></li>
            <li><a href="<?= base_url(); ?>ordrar">Ordrar</a></li>
            <li><a href="<?= base_url(); ?>ordrar/printad">Printade</a></li>
            <li><a href="<?= base_url(); ?>ordrar/klar">Klara</a></li>
            <li><a href="<?= base_url(); ?>ordrar/arkiverad">Arkiv</a></li>
        </ul>
        
        <a class="settings" href="<?= base_url() ?>settings">Inställningar</a>
	</div>
    <div id="content_wrapper">
    	<div id="content">
        	<?= $session->getTempdata('message'); ?>
