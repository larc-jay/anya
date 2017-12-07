<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Apiutil {
public function setResponseSuccessData($data,$message=null){
		$response = array(
				'responseCode' => 200,
				'status' =>'SUCCESS',
				'message' => $message,
				'data'  =>$data
		);
		return $response;
	}
	public function setResponseFailsData($data,$message=null){
		$response = array(
				'responseCode' => 404,
				'status' =>'FAIL',
				'message' => $message,
				'data'  =>'[]'
		);
		return $response;
	}
	
	public function response($data, $type) {
		if ($type == 'numeric') {
			if ($data > 0) {
				return true;
			} else {
				return  false;
			}
		}else{
			if (!is_null($data)) {
				return true;
			} else {
				return false;
			}
		}
	}
}