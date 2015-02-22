<?php
        // === For admin/dashboard - Start a new ticket === //
        // === @author James - Responsive Developer === //
?>

<div id="wrapper_dashboard">
  <div id="content_dashboard">
      <div id="sidebar_dashboard">
	 <?php include_once "dashboardNav.php";?>
      </div>
      <div id="main_dashboard_output">

	<div class="ticketDetails">
	<form action="" method="post">
		<h6>Ticket Project Name</h6><div class="required">*</div>
<!--		<input id='ticketProjectName' type='text' name='ticketprojectname' value='<?php if(isset($error)){echo $_POST['ticketprojectname'];}?>' onclick='selectAll(id)'>
-->
		<?php
                if(isset($data['allProjects'])) {
                        echo "<select id='ticketProjectName' type='text' name='ticketprojectname' value='Select Project'>";

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
		<h6>Ticket Name</h6><div class="required">*</div>
		<input id='ticketName' type='text' name='ticketname' value='<?php if(isset($error)){echo $_POST['ticketname'];}?>' onclick='selectAll(id)'>
		<?php
        		if(isset($error[31])) {
                		echo "<div class='error'>" .$error[31] . "</div>";
        		}
		?>
		<h6>Ticket description</h6><div class="required">*</div>
		<textarea id='ticketDescription' type='text' name='ticketdescription' value='<?php if(isset($error)){echo $_POST['ticketdescription'];}?>' onclick='selectAll(id)'></textarea>
		<?php
		        if(isset($error[32])) {
        	        	echo "<div class='error'>" .$error[32] . "</div>";
        		}
		?>
		<h6>TicketStart Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='ticketStartDate' type='text' name='ticketstartdate' value='<?php if(isset($error)){echo $_POST['ticketstartdate'];}?>' onclick='selectAll(id)'>
		<?php
	        	if(isset($error[33])) {
	                	echo "<div class='error'>" .$error[33] . "</div>";
		        }
		?>
		<h6>Ticket Completion Date ( 2014-06-12 "year-day-month")</h6><div class="required">*</div>
		<input id='ticketCompletionDate' type='text' name='ticketcompletiondate' value='<?php if(isset($error)){echo $_POST['ticketcompletiondate'];}?>' onclick='selectAll(id)'>
		<?php
	        	if(isset($error[34])) {
                		echo "<div class='error'>" .$error[34] . "</div>";
		        }
		?>
		<h6>Ticket Time estimate (In hours)</h6><div class="required">*</div>
		<input id='ticketTimeEstimate' type='text' name='tickettimeestimate' value='<?php if(isset($error)){echo $_POST['tickettimeestimate'];}?>' onclick='selectAll(id)'>
		<?php
		        if(isset($error[35])) {
                		echo "<div class='error'>" .$error[35] . "</div>";
        		}
		?>
		<h6>Ticket Percent Complete (0% to 100%)</h6><div class="required">*</div>
		<input id='ticketPercentComplete' type='text' name='ticketpercentcomplete' value='<?php if(isset($error)){echo $_POST['ticketpercentcomplete'];}?>' onclick='selectAll(id)'>
		<?php
        		if(isset($error[36])) {
                		echo "<div class='error'>" .$error[36] . "</div>";
        		}
		?>

		<div class="login_button"><input type='submit' name="submit" value='Start Ticket'></div>
	</form>
	<?php
                if($data['success'] == true){
                        echo "<div class='success'>Ticket Added</div>";
                }
        ?>

	</div><!-- end ticket Details -->
      </div><!-- dashboard output -->
  </div>
</div>


<div id="toggle" onclick="toggleMessenger()"><p>M</p></div>
<?php include_once "messenger.php";?>
