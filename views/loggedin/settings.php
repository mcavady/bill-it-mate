<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>
      <div id="main_dashboard_output">
	<p> Not currently available </p>
	<?php
	//$worker = Session::get('id');
	// === use these to delete the user account or edit account details === //
	//echo "<form method='post'>";
	//echo "<p>delete My account</p><input type='submit' name='delete' value='" . $worker . "' >";
        //echo "<p>Update my account</p><input type='submit' name='update' value='Update account' >";
        //echo "</form>";
	?>
      </div><!-- dashboard output -->
  </div>
</div>


<div id="toggle" onclick="toggleMessenger()"><p>M</p></div>
<?php include_once "messenger.php";?>

