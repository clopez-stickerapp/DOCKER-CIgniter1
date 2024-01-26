<?php head() ?>
<h1><?php echo $title ?></h1>

<form name="search" id="search" action="<?php echo base_url() ?>ordrar/sok" method="get">
<input type="text" name="search_text" class="text" value="<?php echo $text = !empty($_GET['search_text']) ? $_GET['search_text'] : '' ?>" />
<input type="image" class="search" src="<?php echo base_url() ?>images/search.png" name="search" value="Sök" />
<?php if(!empty($_GET['search_text']) && 1==2): ?>
	<a href=""><img src="<?php echo base_url() ?>images/remove.png" title="avbryt sökningen" class="remove" /></a>
<?php endif; ?>
</form>

<?php if(count($orders) > 0): ?>
	<script type="text/javascript">
    $(document).ready(function() {
        $("a.name").tooltip({
            delay: 0,
            track: true,
            content: false,
            showURL: false
        });
        $("a.comment").tooltip({
            delay: 0,
            track: true,
            content: false,
            showURL: false
        });
        $('.row').hover(function() {
            $(this).addClass('hover');
        }, function() {
            $(this).removeClass('hover');
        });
    });
    </script>
        
    <div class="table">
        <div class="row header">
        	<?php $direction = $this->session->userdata('order_how') == 'DESC' ? 'up' : 'down' ?>
            
            <div class="col small">
            	<a href="<?php echo base_url() ?>ordrar/order_by/id/<?php echo $this->uri->segment(2) ?>">ID</a>
                <?php if($this->session->userdata('order_by') == 'id'): ?>
                	<img src="<?php echo base_url() ?>images/arrow_<?php echo $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col small">
            	<a href="<?php echo base_url() ?>ordrar/order_by/id/<?php echo $this->uri->segment(2) ?>">Order ID</a>
                <?php if($this->session->userdata('order_by') == 'oredr_id'): ?>
                	<img src="<?php echo base_url() ?>images/arrow_<?php echo $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col large">
            	<a href="<?php echo base_url() ?>ordrar/order_by/name/<?php echo $this->uri->segment(2) ?>">Namn</a>
                <?php if($this->session->userdata('order_by') == 'name'): ?>
                	<img src="<?php echo base_url() ?>images/arrow_<?php echo $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col small">
            	<a href="<?php echo base_url() ?>ordrar/order_by/m2/<?php echo $this->uri->segment(2) ?>">m²</a>
                <?php if($this->session->userdata('order_by') == 'm2'): ?>
                	<img src="<?php echo base_url() ?>images/arrow_<?php echo $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col">
            	<a href="<?php echo base_url() ?>ordrar/order_by/material/<?php echo $this->uri->segment(2) ?>">Material</a>
                <?php if($this->session->userdata('order_by') == 'material'): ?>
                	<img src="<?php echo base_url() ?>images/arrow_<?php echo $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col">
            	<a href="<?php echo base_url() ?>ordrar/order_by/laminate/<?php echo $this->uri->segment(2) ?>">Laminat</a>
                <?php if($this->session->userdata('order_by') == 'laminate'): ?>
                	<img src="<?php echo base_url() ?>images/arrow_<?php echo $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col">
            	<a href="<?php echo base_url() ?>ordrar/order_by/cutter/<?php echo $this->uri->segment(2) ?>">Skärare</a>
                <?php if($this->session->userdata('order_by') == 'cutter'): ?>
                	<img src="<?php echo base_url() ?>images/arrow_<?php echo $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col">
            	<a href="<?php echo base_url() ?>ordrar/order_by/done_before/<?php echo $this->uri->segment(2) ?>">Klart senast</a>
                <?php if($this->session->userdata('order_by') == 'done_before'): ?>
                	<img src="<?php echo base_url() ?>images/arrow_<?php echo $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col">
            	<a href="<?php echo base_url() ?>ordrar/order_by/comments/<?php echo $this->uri->segment(2) ?>">Kommentarer</a>
                <?php if($this->session->userdata('order_by') == 'comments'): ?>
                	<img src="<?php echo base_url() ?>images/arrow_<?php echo $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col small">Status</div>
        </div>
           
        <?php foreach($orders as $row): ?>
        <div class="row">
            <div class="col small"><?php echo $row['id'] ?></div>
            <div class="col small"><?php echo $row['order_id'] ?></div>
            <div class="col large">
            	<a href="<?php echo base_url() ?>ordrar/visa/<?php echo $row['id'] ?>" title="<img src='<?php echo $row['thumb_url'] ?>'>" class="name full">
					<?php echo strlen($row['name'])<18 ? $row['name'] : substr($row['name'],0,18).'...' ?>
            	</a>
            </div>
            <div class="col small"><?php echo $row['m2'] ?></div>
            <div class="col"><?php echo $row['material_name'] ?></div>
            <div class="col"><?php echo $row['laminate_name'] ?></div>
            <div class="col"><?php echo $row['cutter_name'] ?></div>
            <div class="col">
            	<?php $days = round((strtotime($row['done_before']) - strtotime(date('Y-m-d'))) / 86400); ?>
                <?php if($days <= 3 && $row['done_before'] != '&nbsp;'): ?>
					<span class="warning"><?php echo $row['done_before'] ?></span>
                <?php else: ?>
                	<?php echo $row['done_before'] ?>
                <?php endif; ?>
            </div>
            <div class="col">
            	<?php if(count($row['comments'])>0): ?>
                	<a href="<?php echo base_url() ?>ordrar/visa/<?php echo $row['id'] ?>#comments" title="<?php foreach($row['comments'] as $c):?><b><?php echo $this->orders->get_data('signatures',$c['signature_id'])?></b>: <?php echo $c['text'] ?><br><?php endforeach; ?>" class="comment full"><img src="<?php echo base_url() ?>images/comments.png" /> (<?php echo count($row['comments']) ?>)</a>
                <?php else: ?>
                	&nbsp;
                <?php endif; ?>
            </div>
            <div class="col small">
            	<?php if(!empty($row['new_status'])): ?>
                    <form action="<?php echo base_url() ?>ordrar/update_status/<?php echo $row['id'] ?>/<?php echo $row['new_status'] ?>/<?php echo $this->uri->segment(2) ?><?php if(isset($_GET['search_text'])): ?>/<?php echo $_GET['search_text']?><?php endif; ?>" method="post">
                    <input type="submit" value="<?php echo $row['new_status'] ?>" class="button" />
                    </form>
                <?php else: ?>
                	Arkiverad
            	<?php endif; ?>
            </div>
        </div>    
        <?php endforeach; ?>
    </div>
<?php elseif(isset($_GET['search'])): ?>
	<p class="message">Det finns inga orders som matchar din sökning</p>
<?php else: ?>
	<p class="message">Det finns inga orders markerade som '<b><?php echo $title ?></b>'</p>
<?php endif; ?>

<?php foot() ?>