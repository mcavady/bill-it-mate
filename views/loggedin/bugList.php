<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>
      <div id="main_dashboard_output">
	<div class="table">
	<div class="table-header-bugs">
		<div class="table-header-bug-id" ><h6>Bug ID</h6></div>
		<div class="table-header-project-id" ><h6>Project ID</h6></div>
		<div class="table-header-bug-start-date" ><h6>Bug Start Date</h6></div>
		<div class="table-header-bug-completion-date" ><h6>Bugs End Date</h6></div>
		<div class="table-header-bug-title" ><h6>Bug Title</h6></div>
		<div class="table-header-bug-description" ><h6>Bug Description</h6></div>
		<div class="table-header-bug-job-worker" ><h6>Job Worker</h6></div><!-- remove this for production -->
		<div class="table-header-bug-attachments" ><h6>Bug Attachments</h6></div>
		<div class="table-header-bug-time-estimate" ><h6>Bug Time Estimate (hours)</h6></div>
		<div class="table-header-bug-time-remaining" ><h6>Bug Time Remaining (hours)</h6></div>
		<div class="table-header-bug-percent-complete" ><h6>Percent Complete</h6></div>
	</div>
	<?php
		if(isset($data['allBugs'])) {
			foreach($data['allBugs'] as $row) {
				// if they are logged in get the id from the cookie and display the jobs they are assigned
	                        if(Session::get('loggedin') == true) { //only do this if they are loggen in if not redirect to login
		                        $worker = Session::get('id');
					// === match the worker ID from the session with the allJobs array and display jobs for the user that is logged in === //
					if($row->bug_worker_id == $worker){
					echo "<div class='table-row-bugs'>";
						echo "<div class='table-content-bug-id'><p>" . $row->bug_id . "</p></div> ";
						echo "<div class='table-content-bug-project-id'><p>" . $row->bug_project_id . "</p></div> ";
						echo "<div class='table-content-bug-start-date'><p>" . $row->bug_start_date . "</p></div> ";
						echo "<div class='table-content-bug-end-date'><p>" . $row->bug_end_date . "</p></div> ";
						echo "<div class='table-content-bug-title'><p>" . $row->bug_title . "</p></div> ";
						echo "<div class='table-content-bug-description'><p>" . $row->bug_description . "</p></div> ";
						echo "<div class='table-content-bug-worker-id'><p>" . $row->bug_worker_id . "</p></div> ";
						echo "<div class='table-content-bug-attachments'><p>" . $row->bug_attachments . "</p></div> ";
						echo "<div class='table-content-button-holder'><form method='post' class='table-content-buttons-form'>";
                        echo "<div class='table-content-edit-button'>Edit Bug<input type='submit' name='edit' value=" .$row->bug_id. "></div> ";
			echo "<div class='table-content-delete-button'>Delete Bug<input type='submit' name='delete' value=" .$row->bug_id. "></div>";
                                                echo "</div></form>";

						echo "<div class='table-content-bug-percent-complete'><p>" . $row->bug_time_estimate . "</p></div> ";
						echo "<div class='table-content-bug-time-remaining'><p>" . $row->bug_time_remaining . " </p></div> ";
						if($row->bug_percent_complete <= 25) {
                        	                        $color = "#ff00ff";
	                                        }
        	                                if($row->bug_percent_complete >= 26 ) {
       	        	                                 $color = "#00ffff";
                                	        }
                                        	if($row->bug_percent_complete >= 50 ) {
                                                	$color = "#ccffff";
                                        	}
                                        	if($row->bug_percent_complete >= 75 ) {
                                                	$color = "#00ff00";
                                        	}
                                        	if($row->bug_percent_complete == 0 ) {
                                                	$color = "transparent";
                                        	}

	echo "<div class='table-content-meter'><div class='bar' style='width:" . $row->bug_percent_complete . "%; background:$color'></div>" . $row->bug_percent_complete ."%</div>";
					echo "</div>";
					}
				} else {
					Url::redirect('login');
				}
			}
                }
	?>

	</div>
      </div><!-- dashboard output -->
  </div>
</div>

<div id="toggle" onclick="toggleMessenger()"><p>M</p></div>
<?php include_once "messenger.php";?>
