<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	 <div class="row-fluid">
            <div class="span10">
            	<form action="<?=base_url()?>ordenes_controller/search_c" method="post" name="formSearchordenes" id="formSearchordenes" class="well form-search">
					<select name="estado" id="estado" class="input-medium search-query">
						<option value="">Todas</option>
						<?php foreach($estados as $f): ?>
							<option value="<?=$f->_id?>"><?=$f->descripcion?></option>
						<?php endforeach; ?>
					</select>
					<button type="submit" class="btn" onClick="searchData('formSearchordenes','result-list')">Buscar</button>
				</form>	    

            </div>
            <div class="span2">
            	<div class="btn-group">
				  <button class="btn">Acciones</button>
				  <button class="btn dropdown-toggle" data-toggle="dropdown">
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">
				    <?php if($flag['i']):?>
						<li><a href="<?=base_url()?>ordenes_controller/add_c" title='Nuevo'>Nueva</a></li>
					<?php endif; ?>
				  </ul>
				</div>
            </div>
     </div>
     <div class="row-fluid" id="result-list"> </div>

 </div><!--/span10-->


 <script>
    $(document).ready(function(){ 
        $("#result-list").load("<?=base_url()?>ordenes_controller/search_c");
        var t = setInterval("updateContent('<?=base_url()?>ordenes_controller/search_c/','result-list')",5000);
    });
</script>

 <?=$this->load->view('default/_footer_admin')?>