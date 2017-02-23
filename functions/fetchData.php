<?php
	require_once(realpath(dirname(__FILE__).'/config.php'));
	
	function fetchData($conn){
		$stmt = $conn->prepare("SELECT  * FROM patient ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	/*
	try{
		$start = 0;
		$result = fetchData($conn , $start);
	}
	catch(Exception $e){
		// handle exception 
		echo $e->getmessage();
	}*/
?>