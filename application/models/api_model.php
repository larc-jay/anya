<?php
class Api_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
		$this->load->library ( 'apiutil' );
	}
	public function set_user($param) {
		$password = $param ['password'];
		$salt = $this->generate_salt ( 30 );
		$password = $this->hash_password ( $salt . $password );
		$param ['password'] = $password;
		$param ['salt'] = $salt;
		
		$this->db->insert ( 'users', $param );
		$id = $this->db->insert_id ();
		$profile = array (
				'user_id' => $id 
		);
		// $this->db->insert('user_profile', $profile );
		if ($this->apiutil->response ( $id, "numeric" )) {
			$param ['id'] = $id;
			return $this->apiutil->setResponseSuccessData ( $param, "User added successfully" );
		} else {
			return $this->apiutil->setResponseFailsData ( $param, 'User not added' );
		}
	}
	public function set_product($param) {
		$this->db->insert ( 'products', $param );
		$id = $this->db->insert_id ();
		if ($this->apiutil->response ( $id, "numeric" )) {
			$param ['id'] = $id;
			return $this->apiutil->setResponseSuccessData ( $param, "Product added successfully" );
		} else {
			return $this->apiutil->setResponseFailsData ( $param, "No record found for deletion" );
		}
	}
	public function remove_product($name, $id) {
		$this->db->select ( '*' );
		$this->db->from ( 'products' );
		$this->db->where ( 'name', $name );
		$this->db->where ( 'id', $id );
		$query = $this->db->get ();
		$row = $query->row ();
		
		if (count ( $row ) > 0 && $this->apiutil->response ( $row->id, "numeric" )) {
			$this->deleteOneRecord ( 'products', $row->id, 'id' );
			return $this->apiutil->setResponseSuccessData ( $row, "Product deleted successfully" );
		} else {
			return $this->apiutil->setResponseFailsData ( $row, "No product found for deletion" );
		}
	}
	public function set_product_category($param) {
		$this->db->insert ( 'category', $param );
		$id = $this->db->insert_id ();
		if ($this->apiutil->response ( $id, "numeric" )) {
			$param ['id'] = $id;
			return $this->apiutil->setResponseSuccessData ( $param, "Product category added successfully" );
		} else {
			return $this->apiutil->setResponseFailsData ( $param, "Product category not added" );
		}
	}
	public function remove_product_category($name) {
		$this->db->select ( '*' );
		$this->db->from ( 'category' );
		$this->db->where ( 'name', $name );
		$query = $this->db->get ();
		$row = $query->row ();
		
		if (count ( $row ) > 0 && $this->apiutil->response ( $row->id, "numeric" )) {
			$ret = $this->deleteOneRecord ( 'category', $row->id, 'id' );
			return $this->apiutil->setResponseSuccessData ( $row, "Product category deleted successfully" );
		} else {
			return $this->apiutil->setResponseFailsData ( $row, "No product category found for deletion" );
		}
	}
	private function deleteOneRecord($table, $id, $fieldName) {
		$this->db->where ( $fieldName, $id );
		return $this->db->delete ( $table );
	}
	private function hash_password($password) {
		return password_hash ( $password, PASSWORD_BCRYPT );
	}
	public function add_faqs($param) {
		$this->db->insert ( 'faq', $param );
		$id = $this->db->insert_id ();
		if ($id > 0 && $this->apiutil->response ($id , "numeric" )) {
			$param['id'] = $id;
			return $this->apiutil->setResponseSuccessData ( $param, "FAQ added successfully" );
		} else {
			return $this->apiutil->setResponseFailsData ( $row, "FAQ not added" );
		}
	}
	public function get_faqs_list(){
		$query =  $this->db->get('faq');
		return $query->result_array();
	}
	public function get_view_product($id){
		$this->db->select ( '*' );
		$this->db->from ( 'products' );
		$this->db->where ('id', $id );
		$query =  $this->db->get();
		return $query->row();
	}
	
	public function get_visitor_count(){
		$flag = true;
		if($flag){
			$this->update_visitor_count();
		}
		$query =  $this->db->get('visotor_counter');
		return $query->row();
	}
	
	private function update_visitor_count(){
		$this->db->query('update  visotor_counter set visit_count = visit_count + 1 where id =1');
	}
	
	
	
	
	
	
	
	
	function generate_salt($length = 10) {
		$source = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$i = 0;
		$salt = '';
		while ( $i < $length ) {
			$salt .= substr ( $source, rand ( 1, strlen ( $source ) ), 1 );
			$i += 1;
		}
		return $salt;
	}
}