<!DOCTYPE html> 
<html> 
	<head> 
	<meta charset="utf-8" />
	<title>Tablero de control movil</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
      body {
        padding-top: 50px;
        padding-bottom: 40px;
      }
    </style>
	<link href="<?=base_url()?>assets/css/bootstrap-responsive.css" rel="stylesheet">

      <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-transition.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-alert.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-modal.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-dropdown.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-tab.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-tooltip.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-popover.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-button.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-collapse.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-carousel.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-typeahead.js"></script>
    <script src="<?=base_url()?>assets/js/extras.js"></script>

</head> 
<body> 

<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">NFC Admin </a>
          <div class="btn-group pull-right">
            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> <?=$this->session->userdata('username')?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li class="divider"></li>
              <li><a href="<?=base_url()?>a/logout">Salir</a></li>
            </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
</div>

    <div class="container-fluid">
      
        <div class="row-fluid">
                <div class="span2">
                  <div class="well sidebar-nav">
                    <?=$this->basicauth->getMenu()?>
                  </div><!--/.well -->
                </div><!--/span-->


     

 
		