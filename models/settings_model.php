<?php

class Settings_model extends model {

	public function __construct(){
		parent::__construct();
	}
	// === delete the ticket from the database === //
        public function delete_user($workerId) {

	// pass the array in properly here and get all the worker id's and id's here then delete them from the system using the controller
	//"bugs jobs tickets users" delete all record for that user
		$userId = Session::get('id');
                $this->_db->delete( PREFIX . "tickets", $workerId);
                $this->_db->delete( PREFIX . "bugs", $workerId);
                $this->_db->delete( PREFIX . "jobs", $workerId);
                $this->_db->delete( PREFIX . "users", $userId);
        }
}
