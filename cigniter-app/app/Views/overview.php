<?php head() ?>

<h1>Översikt</h1>

<span class="label clear"><a href="<?php echo base_url() ?>ordrar">Obehandlade</a></span>
<span class="input">(<b><?php echo $ordrar ?></b>)</span>
<span class="label"><a href="<?php echo base_url() ?>ordrar/printad">Printade</a></span>
<span class="input">(<b><?php echo $printade ?></b>)</span>
<span class="label"><a href="<?php echo base_url() ?>ordrar/klar">Klara</a></span>
<span class="input">(<b><?php echo $klara ?></b>)</span>
<span class="label"><a href="<?php echo base_url() ?>ordrar/arkiverad">Arkiverade</a></span>
<span class="input">(<b><?php echo $arkiverade ?></b>)</span>

<?php foot() ?>