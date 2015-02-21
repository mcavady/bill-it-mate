<?php

class UserDashboard extends Controller{

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		 if(Session::get('banned') == 'true') {
// === Render the banned error view === //
			$data['title'] = 'Dashboard';
			$this->_view->rendertemplate('header',$data);
			$this->_view->render('error/banned',$data,$error);
			$this->_view->rendertemplate('footer',$data);

                 } elseif(Session::get('loggedin') == true) {


		// === Get all project Stats === //
                $jobStatsDashboard = $this->_model->get_jobstatsdashboard();
                $data['allJobStatsDashboard'] = $jobStatsDashboard;

		// === Get all the ticket stats === //
		$ticketStatsDashboard = $this->_model->get_ticketstats();
		$data['allTicketStatsDashboard'] = $ticketStatsDashboard;

		// === Get all the ticket stats === //
		$bugStatsDashboard = $this->_model->get_bugstats();
		$data['allBugStatsDashboard'] = $bugStatsDashboard;


// === Render the dashboard view === //
			$data['title'] = 'Dashboard';
			$this->_view->rendertemplate('header',$data);
			$this->_view->render('loggedin/userDashboard',$data,$error);
			$this->_view->rendertemplate('footer',$data);
              	} else {
	                Url::redirect('login');
                }
	}//end public function index
}//end of controller




