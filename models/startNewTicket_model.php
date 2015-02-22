<?php
        // === For admin/dashboard - Start New Ticket Model === //
        // === @author James - Responsive Developer === //
?>

<?php

class StartNewTicket_model extends model {

	public function __construct(){
		parent::__construct();
	}

	public function insert_ticket($postdata) {
		$this->_db->insert( PREFIX."tickets",$postdata);
	}

	public function get_projects() {
return $this->_db->select("SELECT project_id, project_name, project_item, project_startdate,project_completion_date, project_tickets_count,project_worker,  project_percent_complete, project_company FROM " . PREFIX . "jobs" );

        }


}
