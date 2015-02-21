<?php

class EditProject_model extends model {

	public function __construct(){
		parent::__construct();
	}

	public function get_project($projectId) {
// === get the project id from the cookie and use it in the where clause === //
		$projectId = Session::get('projectId');

		return $this->_db->select("SELECT project_id, project_name, project_startdate, project_completion_date, project_worker, project_description, project_time_estimate, project_percent_complete FROM " . PREFIX . "jobs WHERE project_id='" . $projectId . "'" );
	}

// === delete the ticket from the database === //
        public function update_project($postdata,$projectId) {
		$this->_db->update(PREFIX . "jobs", $postdata, $projectId);
        }
}
