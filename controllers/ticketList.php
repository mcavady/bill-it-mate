<?php

class TicketList extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
// === Make the array of jobs from the model and create and array for the view to loop through === //
 		$ticketsList = $this->_model->get_tickets();
		$data['allTickets'] = $ticketsList;

// === edit the record from the database === //
                if(isset($_POST['edit']))
                {
		// === set the var with the ticket id from the edit button === //
                $ticketId = $_POST['edit'];

		// === set the session with with ticket id === //
		Session::set('ticketId',$ticketId);
		// === redirect the user to the edit ticket page === //
              	Url::redirect('editTicket');
		}

// === delete the record from the database === //
                if(isset($_POST['delete']))
                {
                        // === use the delete function from the buglist model === //
                        $id = array('ticket_id' => $_POST['delete']);

                        $this->_model->delete_ticket($id);
                        Url::redirect('ticketList');
                }

// === render the jobList view out === //
		$data['title'] = 'Ticket List';

                $this->_view->rendertemplate('header',$data);
                $this->_view->render('loggedin/ticketList',$data);
                $this->_view->rendertemplate('footer',$data);
	}

}
