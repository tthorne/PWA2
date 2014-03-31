<?php
$dbh=mysql_connect ("localhost", "curlylox_fullsai", "Warlock2012") or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ("curlylox_fullsail");

function db_connect() {
	global $cfg;
	$link = mysql_connect($cfg['db_server'], $cfg['db_user'], $cfg['db_pass']) or die("Could not connect: " . mysql_error());
	mysql_select_db($cfg['db_name']) or die("Could not select database: " . mysql_error());
	return $link;
}

function db_query($query, $link) {
	$result = mysql_query($query, $link) or die("Could not send query: " . mysql_error());
	return $result;
}

function db_close($result, $link) {
	/* Free resultset */
	if (isset($result)) {
    	mysql_free_result($result);
	}

    /* Closing connection */
    mysql_close($link);
}
?>