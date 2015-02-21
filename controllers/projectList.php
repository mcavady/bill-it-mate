<?php

class ProjectList extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
// === Make the array of jobs from the model and create and array for the view to loop through === //
 		$projectList = $this->_model->get_projects();
		$data['allProjects'] = $projectList;

// === edit the record from the database === //
                if(isset($_POST['edit']))
                {
                $projectId = $_POST['edit'];

                // === set the session with with project id === //
                Session::set('projectId',$projectId);
                // === redirect the user to the edit project page === //
                Url::redirect('editProject');

                }

// === delete the record from the database === //
                if(isset($_POST['delete']))
                {
                        // === use the delete function from the buglist model === //
                        $id = array('project_id' => $_POST['delete']);

                        $this->_model->delete_project($id);
                        Url::redirect('projectList');
                }



// === render the jobList view out === //
		$data['title'] = 'Project List';

                $this->_view->rendertemplate('header',$data);
                $this->_view->render('loggedin/projectList',$data);
                $this->_view->rendertemplate('footer',$data);
	}

}
