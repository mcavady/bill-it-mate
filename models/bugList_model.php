<?php

class BugList_model extends model {

	public function __construct(){
		parent::__construct();
	}

// === Get the list of bugs from the system Global for now. make this per user (the display of jobs is taken care of in the bugList view) === //
	public function get_buglist() {
		return $this->_db->select("SELECT bug_id, bug_start_date, bug_end_date, bug_title, bug_description, bug_worker_id, bug_attachments, bug_time_estimate, bug_time_remaining, bug_percent_complete, bug_project_id FROM " . PREFIX . "bugs" );
	}

// === delete the bug from the database === //
	public function delete_bug($id) {
		$this->_db->delete( PREFIX."bugs", $id);
	}
}
