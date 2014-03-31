<?php

include('xhr/dbconnect.php');

?>
<!doctype html>  

<!--
	This is the main index of the application
	
	All your script tags should be at the bottom of this file
	
	The only html element in the body is the container div
	Your code should load your page templates into the container
-->

<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>EquineWorld Stable Management</title>
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!--  Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- CSS concatenated and minified via ant build script-->
	<link rel="stylesheet" href="css/style.css">
  	<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
	<link href="css/jquery-ui-1.10.4.custom.css" rel="stylesheet">
	
	
	<!-- end CSS-->
	
</head>

<body class="dashboard">
	<!-- Panel -->
	<div id="toppanel">
		<div id="panel">
			<div class="content clearfix">
				<div class="left">
					<h1>Basic Account Settings</h1>		
					<p class="grey"><a href="updatepassword.html">Update Password</a></p>
					<p class="grey"><a href="updateinfo.html">Update Information</a></p>
					<input name="logOut" type="button" id="logOut" class="bt_login" value="Log Out" >
				</div>
				<div class="left">
					<h1>Stable Settings</h1>
					<p class="grey"><a href="viewstables.html">View Stables</a></p>
					<p class="grey"><a href="addstable.html">Add Stable</a></p>
					<p class="grey"><a href="viewmanagers.html">View Current Managers</a></p>
					<p class="grey"><a href="addmanager.html">Add Manager</a></p>
				</div>
				<div class="left right">			
					
				</div>
			</div>
	</div> <!-- /login -->	

		<!-- The tab on top -->	
		<div class="tab">
			<ul class="login">
				<li class="left">&nbsp;</li>
				<li>Hello Natalya!</li>
				<li class="sep">|</li>
				<li id="toggle">
					<a id="open" class="open" href="#">My Account</a>
					<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
				</li>
				<li class="right">&nbsp;</li>
			</ul> 
		</div> <!-- / top -->
	
	</div> <!--panel -->

	<!-- Parent container for the page, load your core templates into this div -->
	<header>
		<div class="row">
		<div class="logo"><img src="images/logo-color.png" alt="EquineWorld Stable Management" class="logo"></div>
    <div class="clear"></div></div>
	</header>
	<div class="wrapper">
	<nav role="navigation">
		<ul>
			<li><a href="boarders.php">Boarders</a></li>
			<li><a href="feed.html">Feed</a></li>
			<li><a href="training.html">Training</a></li>
			<li><a href="shows.html">Shows</a></li>
			<li><a href="health.html">Health</a></li>
			<li><a href="calendar.html">Calendar</a></li>
		</ul>
		</nav>
        
	        <div class="clear"></div>
	    </div>
		<div class="row">			
			<h1 class="list">Boarders</h1>
			<div class="listAdd">
				  <button class="addbutton" data-toggle="modal" data-target="#myModal">
				    +Add
				  </button>
				</div>
				<?php
			
				// Query the database and get the count
								$result = mysql_query("SELECT * FROM boarders");
								$num_rows = mysql_num_rows($result);
								// Display the results
				
								echo '<p><b>There are '.$num_rows .' total boarders.</b></p>';
				// Number of records to show per page:
				$display = 25;

				// Determine how many pages there are...
				if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
				$pages = $_GET['p'];

				} else { // Need to determine.

				 	// Count the number of records:
					$q = "SELECT COUNT(id) FROM boarders";
					$r = mysql_query ($q) or die(mysql_error());
					$row = mysql_fetch_array ($r);
					$records = $row[0];

				// Calculate the number of pages...
					if ($records > $display) { // More than 1 page.
						$pages = ceil ($records/$display);
					} else {
						$pages = 1;
					}

				} // End of p IF.

				// Determine where in the database to start returning results...
				if (isset($_GET['s']) && is_numeric($_GET['s'])) {
					$start = $_GET['s'];
				} else {
					$start = 0;

				}
						// Make the links to other pages, if necessary.
				if ($pages > 1) {

				// Add some spacing and start a paragraph:
					echo '';

					// Determine what page the script is on:	
					$current_page = ($start/$display) + 1;
					// If it's not the first page, make a Previous button:
					if ($current_page != 1) {
						echo '<a href="boarders.php&s=' . ($start - $display) . '&p=' . $pages . '">Previous </a>';

					}

				// Make all the numbered pages:
					for ($i = 1; $i <= $pages; $i++) {
						if ($i != $current_page) {
							echo '<a href="boarders.php&s=' . (($display * ($i - 1))) . '&p=' . $pages . '">' . $i . ' </a> ';
						} else {
							echo '' . $i . ' </span>';
						}
					} // End of FOR loop.

					// If it's not the last page, make a Next button:

					if ($current_page != $pages) {

						echo '<a href="boarders.php&s=' . ($start + $display) . '&p=' . $pages . '">Next</a>';

					}

	

					echo '<br>'; // Close the paragraph.

	

				} // End of links section.

				// Make the query:

				$q = "SELECT * FROM boarders ORDER BY id ASC LIMIT $start, $display";		

				$r = mysql_query ($q) or die(mysql_error());

				if (mysql_num_rows($r) > 0) { 

				// Table header:

				echo '<table class="records">
				<tr class="records">
					<th class="records">Boarder Name</th>
					<th class="records">Last Payment</th>
					<th class="records">Next Payment</th>
					<th class="records">Status</th>
				</tr>';

				// Fetch and print all the records....

				$bg = '#edf1f2'; // Set the initial background color.

				while ($row = mysql_fetch_array($r)) {

					$bg = ($bg=='#edf1f2' ? '#ffffff' : '#edf1f2'); // Switch the background color.

					echo '<tr class="records" bgcolor="' . $bg . '">
						<td><a href=viewmember.php?id=' . $row['id'] . '>' . $row['projectName'] . '</a></td>
						<td>' . $row['dueDate'] . '</td>
						<td>' . $row['startDate'] . '</td><td>';
							if ($row['status'] == 'paid') {Echo '<img src="images/circle.png"> Paid';}
							else {Echo '<img src="images/circle-red.png"> Overdue';}
							Echo'</td></tr>';

				} // End of WHILE loop.

				echo '</table><br />';}

				else { Echo "<i><center>We currently do not have any boarders.</center></i>";}

				?>
				</div>
		<div class="clear"></div>
		<footer>
			<div class=foot>
				<div class="span8">
					<p>	&copy; 2014 EquineWorld Stable Management</p>
				</div>
				<div class="span4">Share:
				<a href="https://plus.google.com/" target="blank"><img src="images/google.png" height="31" width="31" alt="Google +"></a>
				<a href="https://www.facebook.com/" target="blank"><img src="images/facebook.png" height="31" width="31" alt="Facebook"></a>
				<a href="https://twitter.com/" target="blank"><img src="images/twitter.png" height="31" width="31" alt="Twitter"></a>
				<a href="http://instagram.com/" target="blank"><img src="images/instagram.png" height="31" width="31" alt="Instagram"></a>
						</div>
			</div>
			</footer>
			
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
	  			<h1>Add New Boarder</h1>
	  			<div id="register">
	  				<form id="project">
	  					<p><label class="register">Boarder Name:</label> <input name="projName" type="text" id="projName" class="register"></p>
	  					<p><label class="register">Address:</label> <input name="projDesc" type="text" id="projDesc" class="register"></p>
	  					<p><label class="register">Status:</label> <input name="status" type="text" id="status" class="register"></p>
	  					<p><label class="register">Last Payment:</label> <input name="projDue" type="text" id="projDue" class="datepicker register"></p>
						<p><label class="register">Payment Due:</label> <input name="projStart" type="text" id="projStart" class="datepicker register"></p>	
	  					<p><input name="projects" type="button" id="boarder" value="Submit" class="bt_register"></p>
	  				</form>
			    </div>
			  </div>
			</div>
	
	
	<!-- jquery -->
	<script src="js/jquery-1.11.0.js" type="text/javascript" ></script>
	<script src="js/slide.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	 <script>
	$(function() {
	$( ".datepicker" ).datepicker();
	});
	</script>
 
  
</body>
</html>











