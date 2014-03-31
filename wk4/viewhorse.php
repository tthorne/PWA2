<?php

include 'xhr/dbconnect.php';

$id = $_GET['id'];

$result = mysql_query("SELECT * FROM horses WHERE id='$id'")
or die ('cannot select horse info');

$row = mysql_fetch_array($result);
$id = $row['id'];
$name = stripslashes($row['name']);
$yob = $row['yob'];
$breed = $row['breed'];
$gender = $row['gender'];
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
			<li><a href="feed.php">Feed</a></li>
			<li><a href="training.php">Training</a></li>
			<li><a href="shows.php">Shows</a></li>
			<li><a href="health.php">Health</a></li>
		</ul>
		</nav>
        
	        <div class="clear"></div>
	    </div>
		<div class="row">			
			<h1 class="list">View Horse</h1>
			<div class="listAdd">
			 
				  <button class="addbutton" data-toggle="modal" data-target="#myModal">
				    +Add
				  </button>
				</div>
					  <p><strong>Name:</strong> <?php echo $name;?></p>
					  <p><strong>Year Of Birrth:</strong> <?php echo $yob;?></p>     
				      <p><strong>Breed:</strong> <?php echo $breed;?></p>
				      <p><strong>Gender:</strong> <?php echo $gender;?></p>
			          
					<h2>Training Sessions</h2>
					<?php
            
								$count = 0;
			
								$loop = mysql_query("SELECT * FROM training WHERE horseid='$id' order by id ASC") or die ('cannot select training sessions ' . mysql_error());
								while ($row = mysql_fetch_array($loop))
								{
								$id = $row['id'];
								$session = $row['session'];
								$workon = $row['workon'];
								$last = $row['last'];
								$next = $row['next'];
			
								echo "<b><strong>Last Training Session:</b>";
								 echo date('F d, Y', strtotime($last)); 
								 echo "<br />";
 								echo "<b><strong>Next Training Session:</b>";
 								 echo date('F d, Y', strtotime($next)); 
 								 echo "<br />";
								$count++;
								
								echo "<br />";
								}
			
								if (!$count)
								echo "<center>This horse hasn't had any training sessions.</center><br><br>";
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
	  			<h1>Add Training Session</h1>
	  			<div id="register">
	  				<form id="project">
	  					<p><label class="register">Last Training Session:</label> <input name="last" type="text" id="last" class="datepicker register"></p>
						<p><label class="register">Next Training Session:</label> <input name="next" type="text" id="next" class="datepicker register"></p>
	  					<p><label class="register">Training Session:</label><br><textarea rows="4" cols="50" name="session" id="session" class="register"></textarea></p>
						<p><label class="register">Workon:</label><br><textarea rows="4" cols="50" name="workon" id="workon" class="register"></textarea></p>
						<input name="owner" type="hidden" id="horseid" class="register" value="<?php echo $id;?>">
	  					<p><input name="projects" type="button" id="training" value="Submit" class="bt_register"></p>
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











