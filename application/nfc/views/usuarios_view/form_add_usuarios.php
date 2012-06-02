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
	<form action="<?=base_url()?>usuarios_controller/add_c" method="post" name="formAddusuarios" id="formAddusuarios" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="username"><?=$this->config->item('username')?>:</label>
			<div class="controls">
				<input type="text" name="username" id="username" ></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password"><?=$this->config->item('password')?>:</label>
			<div class="controls">
				<input type="password" name="password" id="password" ></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"  for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" name="nombre" id="nombre" ></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="apellido"><?=$this->config->item('apellido')?>:</label>
			<div class="controls">
				<input type="text" name="apellido" id="apellido" ></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" name="email" id="email" ></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="direccion"><?=$this->config->item('direccion')?>:</label>
			<div class="controls">
				<input type="text" name="direccion" id="direccion" ></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" name="telefono" id="telefono" ></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="estado"><?=$this->config->item('estado')?>:</label>
			<div class="controls">
				<select name="estado" id="estado" >
					<?php foreach ($estados as $f): ?>
						<option value="<?=$f->_id?>"><?=$f->descripcion?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="perfiles_id"><?=$this->config->item('perfiles_id')?>:</label>
			<div class="controls">
				<select name="perfiles_id" id="perfiles_id" >
					<?php foreach ($perfiles as $f): ?>
						<option value="<?=$f->_id?>"><?=$f->descripcion?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-actions">
			<a href="<?=base_url()?>usuarios_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
