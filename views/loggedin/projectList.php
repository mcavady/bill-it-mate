<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>

      <div id="main_dashboard_output">
	<div class="table">
	<div class="table-header-projects">
		<div class="table-header-project-company"><h6>Company</h6></div>
		<div class="table-header-project-id"><h6>Project ID</h6></div>
		<div class="table-header-project-name"><h6>Project Name</h6></div>
		<div class="table-header-project-startDate"><h6>Start Date</h6></div>
		<div class="table-header-project-completionDate"><h6>Completion Date</h6></div>

		<div class="table-header-project-deliverables"><h6>Project Deliverables Count (Tickets)</h6></div>
		<div class="table-header-project-deliverables"><h6>Project Deliverables Time estimate(hours)</h6></div>

		<div class="table-header-bug-count"><h6>Bug count</h6></div>
		<div class="table-header-bugTimeEstimate"><h6>Bug Time Estimate (hours)</h6></div>
		<div class="table-header-percentComplete"><h6>% Complete</h6></div>
	</div>
	<?php
		if(isset($data['allProjects'])) {
			foreach($data['allProjects'] as $row) {
				// if they are logged in get the id from the cookie and display the jobs they are assigned
	                        if(Session::get('loggedin') == true) { //only do this if they are loggen in if not redirect to login
		                        $worker = Session::get('id');
					// === match the worker ID from the session with the allJobs array and display jobs for the user that is logged in === //
					if($row->project_worker == $worker){
					echo "<div class='table-row-projects'>";
						echo "<div class='table-content-company' ><p>" . $row->project_company . "</p></div> ";
						echo "<div class='table-content-id'><p>" . $row->project_id . "</p></div> ";
						echo "<div class='table-content-project'><p>" . $row->project_name . "</p></div> ";
						echo "<div class='table-content-startDate'><p>" . $row->project_startdate . "</p></div> ";
						echo "<div class='table-content-completionDate'><p>" . $row->project_completion_date . "</p></div> ";

						echo "<div class='table-content-deliverables'><p>" . $row->project_tickets_count . "</p></div> ";
						echo "<div class='table-content-deliverables'><p>" . $row->project_tickets_time_estimate . "</p></div> ";

						echo "<div class='table-content-bugCount'><p>" . $row->project_bugs . "</p></div> ";
						echo "<div class='table-content-bugCount'><p>" . $row->project_bugtimeestimate . "</p></div> ";

			//echo "<div class='table-content-button-holder'>";
			echo "<div class='table-content-button-holder'><form method='post' class='table-content-buttons-form'>";
		echo "<div class='table-content-button-holder'><form method='post' class='table-content-buttons-form'>";
                echo "<div class='table-content-edit-button'>Edit Project<input type='submit' name='edit' value=" . $row->project_id . "></div> ";
                echo "<div class='table-content-delete-button'>Delete Project<input type='submit' name='delete' value=". $row->project_id . " ></div> ";
                echo "</form></div>";



//			echo "<div class='table-content-button-holder'>";
//			echo "<div class='table-content-button-holder'><form method='post' class='table-content-buttons-form'>";
//			echo "<div class='table-content-edit-button'><input type='submit' name='edit' value='edit' ></div> ";
//			echo "<div class='table-content-edit-button'>Delete Project<input type='submit' name='delete' value=" .$row->project_id." ></div> ";
//			echo "<div class='table-content-delete-button'>Delete Project<input type='submit' name='delete' value=" .$row->project_id." ></div> ";
//			echo "</form></div>";
						echo "</div>";
						if($row->project_percent_complete <= 25) {
                                                $color = "#ff00ff";
	                                        }
        	                                if($row->project_percent_complete >= 26 ) {
                	                                $color = "#00ffff";
                        	                }
                                	        if($row->project_percent_complete >= 50 ) {
                                	                $color = "#ccffff";
                                        	}
                                        	if($row->project_percent_complete >= 75 ) {
                                                	$color = "#00ff00";
                                        	}
                                        	if($row->project_percent_complete == 0 ) {
                                                	$color = "transparent";
                                        	}
					echo "<div class='table-content-meter'><div class='bar' style='width:" . $row->project_percent_complete . "%; background:$color'></div>" . $row->project_percent_complete ."%</div>";
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

