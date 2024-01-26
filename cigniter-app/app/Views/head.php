<?php
    $session = session();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>The Cave</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/jquery-ui-1.8.4.custom.css" />
    <link rel="shortcut icon" href="<?= base_url(); ?>images/icon.gif" type="image/x-icon"> 
    
    <script src="<?= base_url(); ?>js/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>js/jquery-ui-1.8.4.custom.min.js" type="text/javascript"></script>
    
    <script src="<?= base_url(); ?>js/jquery.bgiframe.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>js/jquery.dimensions.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>js/jquery.tooltip.min.js" type="text/javascript"></script>
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
