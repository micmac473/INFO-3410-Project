<?php

function getDBConnection(){
	try{ 
		$db = new mysqli("localhost","root","","junktrade");
		if ($db == null || $db->connect_errno > 0)return null;
		return $db;
	}catch(Exception $e){ } 
	return null;
}


function checkLogin($email, $password){
	$password = sha1($password);
	$sql = "SELECT * FROM `users` where email='$email'";
	print($email);
	$db = getDBConnection();
	if($db != NULL){
		$res = $db->query($sql);
		if ($res && $row = $res->fetch_assoc()){
			if(($row['password'] == $password)
				return true;
		}
	}
	return false;
}


function saveUser($username, $firstname, $lastname, $email, $contact, $address, $password){
	$password = sha1($password);
	$sql = "INSERT INTO `users` (`username`, `firstname`, `lastname`, `email`, `contact`, `address`, `password`) VALUES ('$username', '$firstname', '$lastname', '$email', '$contact', '$address', '$password');";
	try{
		$db = getDBConnection();
		if ($db != NULL){
			$db->query($sql);
			$id = $db->insert_id;
			if ($id >0)return TRUE;
		}
	}catch (Exception $e){}
	return FALSE;
}

function saveProfile($contact, $interest, $tradables){
	$sql = "INSERT INTO profile (`contact`,`interest`,`tradables`) VALUES ($contact, 'interest', 'tradables')";
	try{
		$db = getDBConnection();
		if ($db != NULL){
			$db->query($sql);
			$id = $db->insert_id;
			if ($id >0)return TRUE;
		}
	}catch (Exception $e){}
	return FALSE;
}

function saveTransactions($User1,$User2,$item1,$item2){
	$sql = "INSERT INTO transaction(`user1`,`user2`,`item1`,`item2`) VALUES('$User1','$User2','$item1','$item2')";
	try{
		$db = getDBConnection();
		if ($db != NULL){
			$db->query($sql);
			$id = $db->insert_id;
			if ($id >0)return TRUE;
		}
	}catch (Exception $e){}
	return FALSE;
}

function saveRating ($username,$ratings){
	//$oldrating = "SELECT rating FROM ratings WHERE username=$'username;";

	$sql = "INSERT INTO ratings(`username`,`rating`) VALUES ('$username','$rating')";
	try{
		$db = getDBConnection();
		if ($db != NULL){
			$db->query($sql);
			$id = $db->insert_id;
			if ($id >0)return TRUE;
		}
	}catch (Exception $e){}
	return FALSE;
}

function getRecentActivity(){
	$db = getDBConnection();
	$activity = [];

	if($db != NULL){
		$sql = "SELECT tradables FROM profile";

		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$activity[] = $row;
		}
		$db->close();
	}
	return $activity;
}

function getAllUsers(){
	$db = getDBConnection();
	$users = [];
	if ($db != null){
		$sql = "SELECT * FROM `users`";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$users[] = $row;
		}
		$db->close();
	}
	return $users;
}

function productViews($item){
		$sql = "UPDATE `profile` SET `views` = views+1 WHERE `profile`.`tradables` = $item";
	try{
		$db = getDBConnection();
		if ($db != NULL){
			$db->query($sql);
		}
	}catch (Exception $e){}
	return FALSE;
}

?>