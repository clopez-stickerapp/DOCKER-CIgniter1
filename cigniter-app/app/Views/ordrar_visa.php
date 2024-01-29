<?php
    $ordersModel = new \App\Models\CaveOrdersModel();
?>
<script type="text/javascript">
$(function() {
	$("#done_before").datepicker({dateFormat: 'yy-mm-dd'});
});
function form_check() {
	var ids = ["height","width","quantity","signature"];
	var names = ["storlek","storlek","antal","skapad av"];
	
	for ( var i in ids ) {
		if(document.getElementById(ids[i]).value == '') {
			alert('Du måste ange '+names[i]);
			document.getElementById(ids[i]).focus();
			return false;
		}
	}
	return true;
}
</script>

<h1>Order ID <?= $id ?>, '<span class="no_transform"><?= $name ?></span>'</h1>

<div class="col2 clear">
	<form enctype="multipart/form-data" action="<?= base_url() ?>ladda_upp/upload/<?= $id ?>" method="post" class="form" onSubmit="return form_check()">
	<div class="col2">
        <h2>Bild</h2>
        <a href="<?= $image_url ?>" target="_blank"><img src="<?= $thumb_url ?>" /></a>
        <input type="file" name="theimage" id="theimage" class="input"/>
    </div>
    <div class="col2">
        <h2 class="no-margin">Fil 1</h2>
        <a class="left clear" target="_blank" href="<?= base_url() ?>files/<?= $file1 ?>"><?= $file1 ?></a>
        <input type="file" name="thefile1" id="thefile1" class="input"/>
        <h2 class="left clear no-margin">Fler filer</h2>
        <a class="left clear" class="clear" target="_blank" href="<?= base_url()?>files/<?= $file2 ?>"><?= $file2 ?></a>
        <input type="file" name="thefile2" id="thefile1" class="input"/>
        <a class="left clear" target="_blank" href="<?= base_url() ?>files/<?= $file3 ?>"><?= $file3 ?></a>
        <input type="file" name="thefile3" id="thefile1" class="input"/>
        <a class="left clear" target="_blank" href="<?= base_url() ?>files/<?= $file4 ?>"><?= $file4 ?></a>
        <input type="file" name="thefile4" id="thefile1" class="input"/>
        <a class="left clear" target="_blank" href="<?= base_url() ?>files/<?= $file5 ?>"><?= $file5 ?></a>
        <input type="file" name="thefile5" id="thefile1" class="input"/>
    </div>
    
	<h2 class="clear">Information</h2>
    <label for="height">Storlek (mm)*</label>
    <input type="text" name="height" id="height" class="input small" value="<?= $height ?>"/>
    <span class="left">x</span>
    <input type="text" name="width" id="width" class="input small" value="<?= $width ?>"/>
    <label for="quantity">Antal*</label><input type="text" name="quantity" id="quantity" class="input" value="<?= $quantity ?>"/>
    <span class="label">m²</span><span class="input"><?= $m2 ?></span>
    <label for="name">Namn</label><input type="text" name="name" id="name" class="input" value="<?= $name ?>"/>
    <label for="order_id">Ordernummer</label><input type="text" name="order_id" id="order_id" class="input" value="<?= $order_id ?>"/>
    <label for="done_before">Ska vara klart</label><input type="text" name="done_before" id="done_before" class="input" value="<?= $done_before ?>"/>
    <label for="material">Material</label>
    <select name="material" id="material" class="input">
        <option value="">- Välj -</option>
        <?php foreach($materials as $data): ?>
        <option value="<?= $data['id'] ?>"<?= $data['id']==$material?'selected':''?>><?= $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <label for="laminate">Laminat</label>
    <select name="laminate" id="laminate" class="input">
        <option value="">- Välj -</option>
        <?php foreach($laminates as $data): ?>
        <option value="<?= $data['id'] ?>"<?= $data['id']==$laminate?'selected':''?>><?= $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <label for="cutter">Skärare</label>
    <select name="cutter" id="cutter" class="input">
        <option value="">- Välj -</option>
        <?php foreach($cutters as $data): ?>
        <option value="<?= $data['id'] ?>"<?= $data['id']==$cutter?'selected':''?>><?= $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <label for="leverans">Leverans</label>
    <select name="leverans" id="leverans" class="input" onChange="change_leverans();">
        <option value="">- Välj -</option>
        <?php foreach($leveranser as $data): ?>
        <option value="<?= $data['id'] ?>"<?= $data['id']==$leverans?'selected':''?>><?= $data['name'] ?></option>
        <?php endforeach ?>
    </select>    
    <p class="label">Skapad av</p>
	<p class="input"><?= $ordersModel->get_data('thecave_signatures',$signature_id) ?></p>
    <input type="hidden" value="<?= $signature_id ?>" name="signature" />
    
    <input type="submit" value="Uppdatera" name="submit" class="submit" />
    </form>
    <a class="right" href="<?= base_url() ?>ordrar/radera/<?= $id?>" onClick="return confirm('Radera order?')">Radera</a>
    <a class="right clear" href="<?= base_url() ?>ladda_upp/reprint/<?= $id ?>">Reprint</a>
</div>

<div class="col2 comments">
	<script type="text/javascript">
    function comment_check() {
        var ids = ["text","signature_id"];
        var names = ["kommentar","signatur"];
        
        for ( var i in ids ) {
            if(document.getElementById(ids[i]).value == '') {
                alert('Du måste ange '+names[i]);
                document.getElementById(ids[i]).focus();
                return false;
            }
        }
        return true;
    }
    </script>
	<form name="" action="<?= base_url() ?>ordrar/add_comment/<?= $id ?>" method="post" onSubmit="return comment_check();">
	<h2>Kommentarer</h2><a name="comments"></a>
    <?php foreach($comments as $c): ?>
    	<p class="comment">
        	<b><?= $ordersModel->get_data('thecave_signatures',$c['signature_id'])?></b>
            <small>(<?= date('d-m-y h:i',$c['created']) ?>)</small>:<br />
			<?= $c['text'] ?>
    	</p>
    <?php endforeach; ?>
    <label for="text">Kommentar</label><textarea name="text" id="text" class="input" rows="4"/></textarea>
    <label for="signature">Signatur</label>
    <select name="signature_id" id="signature_id" class="input">
        <option value="">- Välj -</option>
        <?php foreach($signatures as $data): ?>
        <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <input type="submit" name="add_comment" value="Skicka" class="submit" />
    </form>
</div>
