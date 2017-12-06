<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
	}
	
	public function add_user(){
				$user = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'username' => $this->input->post('username'),
				'last_login' => time(),
				'active' => 0,
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone'));
		$response = $this->api_model->set_user($user);
		$this->output->set_output(json_encode($response));
	}
}

?>