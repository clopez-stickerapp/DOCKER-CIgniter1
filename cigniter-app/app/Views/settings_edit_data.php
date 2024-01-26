
<script type="text/javascript">
function form_check() {
	var ids = [<?php $i=1;foreach($data as $row) { echo '"'.$row['id'].'"'; echo $tmp=count($data)!=$i?',':''; $i++;} ?>];
	for ( var i in ids ) {
		if(document.getElementById(ids[i]).value == '') {
			alert('Du f�r inte l�mna n�got f�lt tomt');
			document.getElementById(ids[i]).focus();
			return false;
		}
	}
	return true;
}
</script>

<h1>Inställningar - <?= $table_title ?></h1>
<ul id="subnav">
	<li><a href="<?= base_url() ?>settings/edit_data/materials">Material</a></li>
    <li><a href="<?= base_url() ?>settings/edit_data/cutters">Skärare</a></li>
    <li><a href="<?= base_url() ?>settings/edit_data/laminates">Laminat</a></li>
    <li><a href="<?= base_url() ?>settings/edit_data/signatures">Signaturer</a></li>
</ul>

<div class="col2 clear">
	<h2><?= $table_title ?></h2>
    <form action="<?= base_url() ?>settings/save_data/<?= $table ?>" method="post" onSubmit="return form_check();">
	<?php foreach($data as $row): ?>
        <label for="<?= $row['id'] ?>">#<?= $row['id'] ?> (<?= $row['name'] ?>)</label>
        <input type="text" class="input" value="<?= $row['name'] ?>" name="<?= $row['id'] ?>" id="<?= $row['id'] ?>"/>
    <?php endforeach; ?>
    <input type="submit" name="submit" class="submit" value="Ändra" />
    </form>
</div>

<div class="col2">
	<h2>Lägg till ny</h2>
	<form action="<?= base_url() ?>settings/add_data/<?= $table ?>" method="post">
    <label for="name">Namn</label>
    <input type="text" name="name" id="name" class="input"/>
    <input type="submit" name="add_data" value="Lägg till" />
    </form>
</div>
