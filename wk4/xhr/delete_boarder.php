<?php

// UNFINISHED

error_reporting(E_ALL);

session_start();
session_regenerate_id(false);

require_once("reqs/common.php");
require_once("reqs/pdo.php");
require_once("reqs/auth.php");

checkLoggedIn();

$updata = array();

$user = $_SESSION["user"];
$projectID = param($_POST, 'projectID', '');

if( empty($projectID) ){ errormsg("The 'projectID' is required."); }

$dbh = new PDB();
$db = $dbh->db;
$site = new Site($db);

$horses = $dbh->getHorses($owner);
$horsesArr = array();

for($i=0; $i<count($horses); $i++){
	array_push($horsesArr, $horses[$i]->id);
}

$arr = implode(", ", $horsesArr);

try{
	$ct = 0;
	if(!empty($arr)){ //rich and justin edit
		$sql = "DELETE FROM horses WHERE id IN (".$arr.")";
		//errormsg($arr);
		$st = $db->prepare($sql);
	
		$st->execute();
	}
}catch (PDOException $e){
	errormsg($e->getMessage());
}

try{
	$ct = 0;
	$sql = "DELETE FROM boarders WHERE id = :projectID";
	
	$st = $db->prepare($sql);
	$st->bindParam(":projectID", $projectID);
	
	$st->execute();
	
}catch (PDOException $e){
	errormsg($e->getMessage());
}

exitjson(array("success"=>true));


?>