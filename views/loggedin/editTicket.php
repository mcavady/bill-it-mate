<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>
      <div id="main_dashboard_output">
	<div class="ticketDetails">
	<form action='' method='post'>

		<?php
		foreach($data['selectedTicket'] as $row) {

			$projectName = $row -> ticket_project_name;
			$ticketName = $row -> ticket_title;
			$ticketDescription = $row -> ticket_description;
			$ticketStartDate = $row -> ticket_start_date;
			$ticketCompletionDate = $row -> ticket_finish_date;
			$ticketTimeEstimate = $row -> ticket_time_estimate;
			$ticketPercentComplete = $row -> ticket_percent_complete;
		}
		?>
		<h6>Ticket Project Name</h6><div class="required">*</div>
		<input id='ticketProjectName' type='text' name='ticketprojectname' value='<?php echo $projectName;?>'>
		<?php
        		if(isset($error[30])) {
                		echo "<div class='error'>" .$error[30] . "</div>";
        		}
		?>
		<h6>Ticket Name</h6><div class="required">*</div>
		<input id='ticketName' type='text' name='ticketname' value='<?php echo $ticketName;?>'>
		<?php
        		if(isset($error[31])) {
                		echo "<div class='error'>" .$error[31] . "</div>";
        		}
		?>
		<h6>Ticket description</h6><div class="required">*</div>
		<textarea id='ticketDescription' type='text' name='ticketdescription'><?php echo $ticketDescription;?></textarea>
		<?php
		        if(isset($error[32])) {
        	        	echo "<div class='error'>" .$error[32] . "</div>";
        		}
		?>
		<h6>TicketStart Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='ticketStartDate' type='text' name='ticketstartdate' value='<?php echo $ticketStartDate;?>'>
		<?php
	        	if(isset($error[33])) {
	                	echo "<div class='error'>" .$error[33] . "</div>";
		        }
		?>
		<h6>Ticket Completion Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='ticketCompletionDate' type='text' name='ticketcompletiondate' value='<?php echo $ticketCompletionDate;?>' onclick='selectAll(id)'>
		<?php
	        	if(isset($error[34])) {
                		echo "<div class='error'>" .$error[34] . "</div>";
		        }
		?>
		<h6>Ticket Time estimate (In hours)</h6><div class="required">*</div>
		<input id='ticketTimeEstimate' type='text' name='tickettimeestimate' value='<?php echo $ticketTimeEstimate;?>' onclick='selectAll(id)'>
		<?php
		        if(isset($error[35])) {
                		echo "<div class='error'>" .$error[35] . "</div>";
        		}
		?>
		<h6>Ticket Percent Complete (0% to 100%)</h6><div class="required">*</div>
		<input id='ticketPercentComplete' type='text' name='ticketpercentcomplete' value='<?php echo $ticketPercentComplete;?>' onclick='selectAll(id)'>
		<?php
        		if(isset($error[36])) {
                		echo "<div class='error'>" .$error[36] . "</div>";
        		}
		?>
		<div class="login_button"><input type='submit' name="submit" value='Update Ticket'></div>
	</form>
	<?php
                if($data['success'] == true){
                        echo "<div class='success'>Ticket Updated</div>";
                }
        ?>
	</div><!-- end ticket Details -->
      </div><!-- dashboard output -->
  </div>
</div>

<div id="toggle" onclick="toggleMessenger()"><p>M</p></div>
<?php include_once "messenger.php";?>
