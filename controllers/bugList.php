<?php
        // === For admin/dashboard - Bug List Controller === //
        // === @author James - Responsive Developer === //
?>

<?php

class BugList extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
 		$bugList = $this->_model->get_buglist();
		$data['allBugs'] = $bugList;

                if(isset($_POST['edit']))
                {
                $bugId = $_POST['edit'];
                Session::set('bugId',$bugId);
                Url::redirect('editBug');
                }
		if(isset($_POST['delete']))
		{
			$id = array('bug_id' => $_POST['delete']);

			$this->_model->delete_bug($id);
			Url::redirect('bugList');
		}
		// === render the jobList view out === //
		$data['title'] = 'Bug List';

                $this->_view->rendertemplate('header',$data);
                $this->_view->render('loggedin/bugList',$data,$error);
                $this->_view->rendertemplate('footer',$data);
	}

}
