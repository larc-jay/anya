<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
	}
	
	public function addUuser(){
				$user = array(
				'first_name' => $this->input->post('firstName'),
				'last_name' => $this->input->post('lastName'),
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
	
	public function addProduct(){
			$product = array(
				'cat_id' => $this->input->post('catId'),
				'product_id' => $this->input->post('productId') === null ? 'AGE_'.time() : $this->input->post('productId'),
				'sku' => $this->input->post('sku') === null ? 'AGE_'.time() : $this->input->post('sku'),
				'name' => $this->input->post('name'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'brand' => $this->input->post('brand'),
				'model' => $this->input->post('model'),
				'offers' => $this->input->post('offers'),
				'image' => $this->input->post('image'),
				'price' => $this->input->post('price'),
				'weight' => $this->input->post('weight')
			);
			$response = $this->api_model->set_product($product);
			$this->output->set_output(json_encode($response));
	}
	
	public function removeProduct(){
		$response = $this->api_model->remove_product($this->input->post('name'),$this->input->post('id'));
		$this->output->set_output(json_encode($response));
	}
	
	public function addCategory(){
		$category = array(
			'name' =>  $this->input->post('name'),
			'label' => $this->input->post('label')
		);
		$response = $this->api_model->set_product_category($category);
		$this->output->set_output(json_encode($response));
	}
	public function removeCategory(){
		$response = $this->api_model->remove_product_category($this->input->post('name'));
		$this->output->set_output(json_encode($response));
	}
}

?>