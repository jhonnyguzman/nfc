	</div> <!-- end div content -->
	<div data-role="footer" id="main-footer" data-position="fixed">
		<?php if($flag['i']):?>
			<div data-role="controlgroup" data-type="horizontal">
		  		<a href="<?=base_url()?>index.php/perfiles_controller/add_c" title='Nuevo' data-role="button" data-icon="plus">Nuevo</a>
		  	</div>
		<?php endif; ?>
	</div>
</div> <!-- end div page -->

</body>
</html>