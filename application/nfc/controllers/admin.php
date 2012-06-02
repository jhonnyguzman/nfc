<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		//code here
		$data['subtitle'] = 'Test';
		//$this->load->view('admin_view/admin_home', $data);
		redirect('usuarios_controller','location');
	}

}