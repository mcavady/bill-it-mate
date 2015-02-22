<?php
        // === For admin/dashboard - Ticket List === //
        // === @author James - Responsive Developer === //
?>

<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>
      <div id="main_dashboard_output">
	<div class="table">
	<div class="table-header-tickets">
		<div class="table-header-ticketId"><h6>Ticket ID</h6></div>
		<div class="table-header-ticketProject"><h6>Ticket Project</h6></div>
		<div class="table-header-ticketStartDate"><h6>Ticket Start Date</h6></div>
		<div class="table-header-ticketFinishDate"><h6>Ticket Finish Date</h6></div>
		<div class="table-header-ticketTitle"><h6>Ticket Title</h6></div>
		<div class="table-header-ticketDescription"><h6>Ticket Description</h6></div>
		<div class="table-header-ticketWorkerId"><h6>Ticket Worker ID</h6></div>
		<div class="table-header-ticketTimeEstimate"><h6>Time estimate</h6></div>
		<div class="table-header-ticketTimeRemaining"><h6>Time remaining</h6></div>
		<div class="table-header-ticketPercentComplete"><h6>Percent Complete</h6></div>
	</div>
	<?php
		if(isset($data['allTickets'])) {
			foreach($data['allTickets'] as $row) {
				// if they are logged in get the id from the cookie and display the tickets they are assigned
	                        if(Session::get('loggedin') == true) { //only do this if they are loggen in if not redirect to login
		                        $worker = Session::get('id');
					// === match the worker ID from the session with the tickets array and display tickets for the user that is logged in === //
					if($row->ticket_worker_id == $worker){
					echo "<div class='table-row-tickets'>";
						echo "<div class='table-content-ticketId'><p>" . $row->ticket_id . "</p></div> ";
						echo "<div class='table-content-ticketProject'><p>" . $row->ticket_project_name . "</p></div> ";
						echo "<div class='table-content-ticketStartDate'><p>" . $row->ticket_start_date . "</p></div> ";
						echo "<div class='table-content-ticketFinishDate'><p>" . $row->ticket_finish_date . "</p></div> ";
						echo "<div class='table-content-ticketTitle'><p>" . $row->ticket_title . "</p></div> ";
						echo "<div class='table-content-ticketDescription'><p>" . $row->ticket_description . "</p></div> ";
						echo "<div class='table-content-ticketWorkerId'><p>" . $row->ticket_worker_id . "</p></div> ";
						echo "<div class='table-content-ticketTimeEstimate'><p>" . $row->ticket_time_estimate . "</p></div> ";
						echo "<div class='table-content-ticketTimeRemaining'><p>" . $row->ticket_time_remaining . "</p></div> ";
						if($row->ticket_percent_complete <= 25) {
                        	                        $color = "#ff00ff";
	                                        }
        	                                if($row->ticket_percent_complete >= 26 ) {
       	        	                                 $color = "#00ffff";
                                	        }
                                        	if($row->ticket_percent_complete >= 50 ) {
                                                	$color = "#ccffff";
                                        	}
                                        	if($row->ticket_percent_complete >= 75 ) {
                                                	$color = "#00ff00";
                                        	}
                                        	if($row->ticket_percent_complete == 0 ) {
                                                	$color = "transparent";
                                        	}

						echo "<div class='table-content-meter'><div class='bar' style='width:" . $row->ticket_percent_complete . "%; background:$color'></div>" . $row->ticket_percent_complete ."%</div>";
						echo "<div class='table-content-button-holder'><form method='post' class='table-content-buttons-form'>";

                                  echo "<div class='table-content-edit-button'>Edit ticket<input type='submit' name='edit' value=" . $row->ticket_id . "></div> ";

                                  echo "<div class='table-content-delete-button'>Delete ticket<input type='submit' name='delete' value=". $row->ticket_id . " ></div> ";

					echo "</form></div>";
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
<?php require_once "messenger.php";?>

