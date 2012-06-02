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

	<form action="<?=base_url()?>mesas_controller/add_c" method="post" name="formAddmesas" id="formAddmesas" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="descripcion"><?=$this->config->item('descripcion')?>:</label>
			<div class="controls">
				<input type="text" name="descripcion" id="descripcion"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="estado"><?=$this->config->item('estado')?>:</label>
			<div class="controls">
				<select name="estado" id="estado">
					<?php foreach($estados as $f):?>
						<option value="<?=$f->_id?>"><?=$f->descripcion?></option>
					<?php endforeach;?>
				</select>
			</div>
		</div>
		
		<div class="form-actions">
			<a href="<?=base_url()?>mesas_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>

	</form>


</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
