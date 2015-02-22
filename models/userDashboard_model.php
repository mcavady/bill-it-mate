<?php
        // === For admin/dashboard - User Dashboard Model === //
        // === @author James - Responsive Developer === //
?>

<?php

class UserDashboard_model extends model {

	public function __construct(){
		parent::__construct();
	}
	public function get_jobstatsdashboard() {
		return $this->_db->select("SELECT project_id, project_name, project_item, project_startdate, project_completion_date, project_bugs, project_bugtimeestimate, project_worker, project_percent_complete, project_company FROM " . PREFIX . "jobs" );
	}

	public function get_ticketstats() {
		return $this->_db->select("SELECT ticket_id, ticket_project_name, ticket_start_date, ticket_finish_date, ticket_title, ticket_description, ticket_worker_id, ticket_time_estimate, ticket_time_remaining, ticket_percent_complete FROM " . PREFIX . "tickets");
	}

	public function get_bugstats() {
		return $this->_db->select("SELECT bug_id, bug_start_date, bug_end_date, bug_title, bug_description, bug_worker_id, bug_attachments, bug_time_estimate, bug_time_remaining, bug_percent_complete, bug_project_id, bug_project_name  FROM " . PREFIX . "bugs");
	}

}
