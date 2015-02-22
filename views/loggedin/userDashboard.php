<?php
        // === For admin/dashboard - User Dashboard === //
        // === @author James - Responsive Developer === //
?>

<div id="wrapper_dashboard">

  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	<?php include_once "dashboardNav.php";?>
      </div>

      <div id="main_dashboard_output">
	<div class="job_percent_complete_list">
	<h2>Projects</h2>

 	<?php
	if(isset($data['allJobStatsDashboard'])) {
                foreach($data['allJobStatsDashboard'] as $row) {
                        // if they are logged in get the id from the cookie and display the user dashboard they are assigned
                        if(Session::get('loggedin') == true) { //only do this if they are loggedin in if not redirect to login
                                $worker = Session::get('id');
				//stuff to go here
                        } else {
                                Url::redirect('login');
                        }
                }
        }
        ?>

 	<?php
	//=== show tickets data in the quick information box for tickets === //
        if(isset($data['allTicketStatsDashboard'])) {
		$ticketPercent = 0;
		$ticketCounter = 0;
		$ticketTimeTotalHoursLeft = 0;
            foreach($data['allTicketStatsDashboard'] as $rowTickets) {
                if(Session::get('loggedin') == true) {
			$worker = Session::get('id');
			// === count the tickets and work out the percent of them all === //
			if($rowTickets->ticket_worker_id == $worker){
				$ticketCounter = $ticketCounter + 1;
				$ticketPercent = $ticketPercent + ($rowTickets->ticket_percent_complete);
				$ticketTimeTotalHoursLeft = $rowTickets->ticket_time_remaining + $ticketTimeTotalHoursLeft;
				// === work out the ticket percent total === //
				} else {
					$ticketTimeTotal = 0;
				}
				if($rowTickets->ticket_time_estimate >= 1){
					$ticketTimeTotal = $ticketTimeTotal + $rowTickets->ticket_time_estimate;
				} else {
					$bugTimeTotal = 0;
				}
                } else {
                    Url::redirect('login');
                }
            }
        }
    	?>
	</div><!-- end job percent list -->

	<div class="quick_info">
	  <h5>Quick Info Tickets (ALL Projects)</h5>
	  <ul>
		<li>
		<?php
		echo "Total tickets accross all projects : " . $ticketCounter;
		//echo "Total ticket percent : " . $ticketPercent;
		if (!empty($ticketCounter)) {
			$ticketPercentTotal = $ticketPercent / $ticketCounter;
		}
		echo "<p>Percent of all tickets completed</p>";
	        if($rowTickets->ticket_worker_id == $worker){
				if($ticketPercentTotal <= 25) {
					$color = "#ff00ff";
				}
				if($ticketPercentTotal >= 26 ) {
					$color = "#00ffff";
				}
				if($ticketPercentTotal >= 50 ) {
					$color = "#ccffff";
				}
				if($ticketPercentTotal >= 75 ) {
					$color = "#00ff00";
				}
				if($ticketPercentTotal == 0 ) {
					$color = "transparent";
				}
				echo "<div class='meter'><div class='bar' style='width:" . $ticketPercentTotal . "%; background:$color' > <p>". floor($ticketPercentTotal) . "%</p></div>";
				echo "</div>";
			}
		?>
		</li>
	    	<li>
			<p>Totalling an estimated time in hours</p>
			<?php echo $ticketTimeTotal;?>
		</li>
	    	<li>
			<p>Total estimated time remaining (hours)</p>
			<?php echo floor($ticketTimeTotalHoursLeft);?>
		</li>
	  </ul>
	</div>
	<?php
	//=== show bugs data in the quick information box for bugs === //
        if(isset($data['allBugStatsDashboard'])) {
		$bugPercent = 0;
		$bugCounter = 0;
		$bugTimeTotalHoursLeft = 0;
            foreach($data['allBugStatsDashboard'] as $rowBugs) {
                if(Session::get('loggedin') == true) {
                $worker = Session::get('id');
				// === count the tickets and work out the percent of them all === //
				if($rowBugs->bug_worker_id == $worker){
					$bugCounter = $bugCounter + 1;
					$bugPercent = $bugPercent + ($rowBugs->bug_percent_complete);
					$bugTimeTotalHoursLeft = $rowBugs->bug_time_remaining + $bugTimeTotalHoursLeft;
					} else {
					$bugTimeTotal = 0;
					}
					// == check for the event that there is no tickets in the system == //
					if($rowBugs->bug_time_estimate >= 1){
						$bugTimeTotal = $bugTimeTotal + $rowBugs->bug_time_estimate;
						} else {
							$bugTimeTotal = 0;
						}
                } else {
                    Url::redirect('login');
                }
			}
		}
    ?>
	<div class="quick_info">
	  <h5>Quick Info Bugs (ALL Projects)</h5>
	  <ul>
	    <li>
		<?php
			echo "Total bugs across all projects : " . $bugCounter;
		if (!empty($bugCounter)) {
			$bugPercentTotal = $bugPercent / $bugCounter;
		}
			echo "<p>Percent of all bugs completed</p>";
		        if($rowBugs->bug_worker_id == $worker){
				if($bugPercentTotal <= 25) {
					$color = "#ff00ff";
				} if($bugPercentTotal >= 26 ) {
					$color = "#00ffff";
				} if($bugPercentTotal >= 50 ) {
					$color = "#ccffff";
				} if($bugPercentTotal >= 75 ) {
					$color = "#00ff00";
				} if ($bugPercentTotal == 0 ) {
					$color = "transparent";
				}
				echo "<div class='meter'><div class='bar' style='width:" . $bugPercentTotal . "%; background:" . $color. "' > <p>". floor($bugPercentTotal) . "%</p></div>";
				echo "</div>";
			}
		?>
		</li>
	    <li>
			<p>Totalling an estimated time in hours</p>
			<?php echo $bugTimeTotal;?>
		</li>
		<li>
                        <p>Total estimated time remaining (hours)</p>
                        <?php echo floor($bugTimeTotalHoursLeft);?>
                </li>

	  </ul>
	</div>

      </div><!-- dashboard output -->
  </div>
</div>


<div id="toggle" onclick="toggleMessenger()"><p>M</p></div>
<?php include_once "messenger.php";?>
