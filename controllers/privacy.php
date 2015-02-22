<?php
        // === For admin/dashboard - Privacy Controller === //
        // === @author James - Responsive Developer === //
?>
<?php

class Privacy extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$data['title'] = 'Privacy Statment';

		$this->_view->rendertemplate('header',$data);
		$this->_view->render('privacy/statement',$data);
		$this->_view->rendertemplate('footer',$data);
	}
}
