<?php
        // === For admin/dashboard - Forgot Password Controller === //
        // === @author James - Responsive Developer === //
?>
<?php

class ForgotPassword extends Controller{

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
			$newPassword        = $_POST['password'];
			$newPasswordConfirm = $_POST['passwordConfirm'];
			$humanConfirm    = $_POST['captcha_code'];

// === capcha them bots (ask the user to enter the number in the image) === //
                        if(strlen($newPassword) < 5) {
                                $error[5] = 'Password is too short';
                        } elseif($newPassword != $newPasswordConfirm) {
                                $error[6] = 'Passwords do not match';
                        }
                        if ($securimage->check($_POST['captcha_code']) == true) { //call the secure image and check
                                //do nothing
                        } else {
                                $error[7] = 'Did you type the characters correctly ?';
                        }

// === validate the user name and check if it has been used already via the forgot password model (get_username) === //
			$check = $this->_model->get_username($username);

			if(strtolower($check[0]->username) == strtolower($username)) {
				$id = $check[0]->id;
				$hash = Password::password_hash($newPassword, PASSWORD_BCRYPT);
				$postdata = array('password' => $hash);
                                $where = array('id' => $id);
			}

			if(strtolower($check[0]->username) !== strtolower($username)) {
				$error[8] = 'No such user - check your registration email for details';
			}

// === send email confirmation === //
			if(!isset($error)) {
				$this->_model->update_user($postdata,$where);
				$to = $email;
                                $subject = 'Bill It Mate - Password Updated';
                                $message = '<html><body>';

                                $message .='<table cellspacing="4" cellpadding="4" border="0" bgcolor="#ffffff" align="center">';

                                        $message .='<tr>';
                                                $message .='<td>';
                                                        $message .='<img src="http://www.bill-it-mate.com/images/logo.png" alt="Bill It Mate" />';
                                                $message .='</td>';
                                        $message .='</tr>';

                                        $message .='<tr>';
                                                $message .='<td>';
                                                        $message .= '<h2>Your Password Has Been Updated.</h2>';
                                                        $message .= '<h3>Important.</h3>';
                                                        $message .='Just click the link to login and use the password you just set <br>' .DIR. "login";
							$message .= '<p>Keep this e-mail safe!</p>';
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
		$data['title'] = 'Forgot Password';

		$this->_view->rendertemplate('header',$data);
		$this->_view->render('register/forgotPassword',$data,$error);
		$this->_view->rendertemplate('footer',$data);
	}

}//end of controller
