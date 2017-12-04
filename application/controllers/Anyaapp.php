<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anyaapp extends CI_Controller {
	
	public function index()
	{
		$this->load->view('_base/head');
		$this->load->view('home');
		$this->load->view('_base/foot');
		log_message('info','Hello logging !!!!!');
		print '<h1>Hello';
	}
}
