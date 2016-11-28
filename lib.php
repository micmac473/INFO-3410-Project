<?php
session_start();

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
	//print($email);
	$db = getDBConnection();
	if($db != NULL){
		$res = $db->query($sql);
		if ($res && $row = $res->fetch_assoc()){
			if($row['password'] == $password){
				$_SESSION["user"] = $row['firstname'];
				$_SESSION["id"] = $row['id'];
				return true;
			}
				
		}
	}
	return false;
}


function saveUser($username, $firstname, $lastname, $email, $contact, $address, $password){
	$password = sha1($password);
	$sql = "INSERT INTO `users` (`username`, `firstname`, `lastname`, `email`, `contact`, `address`, `password`) VALUES ('$username', '$firstname', '$lastname', '$email', '$contact', '$address', '$password');";
	$id = -1;
	$db = getDBConnection();
	if ($db != NULL){
		$res = $db->query($sql);
		if ($res && $db->insert_id > 0){
			$id = $db->insert_id;
		}
		$db->close();
	}
	return $id;
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

function saveItem($picture,$itemname, $itemDescription){

	/*$userid =$_SESSION['id'];
	$sql = "INSERT INTO items(`userId`,`picture`,`itemDescription`) VALUES('userid','$picture','$itemDescription')"; */
	$db = getDBConnection();
	$userId = $_SESSION['id'];
	$sql = "INSERT INTO items(`itemname`, `userid`,`picture`,`itemdescription`) VALUES('$itemname','$userId','$picture','$itemDescription');";
	$id = -1;
	if ($db != NULL){
		$res = $db->query($sql);
			if ($res && $db->insert_id > 0){
			$id = $db->insert_id;
		}
		$db->close();
	}
	return $id;
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

function getCurrentUser(){
	return $_SESSION["id"];
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



function getAllUserItems(){//should be session id here instead of useId
	$userID = $_SESSION["id"];
	$sql ="SELECT * FROM `items` where `userid` =$userID ORDER BY `uploaddate` DESC;";
	$items =[];
	//print($sql);
		$db = getDBConnection();
		if ($db != NULL){
			$res = $db->query($sql);
			while($res && $row = $res->fetch_assoc()){
			$items[] = $row;
		}//while
		$db->close();
	}//if
	return $items;
}

function getUserItems($userid){//should be session id here instead of useId
	//$userID = $_SESSION["id"];
	$sql ="SELECT * FROM `items` where `userid` = $userid ORDER BY `itemname` ASC;";
	$items =[];
	//print($sql);
		$db = getDBConnection();
		if ($db != NULL){
			$res = $db->query($sql);
			while($res && $row = $res->fetch_assoc()){
			$items[] = $row;
		}//while
		$db->close();
	}//if
	return $items;
}

function getAllItems(){//should be session id here instead of useId
	$userID = $_SESSION["id"];
	$sql ="SELECT * FROM `items` i, `users` u WHERE i.userid = u.id AND `userid` <> $userID ORDER BY `uploaddate` DESC;";
	$items =[];
	//print($sql);
		$db = getDBConnection();
		if ($db != NULL){
			$res = $db->query($sql);
			while($res && $row = $res->fetch_assoc()){
			$items[] = $row;
		}//while
		$db->close();
	}//if
	return $items;
}

function getRequests(){
	$user = $_SESSION["id"];
	$db = getDBConnection();
	$requests = [];
	if ($db != null){
		$sql = "SELECT * FROM `users` u, `requests` r, `items` i WHERE r.requester = u.id AND i.itemid = r.item AND r.requestee = $user;";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$requests[] = $row;
		}
		$db->close();
	}
	//var_dump($requests);
	return $requests;
}

function getItemOwner($itemid){
	$db = getDBConnection();
	$user = null;
	if ($db != NULL){
		$sql = "SELECT * FROM `users` u, `items` i WHERE i.userid = u.id AND i.itemid = '$itemid';";
		$res = $db->query($sql);
		if ($res){
			$user = $res->fetch_assoc();
		}
		$db->close();
	}
	return $user;
} 

function saveRequest($itemid){
	$owner = getItemOwner($itemid);
	$requestee = $owner['id'];
	$db = getDBConnection();
	$requester = $_SESSION['id'];
	$sql = "INSERT INTO `requests` (`requester`,`requestee`,`item`) VALUES($requester,$requestee,$itemid);";
	$id = -1;
	if ($db != NULL){
		$res = $db->query($sql);
			if ($res && $db->insert_id > 0){
			$id = $db->insert_id;
		}
		$db->close();
	}
	return $id;
} 

?>