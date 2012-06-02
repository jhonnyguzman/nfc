<script> setDatePicker(new Array('created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>ordenes_controller/edit_c/<?=$ordenes->_id?>" method="post" name="formEditordenes" id="formEditordenes">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('_id')?>:</label>
		<input type="text" value="<?=$ordenes->_id?>" name="_id" id="_id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('opmenu_id')?>:</label>
		<input type="text" value="<?=$ordenes->opmenu_id?>" name="opmenu_id" id="opmenu_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('cantidad')?>:</label>
		<input type="text" value="<?=$ordenes->cantidad?>" name="cantidad" id="cantidad"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('montotal')?>:</label>
		<input type="text" value="<?=$ordenes->montotal?>" name="montotal" id="montotal"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('observacion')?>:</label>
		<input type="text" value="<?=$ordenes->observacion?>" name="observacion" id="observacion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('estado')?>:</label>
		<input type="text" value="<?=$ordenes->estado?>" name="estado" id="estado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('mesas_id')?>:</label>
		<input type="text" value="<?=$ordenes->mesas_id?>" name="mesas_id" id="mesas_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('created_at')?>:</label>
		<input type="text" value="<?=$ordenes->created_at?>" name="created_at" id="created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('updated_at')?>:</label>
		<input type="text" value="<?=$ordenes->updated_at?>" name="updated_at" id="updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditordenes',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>ordenes_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
