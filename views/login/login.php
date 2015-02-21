<div id='wrapper'>
<div id="content">
	<h1>Bill It Mate - Login</h1>
  <div class="login_form">
<h3>! Currently enabled for testing only !</h3>

    <form action='' method='post'>
      <h4>Username</h4><div class="required">*</div>
	<input id='username' type='text' name='username' value='<?php if(isset($error)){echo $_POST['username'];}?>' onclick='selectAll(id)'>

      <h4>Password</h4><div class="required">*</div>
	<input id='password' type='password' name='password' value='' onclick='selectAll(id)'>


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



      <div class="login_button"><input type='submit' name="submit" value='Login'></div>

	<?php
	// === wrong username and password ===//
	if(isset($error[13])) {
		echo "<div class='error'>" .$error[13] . "</div>";
	}
	if(isset($error[14])) {
		echo "<div class='error'>" .$error[14] . "</div>";
	}
	if(isset($error[11])) {
		echo "<div class='error'>" .$error[11] . "</div>";
	}
	if(isset($error[12])) {
		echo "<div class='error'>" .$error[12] . "</div>";
	}
	if(isset($error[15])) {
		echo "<div class='error'>" .$error[15] . "</div>";
	}
	// === end the validation of the login form
	?>


      <h5><div class="required">*</div>Required fields</h5>
    </form>
  </div>
</div>
</div>
