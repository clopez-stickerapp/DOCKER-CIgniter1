<?php head(); ?>

<h1>Översikt</h1>

<span class="label clear"><a href="<?= base_url() ?>ordrar">Obehandlade</a></span>
<span class="input">(<b><?= $ordrar ?></b>)</span>
<span class="label"><a href="<?= base_url() ?>ordrar/printad">Printade</a></span>
<span class="input">(<b><?= $printade ?></b>)</span>
<span class="label"><a href="<?= base_url() ?>ordrar/klar">Klara</a></span>
<span class="input">(<b><?= $klara ?></b>)</span>
<span class="label"><a href="<?= base_url() ?>ordrar/arkiverad">Arkiverade</a></span>
<span class="input">(<b><?= $arkiverade ?></b>)</span>

<?php foot(); ?>