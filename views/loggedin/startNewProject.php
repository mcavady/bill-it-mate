<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>
      <div id="main_dashboard_output">

	<div class="projectDetails">
	<form action="" method="post">
		<h6>Project Comapany Name</h6><div class="required">*</div>
		<input id='projectCompany' type='text' name='projectcompany' value='<?php if(isset($error)){echo $_POST['projectcompany'];}?>' onclick='selectAll(id)'>
		<?php
        		if(isset($error[20])) {
                		echo "<div class='error'>" .$error[20] . "</div>";
        		}
		?>
		<h6>Project Name</h6><div class="required">*</div>
		<input id='projectName' type='text' name='projectname' value='<?php if(isset($error)){echo $_POST['projectname'];}?>' onclick='selectAll(id)'>
		<?php
        		if(isset($error[21])) {
                		echo "<div class='error'>" .$error[21] . "</div>";
        		}
		?>
		<h6>Project description</h6><div class="required">*</div>
		<textarea id='projectDescription' type='text' name='projectdescription' value='<?php if(isset($error)){echo $_POST['projectdescription'];}?>' onclick='selectAll(id)'></textarea>
		<?php
		        if(isset($error[22])) {
        	        	echo "<div class='error'>" .$error[22] . "</div>";
        		}
		?>
		<h6>Project Start Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='projectStartDate' type='text' name='projectstartdate' value='<?php if(isset($error)){echo $_POST['projectstartdate'];}?>' onclick='selectAll(id)'>
		<?php
	        	if(isset($error[23])) {
	                	echo "<div class='error'>" .$error[23] . "</div>";
		        }
		?>
		<h6>Project Completion Date ( 2014-06-12 "year/-day-month")</h6><div class="required">*</div>
		<input id='projectCompletionDate' type='text' name='projectcompletiondate' value='<?php if(isset($error)){echo $_POST['projectcompletiondate'];}?>' onclick='selectAll(id)'>
		<?php
	        	if(isset($error[24])) {
                		echo "<div class='error'>" .$error[24] . "</div>";
		        }
		?>
		<h6>Project Time estimate (In hours)</h6><div class="required">*</div>
		<input id='projectTimeEstimate' type='text' name='projecttimeestimate' value='<?php if(isset($error)){echo $_POST['projecttimeestimate'];}?>' onclick='selectAll(id)'>
		<?php
		        if(isset($error[25])) {
                		echo "<div class='error'>" .$error[25] . "</div>";
        		}
		?>
		<h6>Project Percent Complete (0% to 100%)</h6><div class="required">*</div>
		<input id='projectPercentComplete' type='text' name='projectpercentcomplete' value='<?php if(isset($error)){echo $_POST['projectpercentcomplete'];}?>' onclick='selectAll(id)'>
		<?php
        		if(isset($error[26])) {
                		echo "<div class='error'>" .$error[26] . "</div>";
        		}
		?>

		<div class="login_button"><input type='submit' name="submit" value='Start Project'></div>
	</form>

	<?php
                if($data['success'] == true){
                	echo "<div class='success'>Project Added</div>";
                }
        ?>

	</div><!-- end job dtails -->
      </div><!-- dashboard output -->
  </div>
</div>


<div id="toggle" onclick="toggleMessenger()"><p>M</p></div>
<?php include_once "messenger.php";?>

