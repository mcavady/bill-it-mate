<?php

class EditProject extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

                $selectedProject = $this->_model->get_project($projectId);
                $data['selectedProject'] = $selectedProject;
// === show the selected ticket === //

		if(isset($_POST['submit'])){
                        $projectName         	    = $_POST['projectname'];
                        $projectDescription         = $_POST['projectdescription'];
                        $projectStartDate           = $_POST['projectstartdate'];
                        $projectCompletionDate      = $_POST['projectcompletiondate'];
                        $projectTimeEstimate	    = $_POST['projecttimeestimate'];
                        $projectPercentComplete     = $_POST['projectpercentcomplete'];

			if( (!isset($projectName)) || (strlen($projectName)<1) ){
                      		$error[30] = 'No project name entered';
               		}
			if( (!isset($projectDescription)) || (strlen($projectDescription)<1) ){
                       		$error[32] = 'Please enter a project description';
               		}
			if( (!isset($projectStartDate)) || (strlen($projectStartDate)<2) ) {
       				$error[33] = 'Enter a valid date for project start date - example (2014-02-02)';
               		}
			if( (!isset($projectCompletionDate)) || (strlen($projectCompletionDate)<2) ) {
       				$error[34] = 'Enter a valid date for project completion date - example (2014-02-02)';
               		}
			if (!isset($projectTimeEstimate) ) {
                        	$error[35] = 'Enter a number (hrs) for project time estimate';
                        }
			if(!is_numeric($projectTimeEstimate)) {
                        	$error[35] = 'Please enter a valid number (hrs) for project time estimate';
                        }
			if( (!isset($projectPercentComplete)) || ($projectPercentComplete >=101) ) {
                        	$error[36] = 'Project percent complete must be a number between 0 and 100';
                        }
			if(!is_numeric($projectPercentComplete)) {
                        	$error[36] = 'Project percent complete must be a number';
                        }
			if(!isset($error)) {
			$worker = Session::get('id');
			$projectId = Session::get('projectId');
                        $postdata = array(
                                'project_company' => $projectCompany,
                                'project_id' => $projectId,
                                'project_name' => $projectName,
                                'project_description' => $projectDescription,
                                'project_startdate' => $projectStartDate,
                                'project_completion_date' => $projectCompletionDate,
                                'project_time_estimate' => $projectTimeEstimate,
                                //'project_bugs' => "0",
                                //'project_bugtimeestimate' => "0",
                                //'project_tickets_count' => "0",
                                //'project_tickets_time_estimate' => "0",
                                //'project_percent_complete' => $projectPercentComplete,
                                'project_worker' => $worker
               	              );

				$data['success'] = true;
				var_dump($projectId);
				$ProjectSelected = array('project_id' => $projectId);
				var_dump($projectSelected);

				// === reload the bug for view === //
				$this->_model->update_project($postdata,$projectSelected);

			}
		} else {
				$data['success'] = false;
		}

                $data['title'] = 'Edit Project';

                $this->_view->rendertemplate('header',$data);
                $this->_view->render('loggedin/editProject',$data,$error);
                $this->_view->rendertemplate('footer',$data);
	}

}
