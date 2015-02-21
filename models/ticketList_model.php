<?php

class TicketList_model extends model {

	public function __construct(){
		parent::__construct();
	}

	public function get_tickets() {
		return $this->_db->select("SELECT ticket_id, ticket_project_name, ticket_start_date, ticket_finish_date, ticket_title,ticket_description, ticket_worker_id, ticket_time_estimate, ticket_time_remaining, ticket_percent_complete  FROM " . PREFIX . "tickets" );
	}

	// === delete the ticket from the database === //
        public function delete_ticket($id) {
                $this->_db->delete( PREFIX . "tickets", $id);
        }
}
