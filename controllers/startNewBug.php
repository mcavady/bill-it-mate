<?php
        // === For admin/dashboard - Start New Bug Controller === //
        // === @author James - Responsive Developer === //
?>
<?php

class StartNewBug extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$projectList = $this->_model->get_projects();
                $data['allProjects'] = $projectList;

		if(isset($_POST['submit'])){
                        $bugProjectName         = $_POST['bugprojectname'];
                        $bugName        	= $_POST['bugname'];
                        $bugDescription         = $_POST['bugdescription'];
                        $bugStartDate           = $_POST['bugstartdate'];
                        $bugCompletionDate      = $_POST['bugcompletiondate'];
                        $bugTimeEstimate	= $_POST['bugtimeestimate'];
                        $bugPercentComplete     = $_POST['bugpercentcomplete'];

			if( (!isset($bugProjectName)) || (strlen($bugProjectName)<1) ){
                      		$error[30] = 'No bug project name entered';
               		}
			if( (!isset($bugName)) || (strlen($bugName)<1) ){
                      		$error[31] = 'No bug name entered';
               		}
			if( (!isset($bugDescription)) || (strlen($bugDescription)<1) ){
                       		$error[32] = 'Please enter a bug description';
               		}
			if( (!isset($bugStartDate)) || (strlen($bugStartDate)<2) ) {
       				$error[33] = 'Enter a valid date for bug start date - example (2014-02-02)';
               		}

			if( (!isset($bugCompletionDate)) || (strlen($bugCompletionDate)<2) ) {
       				$error[34] = 'Enter a valid date for bug completion date - example (2014-02-02)';
               		}

			if (!isset($bugTimeEstimate) ) {
                        	$error[35] = 'Enter a number (hrs) for bug time estimate';
                        }
			if(!is_numeric($bugTimeEstimate)) {
                        	$error[35] = 'Please enter a valid number (hrs) for bug time estimate';
                        }


			if( (!isset($bugPercentComplete)) || ($bugPercentComplete >=101) ) {
                        	$error[36] = 'Bug percent complete must be a number between 0 and 100';
                        }
			if(!is_numeric($bugPercentComplete)) {
                        	$error[36] = 'Bug percent complete must be a number';
                        }


			if(!isset($error)) {
				$worker = Session::get('id');
				$bugId = mt_rand(0,9000) . $worker;

                                $postdata = array(
				'bug_id' => $bugId,
				'bug_project_name' => $bugProjectName,
                                'bug_start_date' => $bugStartDate,
                                'bug_end_date' => $bugCompletionDate,
				'bug_worker_id' => $worker,
                                'bug_title' => $bugName,
                                'bug_description' => $bugDescription,
                                'bug_percent_complete' => $bugPercentComplete,
                                'bug_time_estimate' => $bugTimeEstimate
               	                );
				//use the insert bug from the start new ticket model
				$this->_model->insert_bug($postdata);

				//add the bug time to the bug totaltimes

				$data['success'] = true;
			}

		} else {
			//go mental
		}

	$data['title'] = 'Start New Ticket';
        $this->_view->rendertemplate('header',$data);
        $this->_view->render('loggedin/startNewBug',$data,$error);
        $this->_view->rendertemplate('footer',$data);
	}
}
