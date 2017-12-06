<?php 
class Api_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('apiutil');
	}
	public function set_user($param)
	{
		print_r($param);
		$password = $param['password'];
		$salt       = $this->store_salt ? $this->salt() : FALSE;
		$password   = $this->hash_password($password, $salt,FALSE);
		$param['password'] = $password;
		$param['salt'] = $salt;
		
		$this->db->insert ( 'users', $param );
		$id = $this->db->insert_id ();
		$profile = array (
				'user_id' => $id
		);
		print_r($param);
		//$this->db->insert('user_profile', $profile );
		if($this->apiutil->response($id, "numeric")){
			$param['id'] = $id;
			return $this->apiutil->setResponseSuccessData($param);
		}else{
			return $this->apiutil->setResponseFailsData($param);
		}	 
	}
	
	
	public function hash_password($password, $salt=false, $use_sha1_override=FALSE)
	{
		if (empty($password))
		{
			return FALSE;
		}
	
		// bcrypt
		if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
		{
			return $this->bcrypt->hash($password);
		}
	
	
		if ($this->store_salt && $salt)
		{
			return  sha1($password . $salt);
		}
		else
		{
			$salt = $this->salt();
			return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}
	}
	public function salt()
	{
	
		$raw_salt_len = 16;
	
		$buffer = '';
		$buffer_valid = false;
	
		if (function_exists('random_bytes')) {
			$buffer = random_bytes($raw_salt_len);
			if ($buffer) {
				$buffer_valid = true;
			}
		}
	
		if (!$buffer_valid && function_exists('mcrypt_create_iv') && !defined('PHALANGER')) {
			$buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
			if ($buffer) {
				$buffer_valid = true;
			}
		}
	
		if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
			$buffer = openssl_random_pseudo_bytes($raw_salt_len);
			if ($buffer) {
				$buffer_valid = true;
			}
		}
	
		if (!$buffer_valid && @is_readable('/dev/urandom')) {
			$f = fopen('/dev/urandom', 'r');
			$read = strlen($buffer);
			while ($read < $raw_salt_len) {
				$buffer .= fread($f, $raw_salt_len - $read);
				$read = strlen($buffer);
			}
			fclose($f);
			if ($read >= $raw_salt_len) {
				$buffer_valid = true;
			}
		}
	
		if (!$buffer_valid || strlen($buffer) < $raw_salt_len) {
			$bl = strlen($buffer);
			for ($i = 0; $i < $raw_salt_len; $i++) {
				if ($i < $bl) {
					$buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
				} else {
					$buffer .= chr(mt_rand(0, 255));
				}
			}
		}
	
		$salt = $buffer;
	
		// encode string with the Base64 variant used by crypt
		$base64_digits   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
		$bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$base64_string   = base64_encode($salt);
		$salt = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);
	
		$salt = substr($salt, 0, $this->salt_length);
		return $salt;
	
	}
}