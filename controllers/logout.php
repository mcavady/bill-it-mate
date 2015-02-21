<?php

class Logout extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function logout() {
                Session::destroy();
                Url::redirect('login');
        }

}
