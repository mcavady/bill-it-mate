<?php

class BugList extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
// === Make the array of jobs from the model and create and array for the view to loop through === //
 		$bugList = $this->_model->get_buglist();
		$data['allBugs'] = $bugList;


// === 27 july === //
// === edit the record from the database === //
                if(isset($_POST['edit']))
                {
                // === set the var with the ticket id from the edit button === //
                $bugId = $_POST['edit'];

                // === set the session with with ticket id === //
                Session::set('bugId',$bugId);
                // === redirect the user to the edit ticket page === //
                Url::redirect('editBug');
                }

// === delete the record from the database === //
		if(isset($_POST['delete']))
		{
			// === use the delete function from the buglist model === //
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
