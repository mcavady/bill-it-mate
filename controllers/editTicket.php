<?php

class EditTicket extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

                $selectedTicket = $this->_model->get_ticket($ticketId);
                $data['selectedTicket'] = $selectedTicket;
// === show the selected ticket === //

		if(isset($_POST['submit'])){
                        $ticketProjectName         = $_POST['ticketprojectname'];
                        $ticketName        	   = $_POST['ticketname'];
                        $ticketDescription         = $_POST['ticketdescription'];
                        $ticketStartDate           = $_POST['ticketstartdate'];
                        $ticketCompletionDate      = $_POST['ticketcompletiondate'];
                        $ticketTimeEstimate	   = $_POST['tickettimeestimate'];
                        $ticketPercentComplete     = $_POST['ticketpercentcomplete'];

			if( (!isset($ticketProjectName)) || (strlen($ticketProjectName)<1) ){
                      		$error[30] = 'No ticket project name entered';
               		}
			if( (!isset($ticketName)) || (strlen($ticketName)<1) ){
                      		$error[31] = 'No ticket name entered';
               		}
			if( (!isset($ticketDescription)) || (strlen($ticketDescription)<1) ){
                       		$error[32] = 'Please enter a ticket description';
               		}
			if( (!isset($ticketStartDate)) || (strlen($ticketStartDate)<2) ) {
       				$error[33] = 'Enter a valid date for ticket start date - example (2014-02-02)';
               		}
			if( (!isset($ticketCompletionDate)) || (strlen($ticketCompletionDate)<2) ) {
       				$error[34] = 'Enter a valid date for ticket completion date - example (2014-02-02)';
               		}
			if (!isset($ticketTimeEstimate) ) {
                        	$error[35] = 'Enter a number (hrs) for ticket time estimate';
                        }
			if(!is_numeric($ticketTimeEstimate)) {
                        	$error[35] = 'Please enter a valid number (hrs) for ticket time estimate';
                        }
			if( (!isset($ticketPercentComplete)) || ($ticketPercentComplete >=101) ) {
                        	$error[36] = 'Ticket percent complete must be a number between 0 and 100';
                        }
			if(!is_numeric($ticketPercentComplete)) {
                        	$error[36] = 'Ticket percent complete must be a number';
                        }
			if(!isset($error)) {
			$worker = Session::get('id');
			$ticketId = Session::get('ticketId');
			$timeRemaining = (100 - $ticketPercentComplete) / 100 * $ticketTimeEstimate;//gemmas theory 
                        $postdata = array(
				'ticket_id' => $ticketId,
				'ticket_project_name' => $ticketProjectName,
                                'ticket_start_date' => $ticketStartDate,
                                'ticket_finish_date' => $ticketCompletionDate,
				'ticket_worker_id' => $worker,
                        	'ticket_title' => $ticketName,
                        	'ticket_description' => $ticketDescription,
                        	'ticket_percent_complete' => $ticketPercentComplete,
                        	'ticket_time_estimate' => $ticketTimeEstimate,
				'ticket_time_remaining' => $timeRemaining
               	              );
				//$ticketSelected = Session::get('ticketId');
				$ticketSelected = array('ticket_id' => $ticketId);
				//use the insert ticket from the start new ticket model
				$this->_model->update_ticket($postdata,$ticketSelected);
				$data['success'] = true;
				// === reload the ticket for view === //
                		$selectedTicket = $this->_model->get_ticket($ticketId);
				$data['selectedTicket'] = $selectedTicket;
			}
		} else {
			//go mental
		}

                $data['title'] = 'Edit Ticket';

                $this->_view->rendertemplate('header',$data);
                $this->_view->render('loggedin/editTicket',$data);
                $this->_view->rendertemplate('footer',$data);
	}
}
