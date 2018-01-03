<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class API extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'api_model' );
	}
	public function addUuser() {
		$user = array (
				'first_name' => $this->input->post ( 'firstName' ),
				'last_name' => $this->input->post ( 'lastName' ),
				'email' => $this->input->post ( 'email' ),
				'password' => $this->input->post ( 'password' ),
				'username' => $this->input->post ( 'username' ),
				'last_login' => time (),
				'active' => 0,
				'company' => $this->input->post ( 'company' ),
				'phone' => $this->input->post ( 'phone' ) 
		);
		$response = $this->api_model->set_user ( $user );
		$this->output->set_output ( json_encode ( $response ) );
	}
	public function addProduct() {
		$product = array (
				'cat_id' => $this->input->post ( 'catId' ),
				'product_id' => $this->input->post ( 'productId' ) === null ? 'AGE_' . time () : $this->input->post ( 'productId' ),
				'sku' => $this->input->post ( 'sku' ) === null ? 'AGE_' . time () : $this->input->post ( 'sku' ),
				'name' => $this->input->post ( 'name' ),
				'title' => $this->input->post ( 'title' ),
				'description' => $this->input->post ( 'description' ),
				'brand' => $this->input->post ( 'brand' ),
				'model' => $this->input->post ( 'model' ),
				'offers' => $this->input->post ( 'offers' ),
				'image' => $this->input->post ( 'image' ),
				'price' => $this->input->post ( 'price' ),
				'weight' => $this->input->post ( 'weight' ) 
		);
		$response = $this->api_model->set_product ( $product );
		$this->output->set_output ( json_encode ( $response ) );
	}
	public function removeProduct() {
		$response = $this->api_model->remove_product ( $this->input->post ( 'name' ), $this->input->post ( 'id' ) );
		$this->output->set_output ( json_encode ( $response ) );
	}
	public function addCategory() {
		$category = array (
				'name' => $this->input->post ( 'name' ),
				'label' => $this->input->post ( 'label' ) 
		);
		$response = $this->api_model->set_product_category ( $category );
		$this->output->set_output ( json_encode ( $response ) );
	}
	public function removeCategory() {
		$response = $this->api_model->remove_product_category ( $this->input->post ( 'name' ) );
		$this->output->set_output ( json_encode ( $response ) );
	}
	public function addFaq() {
		$faq = array (
				'title' => $this->input->post ( 'title' ),
				'description' => $this->input->post ( 'description' ),
				'type' => $this->input->post ( 'type' ) === null ? 'general' : $this->input->post ( 'type' ) 
		);
		$response = $this->api_model->add_faqs ( $faq );
		$this->output->set_output ( json_encode ( $response ) );
	}
	public function getFaqs() {
		$response = $this->api_model->get_faqs_list ();
		$this->output->set_output ( json_encode ( $response ) );
	}
	public function getViewProduct() {
		$json = json_decode ( file_get_contents ( 'php://input' ), true );
		$response = $this->api_model->get_view_product ( $json ['id'] );
		$this->output->set_output ( json_encode ( $response ) );
	}
	public function visitorCounter() {
		$response = $this->api_model->get_visitor_count ();
		$this->output->set_output ( json_encode ( $response ) );
	}
	public function contact() {
		 $res= array();
		 $json = json_decode ( file_get_contents ( 'php://input' ), true );
		 if ($this->sendMail ( $json ['name'], $json ['email'], $json ['query'], $json ['message'] )) {
		 	$res['message'] = "Your email send successfully";
		 } else {
		 	$res['message'] = "Your query is not send. Please tray again!";
		 }
		 $this->output->set_output ( json_encode ( $res ) );
	}
	public function sendMail($name, $email, $query, $message) {
		try {
			$this->load->library ( 'email' );
			$this->email->from ( $email, 'Anya Green Energy Solution | Solar Energy' );
			$this->email->to ( 'contact@anyagreenenergy.com' );
			$this->email->cc ( 'jay.answer@wmail.com' );
			// $this->email->bcc('them@their-example.com');
			$this->email->subject ( 'Query from ' . $name );
			$this->email->set_mailtype ( 'html' );
			// $body = $this->load->view('templates/fp-email-tpl',$data,TRUE);
			$this->email->message ( $message );
			if ($this->email->send ()) {
				$this->email->print_debugger();
				return true;
			} else {
				$this->email->print_debugger();
				return false;
			}
			$this->email->print_debugger();
		} catch ( Exception $e ) {
			$this->email->print_debugger();
			return false;
		}
	}
}

?>