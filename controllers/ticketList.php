<?php
        // === For admin/dashboard - Ticket List Controller === //
        // === @author James - Responsive Developer === //
?>
<?php

class TicketList extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
 		$ticketsList = $this->_model->get_tickets();
		$data['allTickets'] = $ticketsList;
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
                        $id = array('ticket_id' => $_POST['delete']);

                        $this->_model->delete_ticket($id);
                        Url::redirect('ticketList');
                }

// === render the ticket list view out === //
		$data['title'] = 'Ticket List';

                $this->_view->rendertemplate('header',$data);
                $this->_view->render('loggedin/ticketList',$data);
                $this->_view->rendertemplate('footer',$data);
	}

}
