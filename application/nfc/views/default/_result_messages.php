<?php if($this->session->flashdata('flashConfirm')): ?>
	<div class="alert alert-success">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=$this->session->flashdata('flashConfirm')?>
	</div>
<?php endif; ?>

<?php if($this->session->flashdata('flashError')): ?> 
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?=$this->session->flashdata('flashError')?>
	</div>
<?php endif; ?>