<?=$this->load->view("default/_header_public")?>
<div class="row">
	<div class="page-header">
	  <h1><?=$categoria->descripcion?></h1>
	</div>
    <div class="span12">
		<?php if(isset($opmenu) && is_array($opmenu) && count($opmenu)>0):?>
			<ul class="thumbnails">
				<?php foreach($opmenu as $f):?>
					<li class="span3">
						<div class="thumbnail">
							<img src="<?=base_url()."thumbs/".$f->thumb?>">
							<div class="caption ">
								<h4><?=word_limiter($f->nombre,5)?></h4>
								<div class="c-content-height">
									<?=word_limiter($f->descripcion,20)?>
								</div>
								<p>
									<strong>Precio: $&nbsp;</strong><?=$f->precio?></p>
								<p>
									<a href="<?=base_url()?>ordenes/nueva/<?=$this->session->userdata('mesas_id')?>/<?=$f->categorias_id?>/<?=$f->_id?>" class="btn btn-primary">Ordenar</a>
								</p>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if(isset($pagination)):?>
				<div class="pagination pagination-right" id="pag-opmenu">
					<?=$pagination?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>
	</div>
</div>

<?=$this->load->view("default/_footer_public")?>