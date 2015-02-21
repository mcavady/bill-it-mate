<?php

class EditTicket_model extends model {

	public function __construct(){
		parent::__construct();
	}

	public function get_ticket($ticketId) {
// === get the ticket id from the cookie and use it in the where clause === //
		$ticketId = Session::get('ticketId');
		return $this->_db->select("SELECT ticket_id, ticket_project_name, ticket_start_date, ticket_finish_date, ticket_title,ticket_description, ticket_worker_id, ticket_time_estimate, ticket_time_remaining, ticket_percent_complete  FROM " . PREFIX . "tickets WHERE ticket_id='" . $ticketId . "'" );
	}

// === delete the ticket from the database === //
        public function update_ticket($postdata,$ticketSelected) {
                $this->_db->update( PREFIX."tickets", $postdata, $ticketSelected);
        }
}
