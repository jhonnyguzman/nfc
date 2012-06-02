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

	<form action="<?=base_url()?>usuarios_controller/edit_c/<?=$usuarios->_id?>" method="post" name="formEditusuarios" id="formEditusuarios" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="_id"><?=$this->config->item('_id')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->_id?>" name="_id" id="_id"  readonly="readonly" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="username"><?=$this->config->item('username')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->username?>" name="username" id="username" readonly="true" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password"><?=$this->config->item('password')?>:</label>
			<div class="controls">
				<input type="password" name="password" id="password" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nombre"><?=$this->config->item('nombre')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->nombre?>" name="nombre" id="nombre" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="apellido"><?=$this->config->item('apellido')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->apellido?>" name="apellido" id="apellido" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><?=$this->config->item('email')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->email?>" name="email" id="email" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="direccion"><?=$this->config->item('direccion')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->direccion?>" name="direccion" id="direccion" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono"><?=$this->config->item('telefono')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->telefono?>" name="telefono" id="telefono" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="estado"><?=$this->config->item('estado')?>:</label>
			<div class="controls">
				<select name="estado" id="estado" data-native-menu="false">
					<?php foreach ($estados as $f): ?>
						<?php if($f->_id == $usuarios->estado): ?>
							<option value="<?=$f->_id?>" selected ><?=$f->descripcion?></option>
						<?php else: ?>
							<option value="<?=$f->_id?>"><?=$f->descripcion?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>			
		</div>
		<div class="control-group">
			<label class="control-label" for="perfiles_id"><?=$this->config->item('perfiles_id')?>:</label>
			<div class="controls">
				<select name="perfiles_id" id="perfiles_id" data-native-menu="false">
					<?php foreach ($perfiles as $f): ?>
						<?php if($f->_id == $usuarios->perfiles_id): ?>
							<option value="<?=$f->_id?>" selected ><?=$f->descripcion?></option>
						<?php else: ?>
							<option value="<?=$f->_id?>"><?=$f->descripcion?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="created_at"><?=$this->config->item('created_at')?>:</label>
			<div class="controls">
				<input type="text" value="<?=$usuarios->created_at?>" name="created_at" id="created_at" readonly="true" />
			</div>
		</div>

		<div class="form-actions">
			<a href="<?=base_url()?>usuarios_controller/index" class="btn" >Cancelar</a>
			<button type="submit" class="btn btn-primary">Modificar</button>
		</div>

</div><!--/span10-->

<?=$this->load->view('default/_footer_admin')?>
