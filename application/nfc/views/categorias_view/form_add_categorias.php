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

	<form action="<?=base_url()?>categorias_controller/add_c" method="post" name="formAddcategorias" id="formAddcategorias" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<input type="text" name="descripcion" id="descripcion"></input>
			</div>
		</div>
		<div class="form-actions">
			<a href="<?=base_url()?>categorias_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>


</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
