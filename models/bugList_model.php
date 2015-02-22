<?php
        // === For admin/dashboard - Bug List Model === //
        // === @author James - Responsive Developer === //
?>

<?php

class BugList_model extends model {

	public function __construct(){
		parent::__construct();
	}

	public function get_buglist() {
		return $this->_db->select("SELECT bug_id, bug_start_date, bug_end_date, bug_title, bug_description, bug_worker_id, bug_attachments, bug_time_estimate, bug_time_remaining, bug_percent_complete, bug_project_id FROM " . PREFIX . "bugs" );
	}

	public function delete_bug($id) {
		$this->_db->delete( PREFIX."bugs", $id);
	}
}
