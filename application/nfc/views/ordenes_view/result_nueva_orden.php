<?=$this->load->view("default/_header_public")?>
<div class="row-fluid">
    <div class="span12">
	    <?php if($this->session->flashdata('flashConfirm')): ?>
			<div class="alert alert-success center">
				<?=$this->session->flashdata('flashConfirm')?>
				<p><br>
					<a href="<?=base_url()?>home" class="btn btn-success">Nueva orden</a>
				</p>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('flashError')): ?> 
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert" href="#">×</a>
				<?=$this->session->flashdata('flashError')?>
			</div>
		<?php endif; ?>
    </div>
 </div>
<?=$this->load->view("default/_footer_public")?>

<style type="text/css">
.center{
	text-align:center;
}
</style>