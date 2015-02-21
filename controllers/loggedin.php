<?php

class Loggedin extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$data['title'] = 'Dashboard';

		$this->_view->rendertemplate('header',$data);
		$this->_view->render('loggedin/userDashboard',$data);
		$this->_view->rendertemplate('footer',$data);
	}

// ===================================================== //
// === delete the session and redirect to login page === //
// ===================================================== //
	public function logout() {
		Session::destroy();
		Url::redirect('login');
	}
}
