<?php
        // === For admin/dashboard - Start New Bug === //
        // === @author James - Responsive Developer === //
?>

<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>
      <div id="main_dashboard_output">

	<div class="bugDetails">
	<form action="" method="post">
		<h6>Bug Project Name</h6><div class="required">*</div><!--
		<input id='bugProjectName' type='text' name='bugprojectname' value='<?php if(isset($error)){echo $_POST['bugprojectname'];}?>' onclick='selectAll(id)'>
		-->
		<?php
		if(isset($data['allProjects'])) {
			echo "<select id='bugProjectName' type='text' name='bugprojectname' value='Select Project'>";

                        foreach($data['allProjects'] as $row) {
                                if(Session::get('loggedin') == true) { //only do this if they are loggen in if not redirect to login
                                        $worker = Session::get('id');
                                        if($row->project_worker == $worker){
					echo "<option>" . $row->project_company . "</option>";
					}
				}
			}

			echo "</select>";
		}
		?>

		<?php
        		if(isset($error[30])) {
                		echo "<div class='error'>" .$error[30] . "</div>";
        		}
		?>
		<h6>Bug Name</h6><div class="required">*</div>
		<input id='bugName' type='text' name='bugname' value='<?php if(isset($error)){echo $_POST['bugname'];}?>' onclick='selectAll(id)'>
		<?php
        		if(isset($error[31])) {
                		echo "<div class='error'>" .$error[31] . "</div>";
        		}
		?>
		<h6>Bug description</h6><div class="required">*</div>
		<textarea id='bugDescription' type='text' name='bugdescription' value='<?php if(isset($error)){echo $_POST['bugdescription'];}?>' onclick='selectAll(id)'></textarea>
		<?php
		        if(isset($error[32])) {
        	        	echo "<div class='error'>" .$error[32] . "</div>";
        		}
		?>
		<h6>Bug Start Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='bugStartDate' type='text' name='bugstartdate' value='<?php if(isset($error)){echo $_POST['bugstartdate'];}?>' onclick='selectAll(id)'>
		<?php
	        	if(isset($error[33])) {
	                	echo "<div class='error'>" .$error[33] . "</div>";
		        }
		?>
		<h6>Bug Completion Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='bugCompletionDate' type='text' name='bugcompletiondate' value='<?php if(isset($error)){echo $_POST['bugcompletiondate'];}?>' onclick='selectAll(id)'>
		<?php
	        	if(isset($error[34])) {
                		echo "<div class='error'>" .$error[34] . "</div>";
		        }
		?>
		<h6>Bug Time estimate (In hours)</h6><div class="required">*</div>
		<input id='bugTimeEstimate' type='text' name='bugtimeestimate' value='<?php if(isset($error)){echo $_POST['bugtimeestimate'];}?>' onclick='selectAll(id)'>
		<?php
		        if(isset($error[35])) {
                		echo "<div class='error'>" .$error[35] . "</div>";
        		}
		?>
		<h6>Bug Percent Complete (0% to 100%)</h6><div class="required">*</div>
		<input id='bugPercentComplete' type='text' name='bugpercentcomplete' value='<?php if(isset($error)){echo $_POST['bugpercentcomplete'];}?>' onclick='selectAll(id)'>
		<?php
        		if(isset($error[36])) {
                		echo "<div class='error'>" .$error[36] . "</div>";
        		}
		?>

		<div class="login_button"><input type='submit' name="submit" value='Start Bug'></div>
	</form>
	<?php
                if($data['success'] == true){
                        echo "<div class='success'>Bug Added</div>";
                }
        ?>
	</div><!-- end bug Details -->
      </div><!-- dashboard output -->
  </div>
</div>


<div id="toggle" onclick="toggleMessenger()"><p>M</p></div>
<?php include_once "messenger.php";?>

