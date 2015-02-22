<?php
        // === For admin/dashboard - Project List Controller === //
        // === @author James - Responsive Developer === //
?>
<?php

class ProjectList extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
 		$projectList = $this->_model->get_projects();
		$data['allProjects'] = $projectList;
                if(isset($_POST['edit']))
                {
                $projectId = $_POST['edit'];
                Session::set('projectId',$projectId);
                Url::redirect('editProject');
                }
                if(isset($_POST['delete']))
                {
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
