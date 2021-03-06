<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
	}
	public function index()
	{
		$response['data'] = $this->api_model->get_visitor_count();
		$this->load->view('templates/head');
		$this->load->view('templates/navbar');
		$this->load->view('templates/layout');
		$this->load->view('templates/foot',$response);
		//log_message('info','Hello logging !!!!!');
	}
	public function about()
	{
		$this->load->view('pages/about');
		//log_message('info','Hello logging !!!!!');
	}
	public function home()
	{
		$this->load->view('home');
	}
	public function services()
	{
		$this->load->view('pages/services');
	}
	public function systemdesign()
	{
		$this->load->view('pages/sysdesign');
	}
	public function sysinstallation()
	{
		$this->load->view('pages/sysinstl');
	}
	public function sysoperation()
	{
		$this->load->view('pages/sysops');
	}
	public function products()
	{
		$this->load->view('pages/products');
	}
	public function installations()
	{
		$this->load->view('pages/installations');
	}
	public function contact()
	{
		$this->load->view('pages/contact');
	}
	public function faqs()
	{
		$this->load->view('pages/faqs');
	}
	public function visitor()
	{
		$response['data'] = $this->api_model->get_visitor_count();
		$this->load->view('pages/visitor',$response);
	}
}
