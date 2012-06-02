<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A extends CI_Controller {

	public function index()
	{
		$data['title_header'] = 'Ingreso';
		$this->load->view("admin_view/admin_login", $data);
	}


	/**
	 * This function check if the user is validate
	 *
	 * @access public
	 * @return void
	 */
	function login()
	{
		//code here
		$this->load->model('usuarios_model');
		$data = array();
		$data['title_header'] = 'Ingreso';
		$this->form_validation->set_rules('username', 'username', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|alpha_numeric|md5|xss_clean');
		if($this->form_validation->run())
		{	
			$reponse = $this->basicauth->login(array('username'=>$this->input->post('username'),'password'=>$this->input->post('password')));
			if(!isset($reponse['error'])){
				$reponse_menu = $this->basicauth->checkMenuUser();
				if(!isset($reponse_menu['error'])){
					redirect('admin');
				}else {
					$data['error'] = $reponse_menu['error'];
					$this->load->view('admin_view/admin_login',$data);
				}
			}else {
				$data['error'] = $reponse['error'];
				$this->load->view('admin_view/admin_login',$data);
			}
		}else{
			$this->load->view('admin_view/admin_login',$data);
		}
	}


	/**
	 * This function closes the user session
	 *
	 * @access public
	 * @return void
	 */
	function logout()
	{
		//code here
		$this->basicauth->logout();
		redirect('a');	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */