<?php

class StartNewBug_model extends model {

	public function __construct(){
		parent::__construct();
	}

	public function insert_bug($postdata) {
		$this->_db->insert( PREFIX."bugs",$postdata);
	}

        public function get_projects() {
		return $this->_db->select("SELECT project_id, project_name, project_item, project_startdate,project_completion_date, project_tickets_count,project_worker, project_percent_complete, project_company FROM " . PREFIX . "jobs" );
        }


}
