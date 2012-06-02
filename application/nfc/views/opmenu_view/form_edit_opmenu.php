<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	
	<?php if(validation_errors() || isset($error)): ?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?=validation_errors()?>
			
		</div>		
	<?php endif; ?>
	<div class="row-fluid">
		<div class="span6">
			<form action="<?=base_url()?>opmenu_controller/edit_c/<?=$opmenu->_id?>" method="post" name="formEditopmenu" id="formEditopmenu" class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="_id"><?=$this->config->item('_id')?>:</label>
					<div class="controls">
						<input type="text" value="<?=$opmenu->_id?>" name="_id" id="_id"  readonly="readonly"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
					<div class="controls">
						<input type="text" value="<?=$opmenu->nombre?>" name="nombre" id="nombre"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
					<div class="controls">
						<textarea name="descripcion" id="descripcion"/> <?=$opmenu->descripcion?> </textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="precio"><?=$this->config->item('precio')?>:</label>
					<div class="controls">
						<input type="text" value="<?=$opmenu->precio?>" name="precio" id="precio"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="categorias_id"><?=$this->config->item('categorias_id')?>:</label>
					<div class="controls">
						<select name="categorias_id" id="categorias_id">
							<?php foreach($categorias as $f):?>
								<?php if($f->_id == $opmenu->categorias_id): ?>
									<option value="<?=$f->_id?>" selected><?=$f->descripcion?></option>
								<?php else: ?>
									<option value="<?=$f->_id?>"><?=$f->descripcion?></option>
								<?php endif;?>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
					<div class="controls">
						<input type="text" value="<?=$opmenu->created_at?>" name="created_at" id="created_at"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
					<div class="controls">
						<input type="text" value="<?=$opmenu->updated_at?>" name="updated_at" id="updated_at"/>
					</div>
				</div>

				<div class="form-actions">
					<a href="<?=base_url()?>opmenu_controller/index" class="btn" >Cancelar</a>
					<button type="submit" class="btn btn-primary">Modificar</button>
				</div>

			</form>
		</div>
		<div class="span6">
			<ul class="thumbnails">
				<li class="span12">
					<div class="thumbnail">
						<img src="<?=base_url()."thumbs/".$opmenu->thumb?>">
						<div class="caption">
							<h5>Puedes cambiar la im&aacute;gen aqui</h5>
							<p>
								<form action="<?=base_url()?>opmenu_controller/editimg/<?=$opmenu->_id?>" method="post" enctype="multipart/form-data" name="formChangeImage" id="formChangeImage">
									<input type="file" name="thumb" id="thumb">
									<button type="submit" class="btn btn-primary">Cambiar</button>
								</form>
							</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>


</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
