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

	<form action="<?=base_url()?>categorias_controller/edit_c/<?=$categorias->_id?>" method="post" name="formEditcategorias" id="formEditcategorias" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="_id"><?=$this->config->item('_id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$categorias->_id?>" name="_id" id="_id"  readonly="readonly"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$categorias->descripcion?>" name="descripcion" id="descripcion"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$categorias->created_at?>" name="created_at" id="created_at"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="updated_at"><?=$this->config->item('updated_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$categorias->updated_at?>" name="updated_at" id="updated_at"/>
			</div>
		</div>

		<div class="form-actions">
			<a href="<?=base_url()?>categorias_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>

	</form>


</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
