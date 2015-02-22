<?php
        // === For admin/dashboard - Project List Model === //
        // === @author James - Responsive Developer === //
?>

<?php

class ProjectList_model extends model {

	public function __construct(){
		parent::__construct();
	}

	public function get_projects() {
		return $this->_db->select("SELECT project_id, project_name, project_item, project_startdate,project_completion_date, project_tickets_count, project_tickets_time_estimate, project_bugs, project_bugtimeestimate, project_worker, project_percent_complete, project_company FROM " . PREFIX . "jobs" );
	}

        public function delete_project($id) {
                $this->_db->delete( PREFIX."jobs", $id);
        }
}
