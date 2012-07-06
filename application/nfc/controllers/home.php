<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

  function __construct()
  {
    parent::__construct();
      $this->load->model('categorias_model');
  }

  public function index()
  {
    $data['title_header'] = 'Restaurante';
    $data['categorias'] = $this->categorias_model->get_m();
    $this->load->view("home/home", $data);
  }

}

?>