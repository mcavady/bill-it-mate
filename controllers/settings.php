<?php
        // === For admin/dashboard - Settings Controller === //
        // === @author James - Responsive Developer === //
?>
<?php

class Settings extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
	 if(Session::get('loggedin') == true) { //only do this if they are loggedin in if not redirect to login
                $worker = Session::get('id');


		// === delete the record from the database === //
                if(isset($_POST['delete']))
                {
                        // === use the delete function from the buglist model === //
                        $workerId = array('worker_id' => $_POST['delete']);
                        $this->_model->delete_user($workerId);
                        Url::redirect('settings.php');
                }
	}



		$data['title'] = 'User Settings';

                $this->_view->rendertemplate('header',$data);
                $this->_view->render('loggedin/settings',$data);
                $this->_view->rendertemplate('footer',$data);
	}

}
