<?php
	// === For editing the project === //
	// === @author James - Responsive Developer === //
?>

<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>
      <div id="main_dashboard_output">
	<div class="projectDetails">
	<form action='' method='post'>

		<?php
		foreach($data['selectedProject'] as $row) {

			$projectName = $row -> project_name;
			$projectDescription = $row -> project_description;
			$projectStartDate = $row -> project_startdate;
			$projectCompletionDate = $row -> project_completion_date;
			$projectTimeEstimate = $row -> project_time_estimate;
			$projectPercentComplete = $row -> project_percent_complete;
		}
		?>
		<h6>Project Name</h6><div class="required">*</div>
		<input id='projectName' type='text' name='projectname' value='<?php echo $projectName;?>'>
		<?php
        		if(isset($error[30])) {
                		echo "<div class='error'>" .$error[30] . "</div>";
        		}
		?>
		<h6>Project description</h6><div class="required">*</div>
		<textarea id='projectDescription' type='text' name='projectdescription'><?php echo $projectDescription;?></textarea>
		<?php
		        if(isset($error[32])) {
        	        	echo "<div class='error'>" .$error[32] . "</div>";
        		}
		?>
		<h6>Project Start Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='projectStartDate' type='text' name='projectstartdate' value='<?php echo $projectStartDate;?>'>
		<?php
	        	if(isset($error[33])) {
	                	echo "<div class='error'>" .$error[33] . "</div>";
		        }
		?>
		<h6>Project Completion Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='projectCompletionDate' type='text' name='projectcompletiondate' value='<?php echo $projectCompletionDate;?>' onclick='selectAll(id)'>
		<?php
	        	if(isset($error[34])) {
                		echo "<div class='error'>" .$error[34] . "</div>";
		        }
		?>
		<h6>Project Time estimate (In hours)</h6><div class="required">*</div>
		<input id='projectTimeEstimate' type='number' name='projecttimeestimate' value='<?php echo $projectTimeEstimate;?>' onclick='selectAll(id)'>
		<?php
		        if(isset($error[35])) {
                		echo "<div class='error'>" .$error[35] . "</div>";
        		}
		?>
		<h6>Project Percent Complete (0% to 100%)</h6><div class="required">*</div>
		<input id='projectPercentComplete' type='text' name='projectpercentcomplete' value='<?php echo $projectPercentComplete;?>' onclick='selectAll(id)'>
		<?php
        		if(isset($error[36])) {
                		echo "<div class='error'>" .$error[36] . "</div>";
        		}
		?>
		<div class="login_button"><input type='submit' name="submit" value='Update Project'></div>
	</form>
	<?php
                if($data['success'] == true){
                        echo "<div class='success'>Project Updated</div>";
                }
        ?>
	</div><!-- end bug Details -->
      </div><!-- dashboard output -->
  </div>
</div>
<div id="toggle" onclick="toggleMessenger()"><p>M</p></div>
<?php include_once "messenger.php";?>
