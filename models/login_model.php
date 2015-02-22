<?php
        // === For admin/dashboard - Login Model === //
        // === @author James - Responsive Developer === //
?>

<?php

class Login_model extends model {

	public function __construct(){
		parent::__construct();
	}

// === get the user details ready for the controller === //
	public function get_user_details($userDetails) {
		return $this->_db->select("SELECT id,username,password,banned,user_project_total FROM " . PREFIX . "users WHERE active='yes' AND username = :username", array(':username' => $userDetails));
        }

// === get the username === //
	public function get_username($username) {
                return $this->_db->select("SELECT id,username FROM " . PREFIX . "users WHERE username = :username", array(':username' => $username));
        }

}
