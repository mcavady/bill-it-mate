<?php
        // === For admin/dashboard - Edit Bug Model === //
        // === @author James - Responsive Developer === //
?>

<?php

class EditBug_model extends model {

	public function __construct(){
		parent::__construct();
	}

	public function get_bug($bugId) {
		$bugId = Session::get('bugId');
		return $this->_db->select("SELECT bug_id, bug_project_name, bug_start_date, bug_end_date, bug_title, bug_description, bug_worker_id, bug_time_estimate, bug_time_remaining, bug_percent_complete  FROM " . PREFIX . "bugs WHERE bug_id='" . $bugId . "'" );
	}

        public function update_bug($postdata,$bugSelected) {
                $this->_db->update( PREFIX."bugs", $postdata, $bugSelected);
        }
}
