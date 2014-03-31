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

$updata["projectCreator"] = $_SESSION["user"];
$updata["last"] = param($_POST, 'last', '');
$updata["next"] = param($_POST, 'next', '');
$updata["session"] = param($_POST, 'session', '');
$updata["workon"] = param($_POST, 'workon', '');
$updata["horseid"] = param($_POST, 'horseid', '');
$updata["projectCreator"] = param($_POST, 'projectCreator', '');


$dbh = new PDB();
$db = $dbh->db;
$site = new Site($db);

try{
	$ct = 0;
	$sql = "INSERT INTO training (";
	
	foreach($updata as $key => $value){
		if ($value != "" && $key != "id"){
			if ($ct != 0 ){
				$sql .= ", ";
			}
			$sql .= $key;
			$ct++;
		}
	}
	
	$sql .= ") VALUES (";
	
	$ct = 0;
	foreach($updata as $key => $value){
		if ($value != "" && $key != "id"){
			if ($ct != 0 ){
				$sql .= ", ";
			}
			$sql .= ":" . $key;
			$ct++;
		}
	}
	
	$sql .= ")";
	
	$st = $db->prepare($sql);
	
	foreach($updata as $key => &$value){
		if ($value != ""){
			$st->bindParam(":".$key, $value);
		}
	}
	
	$st->execute();
	
	$st = $db->prepare("SELECT LAST_INSERT_ID()");
	$st->execute();
	
	$lastid = $st->fetch();

	$newproject = $dbh->getProjects($lastid[0]);
	
	$sql = "INSERT INTO userslink (userID, projectID) VALUES (:userID, :projectID)";
	$st = $db->prepare($sql);
	$st->execute(array(
		":userID"=>$updata["projectCreator"],
		":projectID"=>$lastid[0]
	));
	
}catch (PDOException $e){
	errormsg($e->getMessage());
}

exitjson(array("newproject"=>$newproject[0]));


?>