<?php
        // === For admin/dashboard - Invoices Controller === //
        // === @author James - Responsive Developer === //
?>
<?php

class Invoices extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$data['title'] = 'User Settings';

                $this->_view->rendertemplate('header',$data);
                $this->_view->render('loggedin/invoices',$data);
                $this->_view->rendertemplate('footer',$data);
	}

}
