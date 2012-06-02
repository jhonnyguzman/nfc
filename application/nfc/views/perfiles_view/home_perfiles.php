<?=$this->load->view('default/_header_admin')?>

<div class="span10">
	<div class="page-header">
	  <h1><?=$title_header?></h1>
	</div>
	
	<?=$this->load->view("default/_result_messages")?>

	 <div class="row-fluid">
            <div class="span10">
            	<form action="<?=base_url()?>perfiles_controller/search_c" method="post" name="formSearchperfiles" id="formSearchperfiles" class="well form-search">
					<input type="search" name="descripcion" id="descripcion" placeholder="descripción" class="input-medium search-query"/>
					<button type="submit" class="btn" onClick="searchData('formSearchperfiles','result-list')">Buscar</button>
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
						<li><a href="<?=base_url()?>perfiles_controller/add_c" title='Nuevo'>Nuevo</a></li>
					<?php endif; ?>
				  </ul>
				</div>
            </div>
     </div>
     <div class="row-fluid" id="result-list"> </div>

 </div><!--/span10-->


 <script>
    $(document).ready(function(){ 
        $("#result-list").load("<?=base_url()?>perfiles_controller/search_c");
    });
</script>

 <?=$this->load->view('default/_footer_admin')?>