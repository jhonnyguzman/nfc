<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>sispermisos_controller/add_c" method="post" name="formAddsispermisos" id="formAddsispermisos">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('tabla')?>:</label>
		<input type="text" name="tabla" id="tabla"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('flag_read')?>:</label>
		<input type="text" name="flag_read" id="flag_read"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('flag_insert')?>:</label>
		<input type="text" name="flag_insert" id="flag_insert"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('flag_update')?>:</label>
		<input type="text" name="flag_update" id="flag_update"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('flag_delete')?>:</label>
		<input type="text" name="flag_delete" id="flag_delete"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('perfiles_id')?>:</label>
		<input type="text" name="perfiles_id" id="perfiles_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddsispermisos',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>sispermisos_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
