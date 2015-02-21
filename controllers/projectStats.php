<?php

class ProjectStats extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
// === Make the array of jobs from the model and create and array for the view to loop through === //
 		$projectStats = $this->_model->get_projectstats();
		$data['allProjectStats'] = $projectStats;

// === render the jobList view out === //
		$data['title'] = 'Project Stats';

                $this->_view->rendertemplate('header',$data);
                $this->_view->render('loggedin/projectStats',$data,$error);
                $this->_view->rendertemplate('footer',$data);
	}

}
