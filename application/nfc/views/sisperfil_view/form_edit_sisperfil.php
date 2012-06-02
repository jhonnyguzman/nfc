<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>sisperfil_controller/edit_c/<?=$sisperfil->_id?>" method="post" name="formEditsisperfil" id="formEditsisperfil">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('_id')?>:</label>
		<input type="text" value="<?=$sisperfil->_id?>" name="_id" id="_id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sismenu_id')?>:</label>
		<input type="text" value="<?=$sisperfil->sismenu_id?>" name="sismenu_id" id="sismenu_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('perfiles_id')?>:</label>
		<input type="text" value="<?=$sisperfil->perfiles_id?>" name="perfiles_id" id="perfiles_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('estado')?>:</label>
		<input type="text" value="<?=$sisperfil->estado?>" name="estado" id="estado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$sisperfil->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$sisperfil->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditsisperfil',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>sisperfil_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
