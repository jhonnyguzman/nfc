<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>index.php/sismenu_controller/edit_c/<?=$sismenu->id?>" method="post" name="formEditsismenu" id="formEditsismenu">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('_id')?>:</label>
		<input type="text" value="<?=$sismenu->_id?>" name="_id" id="_id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('descripcion')?>:</label>
		<input type="text" value="<?=$sismenu->descripcion?>" name="descripcion" id="descripcion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('estado')?>:</label>
		<input type="text" value="<?=$sismenu->estado?>" name="estado" id="estado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('parent')?>:</label>
		<input type="text" value="<?=$sismenu->parent?>" name="parent" id="parent"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$sismenu->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$sismenu->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<p>
		<label><?=$this->config->item('link')?>:</label>
		<input type="text" value="<?=$sismenu->link?>" name="link" id="link"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditsismenu',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>sismenu_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
