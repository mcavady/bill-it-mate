<?php
        // === For admin/dashboard - Log out Controller === //
        // === @author James - Responsive Developer === //
?>
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
