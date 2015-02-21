<div id='wrapper'>
<div id="content">
	<h1>Bill It Mate - Register</h1>
  <div class="login_form">
	<h3>! Currently enabled for testing only !</h3>
    <form action='' method='post'>
      <h4>Username</h4><div class="required">*</div>
	<input id='username' type='text' name='username' value='<?php if(isset($error)){echo $_POST['username'];}?>' onclick='selectAll(id)'>
	<?php
	if(isset($error[1])) {
		echo "<div class='error'>" .$error[1] . "</div>";
	}
	elseif(isset($error[2])) {
		echo "<div class='error'>" .$error[2] . "</div>";
	}
	?>

      <h4>Email</h4><div class="required">*</div>
	<input id='email' type='text' name='email' value='<?php if(isset($error)){echo $_POST['email'];}?>' onclick='selectAll(id)'>
	<?php
	if(isset($error[3])) {
		echo "<div class='error'>" .$error[3] . "</div>";
	}
	if(isset($error[4])) {
		echo "<div class='error'>" .$error[4] . "</div>";
	}
	?>

      <h4>Password</h4><div class="required">*</div>
	<input id='password' type='password' name='password' value='' onclick='selectAll(id)'>
	<?php
	if(isset($error[5])) {
		echo "<div class='error'>" .$error[5] . "</div>";
	}
	?>

      <h4>Password Confirm</h4><div class="required">*</div>
	<input id='confirmPassword' type='password' name='passwordConfirm' value='' onclick='selectAll(id)'>
	<?php
	if(isset($error[6])) {
		echo "<div class='error'>" .$error[6] . "</div>";
	}
	?>
      <h4>Captcha</h4><div class="required">*</div>
        <div class="capture_image">
                <img src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
        </div>

        <input id='captcha_code' type="text" name="captcha_code" size="10" maxlength="6" />
	<?php
	if(isset($error[7])) {
		echo "<div class='error'>" .$error[7] . "</div>";
	}
	?>

      <div class="login_button"><input type='submit' name="submit" value='Register'></div>
	<?php
		if($data['success'] == true){
        	echo "<h3>Registration Complete</h3>";
        	echo "<p>Check your email for a confirmation e-mail</p>";
    		}
	?>

      <h5><div class="required">*</div>Required fields</h5>
    </form>
  </div>
</div>
</div>
