<?php
$cave = $session->get("whichCave") ?? 'cave';
?>
<h1>Översikt</h1>

<span class="label clear"><a href="<?= base_url() ?>ordrar">Obehandlade</a></span>
<span class="input">(<b><?= $ordrar ?></b>)</span>

<?php if($cave == 'laser'): ?>
    <span class="label"><a href="<?= base_url() ?>ordrar/pp_klar">PP Klar</a></span>
    <span class="input">(<b><?= $pp_klar ?></b>)</span>
<?php endif; ?>

<span class="label"><a href="<?= base_url() ?>ordrar/printad">Printade</a></span>
<span class="input">(<b><?= $printade ?></b>)</span>
<span class="label"><a href="<?= base_url() ?>ordrar/klar">Klara</a></span>
<span class="input">(<b><?= $klara ?></b>)</span>
<span class="label"><a href="<?= base_url() ?>ordrar/arkiverad">Arkiverade</a></span>
<span class="input">(<b><?= $arkiverade ?></b>)</span>
