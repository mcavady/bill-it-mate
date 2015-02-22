<?php

class Login extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

// === get the captch files ready for use === //
		include_once  '../securimage/securimage.php';
		$securimage = new Securimage();

//log the user in and redirect to dashboard it loggin cookie and hash match
		if(Session::get('loggedin') == true) {
	              	Url::redirect('userDashboard');
		}

// === get the form post data from the register view and validate it all; and spit errors in peoples faces if needed === //
		if(isset($_POST['submit'])){
			$username        = $_POST['username'];
			$password        = $_POST['password'];
			$humanConfirm    = $_POST['captcha_code'];

// === check the username is real === //
			if(strlen($username) < 4){
                                $error[13] = 'Did you type your username correctly?';
                        } else {
                                $check = $this->_model->get_username($username);
                                if(strtolower($check[0]->username) == strtolower($username)) {
					//do nothing
                                }else{
					$error[14] = 'Wrong username or password or account has not been activated';
				}
			}

// === check the password for length === //
			if(strlen($password) < 5) {
                                $error[11] = 'Did you type your password correctly?';
                        }
			if($humanConfirm !== $num) {
                                $error[15] = 'Did you type the captcha correctly?';
			}

// === capcha them bots (ask the user to enter the number in the image) === //
		if ($securimage->check($_POST['captcha_code']) == true) { //call the secure image and check

				if(isset($_POST['submit'])) {
                        	$data = $this->_model->get_user_details($_POST['username']);
				Session::set('banned',$data[0]->banned);

                			if(Password::password_verify($_POST['password'], $data[0]->password)) {
                        			Session::set('id',$data[0]->id);
                        			Session::set('username',$data[0]->username);
                        			Session::set('user_project_total',$data[0]->user_project_total);
						Session::set('loggedin',true);
                        			Session::set('expire',0);
						Session::set('ticketId',0);
						Url::redirect('userDashboard');

	        	        	} elseif($humanConfirm !== $num) {
                                		$error[15] = 'Did you miss something ?';
					} else {
			                	//kill the session just in case
						Session::destroy();
					}
				}
			}
		}

// === Render the login view === //
			$data['title'] = 'Login';
			$this->_view->rendertemplate('header',$data);
			$this->_view->render('login/login',$data,$error);
			$this->_view->rendertemplate('footer',$data);
	}//end public function index
}//end of controller
