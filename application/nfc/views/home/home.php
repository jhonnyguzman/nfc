<?=$this->load->view("default/_header_public")?>
<?php $i = 1;?>

<div class="row-fluid">
    <div class="span12">
      <div class="well sidebar-nav">
        <ul class="nav nav-list">
          <li class="nav-header">
            Categorias
          </li>
          <?php foreach($categorias as $f): ?>
            <?php if($i == 1):?>
              <li class="active">
                <a href="<?=base_url()?>categorias/<?=$f->_id?>"><?=$f->descripcion?></a>
              </li>
            <?php else: ?>
              <li>
                <a href="<?=base_url()?>categorias/<?=$f->_id?>"><?=$f->descripcion?></a>
              </li>
            <?php endif; $i++; ?>
          <?php endforeach; ?>
        </ul>
      </div><!--/.well -->
    </div><!--/span-->
</div>  <!-- end row-fluid-->

<?=$this->load->view("default/_footer_public")?>