<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>
      <div id="main_dashboard_output">
	<div class="bugDetails">
	<form action='' method='post'>

		<?php
		foreach($data['selectedBug'] as $row) {

			$projectName = $row -> bug_project_name;
			$bugName = $row -> bug_title;
			$bugDescription = $row -> bug_description;
			$bugStartDate = $row -> bug_start_date;
			$bugCompletionDate = $row -> bug_end_date;
			$bugTimeEstimate = $row -> bug_time_estimate;
			$bugPercentComplete = $row -> bug_percent_complete;
		}
		?>
		<h6>Bug Project Name</h6><div class="required">*</div>
		<input id='bugProjectName' type='text' name='bugprojectname' value='<?php echo $projectName;?>'>
		<?php
        		if(isset($error[30])) {
                		echo "<div class='error'>" .$error[30] . "</div>";
        		}
		?>
		<h6>Bug Name</h6><div class="required">*</div>
		<input id='bugName' type='text' name='bugname' value='<?php echo $bugName;?>'>
		<?php
        		if(isset($error[31])) {
                		echo "<div class='error'>" .$error[31] . "</div>";
        		}
		?>
		<h6>Bug description</h6><div class="required">*</div>
		<textarea id='bugDescription' type='text' name='bugdescription'><?php echo $bugDescription;?></textarea>
		<?php
		        if(isset($error[32])) {
        	        	echo "<div class='error'>" .$error[32] . "</div>";
        		}
		?>
		<h6>Bug Start Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='bugStartDate' type='text' name='bugstartdate' value='<?php echo $bugStartDate;?>'>
		<?php
	        	if(isset($error[33])) {
	                	echo "<div class='error'>" .$error[33] . "</div>";
		        }
		?>
		<h6>Bug Completion Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='bugCompletionDate' type='text' name='bugcompletiondate' value='<?php echo $bugCompletionDate;?>' onclick='selectAll(id)'>
		<?php
	        	if(isset($error[34])) {
                		echo "<div class='error'>" .$error[34] . "</div>";
		        }
		?>
		<h6>Bug Time estimate (In hours)</h6><div class="required">*</div>
		<input id='bugTimeEstimate' type='text' name='bugtimeestimate' value='<?php echo $bugTimeEstimate;?>' onclick='selectAll(id)'>
		<?php
		        if(isset($error[35])) {
                		echo "<div class='error'>" .$error[35] . "</div>";
        		}
		?>
		<h6>Bug Percent Complete (0% to 100%)</h6><div class="required">*</div>
		<input id='bugPercentComplete' type='text' name='bugpercentcomplete' value='<?php echo $bugPercentComplete;?>' onclick='selectAll(id)'>
		<?php
        		if(isset($error[36])) {
                		echo "<div class='error'>" .$error[36] . "</div>";
        		}
		?>
		<div class="login_button"><input type='submit' name="submit" value='Update Bug'></div>
	</form>
	<?php
                if($data['success'] == true){
                        echo "<div class='success'>Bug Updated</div>";
                }
        ?>
	</div><!-- end bug Details -->
      </div><!-- dashboard output -->
  </div>
</div>

<div id="toggle" onclick="toggleMessenger()"><p>M</p></div>
<?php include_once "messenger.php";?>
