<ul>
          <li class="NavUser">
		<a href="<?php echo DIR;?>userDashboard" title="Dashboard">
                <div class="helloUser">Hello,<?php if(Session::get('loggedin') == true) { $u = Session::get('username'); echo $u; } else { Url::redirect('login'); } ?></div></a>
          </li>
<!--          <li class="pro-stats" ><a href="<?php echo DIR;?>projectStats" title="Project quick infomation">Project Stats</a></li>-->

          <li class="pro-list" ><a href="<?php echo DIR;?>projectList" title="Project - List of all current projects">Project List</a></li>
          <li class="pro-new" ><a href="<?php echo DIR;?>startNewProject" title="Start New - Project">Start New Project</a></li>

          <li class="pro-tic-list" ><a href="<?php echo DIR;?>ticketList" title="Tickets - All current tickets">Ticket List</a></li>
          <li class="pro-tic-new" ><a href="<?php echo DIR;?>startNewTicket" title="Start New - Ticket">Start New Ticket</a></li>

          <li class="pro-bug-list" ><a href="<?php echo DIR;?>bugList" title="Bug List - All current known bugs">Bug List</a></li>
          <li class="pro-bug-new" ><a href="<?php echo DIR;?>startNewBug" title="Start New - Bug">Start New Bug</a></li>

          <li class="invoices" ><a href="<?php echo DIR;?>invoices" title="Invoices - create and send">Invoices</a></li>

          <li class="settings" ><a href="<?php echo DIR;?>settings" title="Settings - customise your settings">Settings</a></li>
          <li class="logout" ><a href="<?php echo DIR;?>loggedin/logout" title="Logout of bill it mate">Logout</a></li>
</ul>
