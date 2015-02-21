<?php

class StartNewProject_model extends model {

	public function __construct(){
		parent::__construct();
	}

	public function insert_project($postdata) {
		$this->_db->insert(PREFIX."jobs",$postdata);
	}

//	public function get_project_user_project_count($projectTotal) {
//		return $this->_db->select("SELECT user_project_total FROM " . PREFIX . "users",$projectTotal);
//	}

	public function update_user_project_count($count,$where){
                $this->_db->update(PREFIX."users",$count,$where);
        }

}
