<?php
$session = session();
$uri = current_url(true);
$ordersModel = new \App\Models\CaveOrdersModel();
?>
<h1><?= $title ?></h1>

<form name="search" id="search" action="<?= base_url() ?>ordrar/sok" method="get">
    <input type="text" name="search_text" class="text" value="<?= $text = !empty($_GET['search_text']) ? $_GET['search_text'] : '' ?>" />
    <input type="image" class="search" src="<?= base_url() ?>public/images/search.png" name="search" value="Sök" />

    <?php if(!empty($_GET['search_text']) && 1==2): ?>
        <a href=""><img src="<?= base_url() ?>images/remove.png" title="avbryt sökningen" class="remove" /></a>
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
            $('.row').hover(function() {
                $(this).addClass('hover');
            }, function() {
                $(this).removeClass('hover');
            });
        });
    </script>
        
    <div class="table">
        <div class="row header">
        	<?php $direction = $session->getTempdata('order_how') == 'DESC' ? 'up' : 'down' ?>
            
            <div class="col small">
            	<a href="<?= base_url() ?>ordrar/order_by/id/<?= $uri->getSegment(2) ?>">ID</a>
                <?php if($session->getTempdata('order_by') == 'id'): ?>
                	<img src="<?= base_url() ?>public/images/arrow_<?= $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col medium">
            	<a href="<?= base_url() ?>ordrar/order_by/id/<?= $uri->getSegment(2) ?>">Order ID</a>
                <?php if($session->getTempdata('order_by') == 'oredr_id'): ?>
                	<img src="<?= base_url() ?>public/images/arrow_<?= $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col large">
            	<a href="<?= base_url() ?>ordrar/order_by/name/<?= $uri->getSegment(2) ?>">Namn</a>
                <?php if($session->getTempdata('order_by') == 'name'): ?>
                	<img src="<?= base_url() ?>public/images/arrow_<?= $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col small">
            	<a href="<?= base_url() ?>ordrar/order_by/m2/<?= $uri->getSegment(2) ?>">m²</a>
                <?php if($session->getTempdata('order_by') == 'm2'): ?>
                	<img src="<?= base_url() ?>public/images/arrow_<?= $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col">
            	<a href="<?= base_url() ?>ordrar/order_by/material/<?= $uri->getSegment(2) ?>">Material</a>
                <?php if($session->getTempdata('order_by') == 'material'): ?>
                	<img src="<?= base_url() ?>public/images/arrow_<?= $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col">
            	<a href="<?= base_url() ?>ordrar/order_by/laminate/<?= $uri->getSegment(2) ?>">Laminat</a>
                <?php if($session->getTempdata('order_by') == 'laminate'): ?>
                	<img src="<?= base_url() ?>public/images/arrow_<?= $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col">
            	<a href="<?= base_url() ?>ordrar/order_by/cutter/<?= $uri->getSegment(2) ?>">Skärare</a>
                <?php if($session->getTempdata('order_by') == 'cutter'): ?>
                	<img src="<?= base_url() ?>public/images/arrow_<?= $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col">
            	<a href="<?= base_url() ?>ordrar/order_by/done_before/<?= $uri->getSegment(2) ?>">Klart senast</a>
                <?php if($session->getTempdata('order_by') == 'done_before'): ?>
                	<img src="<?= base_url() ?>public/images/arrow_<?= $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col medium">
            	<a href="<?= base_url() ?>ordrar/order_by/comments/<?= $uri->getSegment(2) ?>">Kommentarer</a>
                <?php if($session->getTempdata('order_by') == 'comments'): ?>
                	<img src="<?= base_url() ?>public/images/arrow_<?= $direction ?>.gif" class="sort_how"/>
                <?php endif; ?>
            </div>
            <div class="col small">Status</div>
        </div>
           
        <?php foreach($orders as $row): ?>
        <div class="row">
            <div class="col small"><?= $row['id'] ?></div>
            <div class="col medium"><?= $row['order_id'] ?></div>
            <div class="col large">
            	<a href="<?= base_url() ?>ordrar/visa/<?= $row['id'] ?>" title="<img src='<?= $row['thumb_url'] ?>'>" class="name full text-overflow-ellipsis">
                    <?= $row['name'] ?>
            	</a>
            </div>
            <div class="col small"><?= $row['m2'] ?></div>
            <div class="col"><span class="text-overflow-ellipsis" title="<?= $row['material_name'] ?>"><?= $row['material_name'] ?></span></div>
            <div class="col"><span class="text-overflow-ellipsis" title="<?= $row['laminate_name'] ?>"><?= $row['laminate_name'] ?></span></div>
            <div class="col"><?= $row['cutter_name'] ?></div>
            <div class="col">
            	<?php $days = round((strtotime($row['done_before']) - strtotime(date('Y-m-d'))) / 86400); ?>
                <?php if($days <= 3 && $row['done_before'] != '&nbsp;'): ?>
					<span class="warning"><?= $row['done_before'] ?></span>
                <?php else: ?>
                	<?= $row['done_before'] ?>
                <?php endif; ?>
            </div>
            <div class="col medium">
            	<?php if(count($row['comments'])>0): ?>
                    
                	<a href="<?= base_url() ?>ordrar/visa/<?= $row['id'] ?>#comments" class="comment full tt" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" data-bs-title="<?php foreach($row['comments'] as $c):?><b><?= $ordersModel->get_data('thecave_signatures',$c['signature_id'])?></b>: <?= $c['text'] ?><br><?php endforeach; ?>"><img src="<?= base_url() ?>public/images/comments.png" />
                        (<?= count($row['comments']) ?>)
                    </a>
                <?php else: ?>
                	&nbsp;
                <?php endif; ?>
            </div>
            <div class="col small">
            	<?php if(!empty($row['new_status'])): ?>
                    <form action="<?= base_url() ?>ordrar/update_status/<?= $row['id'] ?>/<?= $row['new_status'] ?>/<?= $uri->getSegment(2) ?><?= isset($_GET['search_text']) ? '/'.$_GET['search_text'] : '/-'  ?>" method="post">
                        <input type="submit" value="<?= $row['new_status'] ?>" class="button" />
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
	<p class="message">Det finns inga orders markerade som '<b><?= $title ?></b>'</p>
<?php endif; ?>
