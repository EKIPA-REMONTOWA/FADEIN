<?php
if(!defined('BASEPATH'))
	{
	exit('No direct script access allowed');
	}
class Poczta_model extends CI_Model {
	function wstaw_msg_do_bazy($req_date) {
		$this->db->insert('messages', $req_date);
		return TRUE;
	}
	
	function ustal_id_odbiorcy($req_username) {
		$this->db->select('id_user');
		$this->db->where('username', $req_username);
		$query = $this->db->get('users');
		return $query->row_array();
	}
}
?>