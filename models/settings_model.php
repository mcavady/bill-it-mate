<?php
        // === For admin/dashboard - Settings Model === //
        // === @author James - Responsive Developer === //
?>

<?php

class Settings_model extends model {

	public function __construct(){
		parent::__construct();
	}
        public function delete_user($workerId) {
	// To do //
	// pass the array in properly here and get all the worker id's and id's here then delete them from the system using the controller
	//"bugs jobs tickets users" delete all record for that user
		$userId = Session::get('id');
                $this->_db->delete( PREFIX . "tickets", $workerId);
                $this->_db->delete( PREFIX . "bugs", $workerId);
                $this->_db->delete( PREFIX . "jobs", $workerId);
                $this->_db->delete( PREFIX . "users", $userId);
        }
}
