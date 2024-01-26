<?php head() ?>

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

<h1>Order ID <?php echo $id ?>, '<span class="no_transform"><?php echo $name ?></span>'</h1>

<div class="col2 clear">
	<form enctype="multipart/form-data" action="<?php echo base_url() ?>ladda_upp/upload/<?php echo $id ?>" method="post" class="form" onSubmit="return form_check()">
	<div class="col2">
        <h2>Bild</h2>
        <a href="<?php echo $image_url ?>" target="_blank"><img src="<?php echo $thumb_url ?>" /></a>
        <input type="file" name="theimage" id="theimage" class="input"/>
    </div>
    <div class="col2">
        <h2 class="no-margin">Fil 1</h2>
        <a class="left clear" target="_blank" href="<?php echo base_url() ?>files/<?php echo $file1 ?>"><?php echo $file1 ?></a>
        <input type="file" name="thefile1" id="thefile1" class="input"/>
        <h2 class="left clear no-margin">Fler filer</h2>
        <a class="left clear" class="clear" target="_blank" href="<?php echo base_url() ?>files/<?php echo $file2 ?>"><?php echo $file2 ?></a>
        <input type="file" name="thefile2" id="thefile1" class="input"/>
        <a class="left clear" target="_blank" href="<?php echo base_url() ?>files/<?php echo $file3 ?>"><?php echo $file3 ?></a>
        <input type="file" name="thefile3" id="thefile1" class="input"/>
        <a class="left clear" target="_blank" href="<?php echo base_url() ?>files/<?php echo $file4 ?>"><?php echo $file4 ?></a>
        <input type="file" name="thefile4" id="thefile1" class="input"/>
        <a class="left clear" target="_blank" href="<?php echo base_url() ?>files/<?php echo $file5 ?>"><?php echo $file5 ?></a>
        <input type="file" name="thefile5" id="thefile1" class="input"/>
    </div>
    
	<h2 class="clear">Information</h2>
    <label for="height">Storlek (mm)*</label>
    <input type="text" name="height" id="height" class="input small" value="<?php echo $height ?>"/>
    <span class="left">x</span>
    <input type="text" name="width" id="width" class="input small" value="<?php echo $width ?>"/>
    <label for="quantity">Antal*</label><input type="text" name="quantity" id="quantity" class="input" value="<?php echo $quantity ?>"/>
    <span class="label">m²</span><span class="input"><?php echo $m2 ?></span>
    <label for="name">Namn</label><input type="text" name="name" id="name" class="input" value="<?php echo $name ?>"/>
    <label for="order_id">Ordernummer</label><input type="text" name="order_id" id="order_id" class="input" value="<?php echo $order_id ?>"/>
    <label for="done_before">Ska vara klart</label><input type="text" name="done_before" id="done_before" class="input" value="<?php echo $done_before ?>"/>
    <label for="material">Material</label>
    <select name="material" id="material" class="input">
        <option value="">- Välj -</option>
        <?php foreach($materials as $data): ?>
        <option value="<?php echo $data['id'] ?>"<?php echo $data['id']==$material?'selected':''?>><?php echo $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <label for="laminate">Laminat</label>
    <select name="laminate" id="laminate" class="input">
        <option value="">- Välj -</option>
        <?php foreach($laminates as $data): ?>
        <option value="<?php echo $data['id'] ?>"<?php echo $data['id']==$laminate?'selected':''?>><?php echo $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <label for="cutter">Skärare</label>
    <select name="cutter" id="cutter" class="input">
        <option value="">- Välj -</option>
        <?php foreach($cutters as $data): ?>
        <option value="<?php echo $data['id'] ?>"<?php echo $data['id']==$cutter?'selected':''?>><?php echo $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <label for="leverans">Leverans</label>
    <select name="leverans" id="leverans" class="input" onChange="change_leverans();">
        <option value="">- Välj -</option>
        <?php foreach($leveranser as $data): ?>
        <option value="<?php echo $data['id'] ?>"<?php echo $data['id']==$leverans?'selected':''?>><?php echo $data['name'] ?></option>
        <?php endforeach ?>
    </select>    
    <p class="label">Skapad av</p>
	<p class="input"><?php echo $this->orders->get_data('signatures',$signature_id) ?></p>
    <input type="hidden" value="<?php echo $signature_id ?>" name="signature" />
    
    <input type="submit" value="Uppdatera" name="submit" class="submit" />
    </form>
    <a class="right" href="<?php echo base_url() ?>ordrar/radera/<?php echo $id?>" onClick="return confirm('Radera order?')">Radera</a>
    <a class="right clear" href="<?php echo base_url() ?>ladda_upp/reprint/<?php echo $id ?>">Reprint</a>
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
	<form name="" action="<?php echo base_url() ?>ordrar/add_comment/<?php echo $id ?>" method="post" onSubmit="return comment_check();">
	<h2>Kommentarer</h2><a name="comments"></a>
    <?php foreach($comments as $c): ?>
    	<p class="comment">
        	<b><?php echo $this->orders->get_data('signatures',$c['signature_id'])?></b>
            <small>(<?php echo date('d-m-y h:i',$c['created']) ?>)</small>:<br />
			<?php echo $c['text'] ?>
    	</p>
    <?php endforeach; ?>
    <label for="text">Kommentar</label><textarea name="text" id="text" class="input" rows="4"/></textarea>
    <label for="signature">Signatur</label>
    <select name="signature_id" id="signature_id" class="input">
        <option value="">- Välj -</option>
        <?php foreach($signatures as $data): ?>
        <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <input type="submit" name="add_comment" value="Skicka" class="submit" />
    </form>
</div>


<?php foot() ?>