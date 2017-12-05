<?php 
class Api_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->tableName = 'fb_users';
        $this->primaryKey = 'id';
	}
	public function set_users($data)
	{
		$this->load->helper('url');
		$this->db->insert('users', $data);
		$id=$this->db->insert_id();
		$profile=array(
			'user_id'=>$id
		);
		$this->db->insert('profile', $profile);
		if($id>0){
			return "success";
		}else{
			return "fails";
		}
	}
	}