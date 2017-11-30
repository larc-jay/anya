<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anyaapp extends CI_Controller {
	
	public function index()
	{
		$this->load->view('welcome_message');
		log_message('info','Hello logging !!!!!');
		print '<h1>Hello';
	}
}
