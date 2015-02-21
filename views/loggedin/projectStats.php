<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>

      <div id="main_dashboard_output">
	<div class="table">
	<div class="table-header-stats">
		<div class="table-header-project-company"><h6>Company</h6></div>
		<div class="table-header-project-id"><h6>Project ID</h6></div>
		<div class="table-header-project-name"><h6>Project Name</h6></div>
		<div class="table-header-project-description"><h6>Project Description</h6></div>
		<div class="table-header-project-deliverables"><h6>Project Deliverables Count (tickets)</h6></div>
		<div class="table-header-project-percentComplete"><h6>Overall % Complete</h6></div>
	</div>
	<?php
	if(isset($data['allProjectStats'])) {
		foreach($data['allProjectStats'] as $row) {
			// if they are logged in get the id from the cookie and display the jobs they are assigned
                        if(Session::get('loggedin') == true) { //only do this if they are loggen in if not redirect to login
	                        $worker = Session::get('id');
				// === match the worker ID from the session with the allJobs array and display jobs for the user that is logged in === //
				if($row->project_worker == $worker){
				echo "<div class='table-row-stats'>";
					echo "<div class='table-content-company'><p>" . $row->project_company . "</p></div> ";
					echo "<div class='table-content-id'><p>" . $row->project_id . "</p></div> ";
					echo "<div class='table-content-project'><p>" . $row->project_name . "</p></div> ";
					echo "<div class='table-content-project-description'><p>" . $row->project_description . "</p></div> ";
					echo "<div class='table-content-item'><p>" . $row->project_item . "</p></div> ";
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

	</div><!-- end table -->
      </div><!-- dashboard output -->
  </div>
</div>


<div id="toggle" onclick="toggleMessenger()"><p>M</p></div>
<?php include_once "messenger.php";?>

