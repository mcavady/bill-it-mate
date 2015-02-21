<?php

class register_model extends model {

	public function __construct(){
		parent::__construct();
	}
//make sure this is returning the values it should to the controler
	public function get_userID($id,$activation){
		return $this->_db->select("SELECT id,active FROM " . PREFIX . "users WHERE id = :id AND active = :active",array(':id' => $id,':active' => $activation));
	}

	public function get_user_hash($username) {
		return $this->_db->select("SELECT id,username,password,banned FROM " . PREFIX . "users WHERE username = :username", array(':username' => $username));
	}

	public function get_username($username){
		return $this->_db->select("SELECT username FROM " . PREFIX . "users WHERE username = :username", array(':username' => $username));
	}

	public function get_email($email){
		return $this->_db->select("SELECT email FROM " . PREFIX . "users WHERE email = :email", array(':email' => $email));
	}

    	public function insert_user($data){
		$this->_db->insert(PREFIX."users",$data);
		return $this->_db->lastInsertId('id');
	}

	public function update_user($data,$where){
		$this->_db->update(PREFIX."users",$data,$where);
	}
}
