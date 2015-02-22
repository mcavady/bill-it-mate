<?php
        // === For admin/dashboard - Register Controller === //
        // === @author James - Responsive Developer === //
?>
<?php

class Register extends Controller{

	public function __construct(){
		parent::__construct();
	}
// ================================================================================================================================== //
// === validate the form data from the register view and create the user active token, and check if the user is registered or not === //
// ================================================================================================================================== //

	public function index(){

// === include the captcha files for use === //
	 include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
         $securimage = new Securimage();

// === get the form post data from the register view and validate it all; and spit errors in peoples faces if needed === //
		if(isset($_POST['submit'])){
			$username        = $_POST['username'];
			$email           = $_POST['email'];
			$password        = $_POST['password'];
			$passwordConfirm = $_POST['passwordConfirm'];
			$humanConfirm    = $_POST['captcha_code'];

// === validate the user name and check if it has been used already via the register model (get_username) === //
			if(strlen($username) < 4){
				$error[1] = 'Username is too short';
			} else {
				$check = $this->_model->get_username($username);
				if(strtolower($check[0]->username) == strtolower($username)) {
					$error[2] = 'Username is already taken';
				}
			}

// === validate the email and check if it has been used already via the register model (get_email) === //
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$error[3] = 'Please enter a valid email address';
			} else {
				$check = $this->_model->get_email($email);
				if(strtolower($check[0]->email) == strtolower($email)) {
					$error[4] = 'Email is already taken';
				}
			}

// === capcha them bots (ask the user to enter the number in the image) === //
			if(strlen($password) < 5) {
				$error[5] = 'Password is too short';
			} elseif($password != $passwordConfirm) {
				$error[6] = 'Passwords do not match';
			}
			if ($securimage->check($_POST['captcha_code']) == true) { //call the secure image and check
				//do nothing
			} else {
				$error[7] = 'Did you type the characters correctly ?';
			}

// === get the post data and hash up the password for the database model === //
			if(!isset($error)) {

				$activation = md5(uniqid(rand(),true));

				$hash = Password::password_hash($password, PASSWORD_BCRYPT);

				//insert to DB
				$postdata = array(
				'username' => $username,
				'email' => $email,
				'password' => $hash,
				'user_project_total' => '0',
				'active' => $activation, //was token now is activation
				'banned' => 'false', //set to false for the default non banned
				'signupdate' => date("Y-m-d H:i:s")
				);

// === if the above validates, insert user to the DB; set up the email and the message to send to the user for activation === //
				$id = $this->_model->insert_user($postdata);
				$to = $email;
				$subject = 'Bill It Mate - Registration Confirmation';
				$message = '<html><body>';

				$message .='<table cellspacing="4" cellpadding="4" border="0" bgcolor="#ffffff" align="center">';

					$message .='<tr>';
						$message .='<td>';
							$message .='<img src="http://www.bill-it-mate.com/images/logo.png" alt="Bill It Mate" />';
						$message .='</td>';
					$message .='</tr>';

					$message .='<tr>';
						$message .='<td>';
							$message .= '<h2>Your Registration Is Almost Complete.</h2>';
							$message .='Just click the link to confirm you registered <br>' .DIR. "register/activate/$id/$activation";
							$message .= '<h3>Important.</h3>';
							$message .= '<p>Keep the e-mail safe!</p>';
							$message .= '<h3>Thanks For Registering.</h3>';
						$message .='</td>';
					$message .='</tr>';

				$message .='</table>';
				$message .='</html></body>';

				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: no-reply@bill-it-mate.com' . "\r\n";
				$headers .= 'X-Mailer: PHP/' . phpversion();

				mail($to,$subject,$message,$headers);
				$data['success'] = true;
			}
		}

// === Render the register view === //
		$data['title'] = 'Register';

		$this->_view->rendertemplate('header',$data);
		$this->_view->render('register/register',$data,$error);
		$this->_view->rendertemplate('footer',$data);
	}

// ==================================================================================== //
// === activate the user, check if the user is already registered before activating === //
// ==================================================================================== //
	public function activate($id,$activation){

		if( ($id > 0) && (strlen($activation) == 32) ) {
			$user = $this->_model->get_userID($id,$activation);

				$postdata = array('active' => 'yes');
				$where = array('id' => $id);
				$this->_model->update_user($postdata,$where);

				$data['success'] = '<p>your account is now active <a href= '.DIR.'login>Login</a></p>';
		}

// === render the activation view === //
		$data['title'] = 'Activate Account';

		$this->_view->rendertemplate('header',$data);
		$this->_view->render('register/activate',$data,$error);
		$this->_view->rendertemplate('footer',$data);
	}
}//end of controller
