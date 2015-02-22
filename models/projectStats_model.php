<?php
        // === For admin/dashboard - Project Stats Model === //
        // === @author James - Responsive Developer === //
?>

<?php

class ProjectStats_model extends model {

	public function __construct(){
		parent::__construct();
	}
	public function get_projectstats() {
		return $this->_db->select("SELECT project_id, project_name, project_item, project_startdate, project_completiondate, project_bugs, project_bugtimeestimate, project_description, project_worker, project_percent_complete, project_company FROM " . PREFIX . "jobs" );
	}
}
