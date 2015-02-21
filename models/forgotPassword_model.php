<?php

class ForgotPassword_model extends model {

	public function __construct(){
		parent::__construct();
	}

// === get the username === //
        public function get_username($username) {
                return $this->_db->select("SELECT id,username FROM " . PREFIX . "users WHERE username = :username", array(':username' => $username));
        }

	public function update_user($data,$where){
                $this->_db->update(PREFIX."users",$data,$where);
        }

}
