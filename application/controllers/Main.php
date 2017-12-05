<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('auth_model');
	}
	public function index()
	{
		$this->load->view('templates/head');
		$this->load->view('templates/navbar');
		$this->load->view('home');
		$this->load->view('templates/foot');
		//log_message('info','Hello logging !!!!!');
	}
}
