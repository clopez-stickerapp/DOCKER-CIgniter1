<?php head() ?>

<script type="text/javascript">
function form_check() {
	var ids = [<?php $i=1;foreach($data as $row) { echo '"'.$row['id'].'"'; echo $tmp=count($data)!=$i?',':''; $i++;} ?>];
	for ( var i in ids ) {
		if(document.getElementById(ids[i]).value == '') {
			alert('Du får inte lämna något fält tomt');
			document.getElementById(ids[i]).focus();
			return false;
		}
	}
	return true;
}
</script>

<h1>InstÃ¤llningar - <?php echo $table_title ?></h1>
<ul id="subnav">
	<li><a href="<?php echo base_url() ?>settings/edit_data/materials">Material</a></li>
    <li><a href="<?php echo base_url() ?>settings/edit_data/cutters">SkÃ¤rare</a></li>
    <li><a href="<?php echo base_url() ?>settings/edit_data/laminates">Laminat</a></li>
    <li><a href="<?php echo base_url() ?>settings/edit_data/signatures">Signaturer</a></li>
</ul>

<div class="col2 clear">
	<h2><?php echo $table_title ?></h2>
    <form action="<?php echo base_url() ?>settings/save_data/<?php echo $table ?>" method="post" onSubmit="return form_check();">
	<?php foreach($data as $row): ?>
        <label for="<?php echo $row['id'] ?>">#<?php echo $row['id'] ?> (<?php echo $row['name'] ?>)</label>
        <input type="text" class="input" value="<?php echo $row['name'] ?>" name="<?php echo $row['id'] ?>" id="<?php echo $row['id'] ?>"/>
    <?php endforeach; ?>
    <input type="submit" name="submit" class="submit" value="Ã„ndra" />
    </form>
</div>

<div class="col2">
	<h2>LÃ¤gg till ny</h2>
	<form action="<?php echo base_url() ?>settings/add_data/<?php echo $table ?>" method="post">
    <label for="name">Namn</label>
    <input type="text" name="name" id="name" class="input"/>
    <input type="submit" name="add_data" value="LÃ¤gg till" />
    </form>
</div>

<?php foot() ?>