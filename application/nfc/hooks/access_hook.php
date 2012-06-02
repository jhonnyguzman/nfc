<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_Hook {

	function checkUser()
	{
		$CI =& get_instance();
		$privatecontrollers = array('opmenu_controller',
			'admin',
			'usuarios_controller',
			'opemenu_controller',
			'perfiles_controller',
			'categorias_controller',
			'mesas_controller');
		if($CI->session->userdata('logged_in') == true && $CI->router->method == 'login') redirect('admin');
		if($CI->session->userdata('logged_in') != true && $CI->router->method != 'login' && in_array($CI->router->class, $privatecontrollers))
		{
			//redirect('usuarios_controller/login_c');
			echo "<script>window.open('".base_url()."a','_top');</script>";
		}
	}

}