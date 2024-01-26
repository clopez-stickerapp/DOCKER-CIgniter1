<script type="text/javascript">
    function get3WorkingDays(){
        var d = new Date();
        var day = d.getDay();
        if(day===0) return 4;
        else if(day===6) return 5;
        else return 3;
    }
$(function() {
	$("#done_before").datepicker({minDate: '+'+get3WorkingDays()+'D',dateFormat: 'yy-mm-dd'});
});

function form_check() {
	var ids = ["height","width","quantity","signature"<?php if(!isset($file1)):?>,"thefile"<?php endif; ?>];
	var names = ["storlek","storlek","antal","skapad av"<?php if(!isset($file1)):?>,"fil"<?php endif; ?>];
	
	for ( var i in ids ) {
		if(document.getElementById(ids[i]).value == '') {
			alert('Du m�ste ange '+names[i]);
			document.getElementById(ids[i]).focus();
			return false;
		}
	}
	return true;
}
</script>

<h1>Ladda upp fil</h1>
<form enctype="multipart/form-data" action="<?= base_url() ?>ladda_upp/upload" method="post" class="form" onSubmit="return form_check()">

<div class="col2 clear">
    <label for="height">Storlek (mm)*</label>
    <input type="text" name="height" id="height" class="input small" value="<?= isset($height) ? $height : '' ?>"/>
    <span class="left">x</span>
    <input type="text" name="width" id="width" class="input small" value="<?= isset($width) ? $width : '' ?>"/>
    <label for="quantity">Antal*</label><input type="text" name="quantity" id="quantity" class="input" value="<?= isset($quantity) ? $quantity : '' ?>"/>
    <label for="name">Namn</label><input type="text" name="name" id="name" class="input" value="<?= isset($name) ? $name : '' ?>"/>
    <label for="comment">Kommentar</label><textarea name="comment" id="comment" class="input" rows="5"/><?= isset($comment) ? $comment : false ?></textarea>
    <label for="order_id">Ordernummer</label><input type="text" name="order_id" id="order_id" class="input" value="<?= isset($order_id) ? $order_id : '' ?>"/>
    <label for="done_before">Ska vara klart</label><input type="text" name="done_before" id="done_before" class="input" value="<?= isset($done_before) ? $done_before : false ?>"/>
</div>
<div class="col2">
    <label for="theimage">
    	Bild
		<?php if(isset($image) && !empty($image)): ?>
        	(<a target="_blank" href="<?= base_url() ?>files/<?= $image ?>">Visa</a>)
            <input type="hidden" name="theimage_old" value="<?= $image ?>" />
		<?php endif; ?>
    </label>
    <input type="file" name="theimage" id="theimage" class="input"/>
    <label for="thefile1">
    	Fil 1*
		<?php if(isset($file1) && !empty($file1)): ?>
        	(<a target="_blank" href="<?= base_url() ?>files/<?= $file1 ?>">Visa</a>)
            <input type="hidden" name="thefile1_old" value="<?= $file1 ?>" />
		<?php endif; ?>
    </label>
    <input type="file" name="thefile1" id="thefile" class="input"/>
    <label for="thefile">
    	Fil 2
		<?php if(isset($file2) && !empty($file2)): ?>
        	(<a target="_blank" href="<?= base_url() ?>files/<?= $file2 ?>">Visa</a>)
            <input type="hidden" name="thefile2_old" value="<?= $file2 ?>" />
		<?php endif; ?>
    </label>
    <input type="file" name="thefile2" id="thefile2" class="input"/>
    <label for="thefile">
    	Fil 3
		<?php if(isset($file3) && !empty($file3)): ?>
        	(<a target="_blank" href="<?= base_url() ?>files/<?= $file3 ?>">Visa</a>)
            <input type="hidden" name="thefile3_old" value="<?= $file3 ?>" />
		<?php endif; ?>
    </label>
    <input type="file" name="thefile3" id="thefile3" class="input"/>
    <label for="thefile">
    	Fil 4
		<?php if(isset($file4) && !empty($file4)): ?>
        	(<a target="_blank" href="<?= base_url() ?>files/<?= $file4 ?>">Visa</a>)
            <input type="hidden" name="thefile4_old" value="<?= $file4 ?>" />
		<?php endif; ?>
    </label>
    <input type="file" name="thefile4" id="thefile4" class="input"/>
    <label for="thefile">
    	Fil 5
		<?php if(isset($file5) && !empty($file5)): ?>
        	(<a target="_blank" href="<?= base_url() ?>files/<?= $file5 ?>">Visa</a>)
            <input type="hidden" name="thefile5_old" value="<?= $file5 ?>" />
		<?php endif; ?>
    </label>
    <input type="file" name="thefile5" id="thefile5" class="input"/>
    
    <label for="material">Material</label>
    <select name="material" id="material" class="input">
        <option value="">- Välj -</option>
        <?php foreach($materials as $data): ?>
        <option value="<?= $data['id'] ?>"<?= isset($material) && $data['id']==$material?'selected':''?>><?= $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <label for="laminate">Laminat</label>
    <select name="laminate" id="laminate" class="input">
        <option value="">- Välj -</option>
        <?php foreach($laminates as $data): ?>
        <option value="<?= $data['id'] ?>"<?= isset($laminate) && $data['id']==$laminate?'selected':''?>><?= $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <label for="cutter">Skärare</label>
    <select name="cutter" id="cutter" class="input">
        <option value="">- Välj -</option>
        <?php foreach($cutters as $data): ?>
        <option value="<?= $data['id'] ?>"<?= isset($cutter) && $data['id']==$cutter?'selected':''?>><?= $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    <label for="leverans">Leverans</label>
    <select name="leverans" id="leverans" class="input">
        <option value="">- Välj -</option>
        <?php foreach($leveranser as $data): ?>
        <option value="<?= $data['id'] ?>"<?= isset($leverans) && $data['id']==$leverans?'selected':''?>><?= $data['name'] ?></option>
        <?php endforeach ?>
    </select>    
    <label for="signature">Skapad av*</label>
    <select name="signature" id="signature" class="input">
        <option value="">- Välj -</option>
        <?php foreach($signatures as $data): ?>
        <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
        <?php endforeach ?>
    </select>
    
    <input type="submit" value="Ladda upp" name="submit" class="submit left" />
    </form>
</div>